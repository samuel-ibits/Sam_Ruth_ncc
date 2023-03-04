<?php

namespace App\Repositories\Tower;

use App\AuditAgentTower;
use App\InsuranceCompanyTower;
use App\PowerSupplier;
use App\PowerSourceType;
use App\PowerSourceTypeTower;
use App\Repositories\Lga\LgaInterface;
use App\Repositories\Power\PowerInterface;
use App\Repositories\User\UserInterface;
use App\TenantTower;
use App\Tower;
use App\TowerDraft;
use App\TowerOwner;
use App\TowerType;
use App\User;
use Exception;
use Carbon\Carbon;

class TowerRepository implements TowerInterface
{

    private $towerowner,
        $lga, $power, $user;

    public function __construct(UserInterface $user, LgaInterface $lga, PowerInterface $power)
    {
        $this->lga = $lga;
        $this->user = $user;
        $this->power = $power;
    }

    public function AddTowerDraft(TowerDraft $towerdraft)
    {

        $saved = $towerdraft->save();

        return $saved;
    }

    public function UpdateTower(Tower $tower)
    {
        return $tower->save();
    }

    public function GetTowerDraftByUser(User $user)
    {
        //dd($user->id);
        return $user->towerdraft;
    }
    public function GetTowerByUser(User $user)
    {
        //dd($user->id);
        return $user->towerowners();
    }

    public function SoftDeleteTowerDraft(TowerDraft $towerdraft)
    {
        return $towerdraft->delete();
    }

    public function AddTower(array $post_data)
    {
        return Tower::create($post_data);
    }

    public function GetTowerDraftById($id)
    {
        return TowerDraft::find($id);
    }

    public function GetAllPaginatedTowersById(array $id)
    {
        return Tower::whereIn('id', $id)->orderBy('id', 'DESC')->paginate(5);
    }
    public function GetTowerById($towerid)
    {
        return Tower::find($towerid);
    }

    public function GetTowerInsuranceById($towerinsuranceid)
    {
        // dd(InsuranceCompanyTower::where('id', $towerinsuranceid)->get());
        return InsuranceCompanyTower::find($towerinsuranceid);
    }

    public function GetTenantTowerById($tenanttowerid)
    {
        // dd(TenantTower::all());
        $tenanttower = TenantTower::find($tenanttowerid);
        if (!$tenanttower) return null;

        return  $tenanttower->load("antennamake", "antennamodel", "tenant", "antennatype");;
    }

    public function GetAuditAgentTowerById($auditagenttowerid)
    {
        // dd(InsuranceCompanyTower::where('id', $towerinsuranceid)->get());
        $auditagenttower = AuditAgentTower::find($auditagenttowerid);
        if (!$auditagenttower) return null;
        return $auditagenttower->load("auditagent", "auditagenttoweraudittypes.audittype");
    }

    public function DeleteTowerInsurance($towerinsuranceid, array $delete_data)
    {
        $tower = $this->GetTowerById($delete_data['delete_tower']);
        return $tower->insurancecompanies()->wherePivot('id', $towerinsuranceid)->detach();
    }

    public function DeleteTowerTenant($towertenantid, array $delete_data)
    {
        $tower = $this->GetTowerById($delete_data['delete_tower']);
        $towertenantid = TenantTower::find($towertenantid);
        return $towertenantid->delete();
    }

    public function AddTowerInsurance($towerid, array $post_data)
    {
        $tower = $this->GetTowerById($towerid);
        $towrinsurance = $tower->insurancecompanies()->attach(
            $post_data['insurance_company'],
            [
                'insurance_policy_id' => $post_data['insurance_policy'],
                'insurance_limit_id' => $post_data['insurance_limit'],
                'insurancepremium' => $post_data['insurance_premium'],
                'expires_at' => $post_data['insurance_expiry_date']
            ]
        );
    }

    public function AddTowerTenant($towerid, array $post_data)
    {
        $tower = $this->GetTowerById($towerid);
        $towrinsurance = $tower->tenants()->attach(
            $post_data['tenant_name'],
            [
                'antenna_make_id' => $post_data['antenna_make'],
                'antenna_type_id' => $post_data['antenna_type'],
                'antenna_model_id' => $post_data['antenna_model'],
                'configuration' => $post_data['configuration'],
                'active' => true
            ]
        );
    }

    public function UpdateTowerInsurance($towerinsuranceid, array $post_data)
    {
        $tower = $this->GetTowerById($post_data['add_insurance_tower']);
        //dd($post_data);
        $tower->insurancecompanies()->wherePivot('id', $towerinsuranceid)->sync(
            [
                $post_data['insurance_company'] =>
                [
                    'insurance_policy_id' => $post_data['insurance_policy'],
                    'insurance_limit_id' => $post_data['insurance_limit'],
                    'insurancepremium' => $post_data['insurance_premium'],
                    'expires_at' => $post_data['insurance_expiry_date']
                ]
            ]
        );
    }

    public function UpdateTowerTenant(TenantTower $tenanttower)
    {
        return $tenanttower->save();
    }

    public function GetTowerAuditScheduleByTowerIdAndDateRange($towerid, array $daterange)
    {
        $a = AuditAgentTower::whereBetween("audit_date", $daterange)->where("tower_id", $towerid)->first();
        // dd($a);
        return $a;
    }

    public function CreateAuditSchedule($towerid, array $post_data)
    {
        $tower = $this->GetTowerById($towerid);
        // dd($date);
        // dd($a);
        $tower->auditagents()->attach($post_data['audit_agent_name'], [
            "audit_date" => $post_data["audit_schedule"]
        ]);

        return $tower->auditagents->where("year(audit_date)", "<>", "year(" . $post_data['audit_schedule'] . ")")->first();
    }

    public function UpdateTowerAuditSchedule($towerauditscheduleid, array $post_data)
    {

        // $tower = $this->GetTowerById($post_data['add_audit_tower']);
        // return $tower->auditagents()->wherePivot('id', $towerauditscheduleid)->sync(
        //     [
        //         $post_data['audit_agent_name']=>
        //         [
        //             "audit_date" => $post_data["audit_schedule"]
        //         ]
        //     ]
        // );
    }

    public function GetAuditByTowerIdAndAuditAgentIdAuditDate($towerid, $auditagentid, $auditdate)
    {
        return AuditAgentTower::where(["tower_id" => $towerid, "audit_agent_id" => $auditagentid, "audit_date" => $auditdate])->latest('id')->first();
    }

    public function CreateAuditScheduleAudiType(AuditAgentTower $auditagenttower, array $audittypeids)
    {
        // dd($audittypes);
        foreach ($audittypeids as $audittypeid) {
            // dd($audittype);
            $auditagenttower->audittypes()->attach($audittypeid);
        }
    }

    public function UpdateAuditScheduleAudiType(AuditAgentTower $auditagenttower, $auditscheduleauditypeid, $audittypes)
    {
        foreach ($audittypes as $audittype) {
            $auditagenttower->audittypes()->attach($audittype);
        }
    }

    public function GetAllTowers()
    {
        return Tower::all();
    }

    public function GetAllPaginatedTowers()
    {
        return Tower::orderBy("id", 'DESC')->paginate(5);
    }

    public function GetTowerCount($id)
    {
        if ($id==null){
            return $this->GetAllTowers()->count();
        }else{
            return $this->GetAllTowers()->whereIn('id', $id)->count();}

       
        // return $this->GetAllTowers()->count();
    }

    public function GetTowerCountByUser(User $user)
    {
        # code...
        return $this->GetTowerByUser($user)->count();
    }


    public function GetTowerWeeklyCount()
    {
        return Tower::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    }
    public function GetTowerMonthlyCount()
    {
        return Tower::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
    }
    public function GetTowerAverageCount()
    {
        return Tower::whereDate('created_at', Carbon::today())->count();
    }


    public function GetTowerOwnerByTowerOwnerId($towerownerid)
    {
        return TowerOwner::find($towerownerid);
    }

    public function CreateTowerOwnerUser($userid, $towerownerid, $towerid = 0)
    {
        if ($towerid > 0) {
            $towerowner = $this->GetTowerOwnerByTowerOwnerId($towerownerid);
            return $towerowner->users()->attach($userid, ['tower_id' => $towerid]);
        } else {
            $towerowner = $this->GetTowerOwnerByTowerOwnerId($towerownerid);
            return $towerowner->users()->attach($userid);
        }
    }

    public function GetTowerOwnersByIds(array $towerownerids)
    {
        // dd($towerownerids);
        return TowerOwner::get()->whereIn('id', $towerownerids);
    }

    public function GetAllTowerTypes()
    {
        return TowerType::all();
    }

    public function GetTowerTypesById($towertypeid)
    {
        return TowerType::find($towertypeid);
    }

    public function CreatePowerSourceTypeTower(Tower $tower, array $powersupplierids, array $powersourcetypeids)
    {

        $tower->powersourcetypes()->detach();
        foreach ($powersourcetypeids as $x => $powersourcetypeid) {

            if (!is_numeric($powersupplierids[$x])) {
                $tower->powersourcetypes()->attach($powersourcetypeid, [
                    "others" => $powersupplierids[$x],
                ]);
            } else {
                $tower->powersourcetypes()->attach($powersourcetypeid, [
                    "power_supplier_id" => $powersupplierids[$x],
                ]);
            }
        }
    }

    public function GetPowerSourceTypeTowerByTowerId($towerid)
    {
        return PowerSourceTypeTower::with("powersupplier", "powersourcetype")->where("tower_id", "=", $towerid)->get();
    }
}

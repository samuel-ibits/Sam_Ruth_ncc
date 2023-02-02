<?php

namespace App\Http\Controllers;

use App\Repositories\Antenna\AntennaInterface;
use App\Repositories\Audit\AuditInterface;
use App\Repositories\Insurance\InsuranceInterface;
use App\Repositories\Lga\LgaInterface;
use App\Repositories\Maintenance\MaintenanceInterface;
use App\Repositories\State\StateInterface;
use App\Repositories\Tenant\TenantInterface;
use App\Repositories\TenantTower\TenantTowerInterface;
use App\Repositories\Tower\TowerInterface;
use App\Repositories\TowerOwner\TowerOwnerInterface;
use App\Repositories\Power\PowerInterface;
use App\Tower;
use App\TowerDraft;
use App\User;
use App\TenantTower;
use App\PowerSourceType;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use DB;

class TowerController extends Controller
{

    private $state,
        $lga,
        $power,
        $tower,
        $insurance,
        $antenna,
        $tenant,
        $maintenance,
        $audit,
        $towerowner,
        $tenanttower,
        $user;

    public function __construct(
        StateInterface $state,
        LgaInterface $lga,
        TowerInterface $tower,
        InsuranceInterface $insurance,
        AntennaInterface $antenna,
        TenantInterface $tenant,
        TenantTowerInterface $tenanttower,
        PowerInterface $power,
        MaintenanceInterface $maintenance,
        AuditInterface $audit,
        TowerOwnerInterface $towerowner,
        UserInterface $user
    ) {
        // $this->middleware('permission:tower-list|tower-create|tower-edit|tower-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:tower-create', ['only' => ['create','store']]);
        // $this->middleware('permission:tower-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:tower-delete', ['only' => ['destroy']]);

        $this->state = $state;
        $this->lga = $lga;
        $this->tower = $tower;
        $this->insurance = $insurance;
        $this->antenna = $antenna;
        $this->tenant = $tenant;
        $this->tenanttower = $tenanttower;
        $this->maintenance = $maintenance;
        $this->audit = $audit;
        $this->towerowner = $towerowner;
        $this->power = $power;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $towerdrafts = $this->tower->GetTowerDraftByUser(Auth::user());
        $user = $this->user->GetUserById(Auth::user()->id);
        $towerownerids = $user->towerownerusers->pluck('tower_id')->toArray();
        //$towerowners = $user->towerowners;
        //
        //$towerownerids = $towerowners->pluck("pivot")->pluck('tower_id')->toArray();
        // call it GetPaginatedTowersById($ids)
        $towers = $this->tower->GetAllPaginatedTowersById($towerownerids);
        return view('towers.index', compact('towers', 'towerdrafts'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd($towertypes);
        // dd(Auth::user());
        $user = $this->user->GetUserById(Auth::user()->id);
        $towerdraft = $this->tower->GetTowerDraftByUser($user);
        // dd(Auth::user());
        if ($towerdraft) {
            $towerdraftid = $towerdraft->id;
            $saved = true;
            return view('towers.create',  compact('saved', 'towerdraftid'));
        } else {
            $towerowners = $user->towerownerusers->load("towerowner")->pluck('towerowner')->unique();
            if ($towerowners->count() === 0) {
                $towerowners = $this->towerowner->GetAllTowerOwners();
            }
            $states = $this->state->GetAllStates();
            // $powertypes = $this->powertype->GetAllPowertypes();
            //dd($towerownerids);
            $towertypes = $this->tower->GetAllTowerTypes();
            // $towerowners = $towerownerids?$this->tower->GetTowerOwnersByIds($towerownerids): $this->tower->GetAllTowerOwners();
            // dd($towerowners);
            $saved = false;
            return view('towers.create',  compact('states', 'towertypes', 'towerowners', 'saved'));
        }
    }

    public function gettowerinsurancebyid($towerinsuranceid)
    {
        // dd($towerinsuranceid);
        return $this->tower->GetTowerInsuranceById($towerinsuranceid);
    }

    public function gettenanttowerbyid($tenanttowerid)
    {
        // dd($towerinsuranceid);
        return $this->tower->GetTenantTowerById($tenanttowerid);
    }

    public function getauditagenttowerbyid($auditagenttowerbyid)
    {
        // dd($towerinsuranceid);
        return $this->tower->GetAuditAgentTowerById($auditagenttowerbyid);
    }

    public function checkiftowernameexists(Request $request)
    {
        //$request = json_decode($request);
        //dd($request->all());
        if ($request->has('towerid')) {
            $validate = Validator::make($request->all(), [
                'tower_name' => 'required|unique:towers,name,' . $request->towerid,
                'towerid' => 'required'
            ]);
            return !$validate->fails() ? "true" : "false";
        } else {
            $validate = Validator::make($request->all(), [
                'tower_name' => 'required|unique:towers,name',
                'tower_name' => 'required|unique:tower_drafts,name'
            ]);
            // dd($request->toArray());
            return !$validate->fails() ? "true" : "false";
        }
    }

    public function checkifnccidentityexists(Request $request)
    {
        //$request = json_decode($request);
        //dd($request->all());
        if ($request->has('towerid')) {
            $validate = Validator::make($request->all(), [
                'ncc_identity' => 'required|unique:towers,ncc_identity,' . $request->towerid,
                'towerid' => 'required'
            ]);

            return !$validate->fails() ? "true" : "false";
            //dd($validate);
        } else {


            $validate = Validator::make($request->all(), [
                'ncc_identity' => 'required|unique:towers,ncc_identity',
                'ncc_identity' => 'required|unique:tower_drafts,ncc_identity'
            ]);
            //dd($validate);
            return !$validate->fails() ? "true" : "false";
        }
    }

    public function checkduplicategeoposition(Request $request)
    {
        //$request = json_decode($request);
        //dd($request->all());
        if ($request->has('towerid')) {
            $tower = $this->tower->GetTowerById($request['towerid']);
            $validate = Validator::make($request->all(), [
                'towerid' => 'required',
                'longitude' => 'required|unique:towers,longitude,' . $tower->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:towers,latitude,' . $tower->id . ',id,longitude,' . $request->longitude

                // 'longitude' => ['required', 'unique:tower_drafts,longitude,'.$towerdraft->id.',NULL,id,latitude,'.$request->latitude],
                // 'latitude' => ['required', 'unique:tower_drafts,latitude,'.$towerdraft->id.',NULL,id,longitude,'.$request->longitude],
                // 'latitude' => ['required', 'unique:towers,latitude,'.$tower->id.',NULL,id,longitude,'.$request->longitude],
                // 'longitude' => ['required', 'unique:towers,longitude,'.$tower->id.',NULL,id,latitude,'.$request->latitude]

            ]);
            // dd($validate);
            return !$validate->fails() ? "true" : "false";
        } else {
            $towerdraft = new TowerDraft();
            $tower = new Tower();
            $validate = Validator::make($request->all(), [
                'longitude' => 'required|unique:towers,longitude,' . $tower->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:towers,latitude,' . $tower->id . ',id,longitude,' . $request->longitude,
                'longitude' => 'required|unique:tower_drafts,longitude,' . $towerdraft->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:tower_drafts,latitude,' . $towerdraft->id . ',id,longitude,' . $request->longitude

                // 'longitude' => ['required', 'unique:tower_drafts,longitude,'.$towerdraft->id.',NULL,id,latitude,'.$request->latitude],
                // 'latitude' => ['required', 'unique:tower_drafts,latitude,'.$towerdraft->id.',NULL,id,longitude,'.$request->longitude],
                // 'latitude' => ['required', 'unique:towers,latitude,'.$tower->id.',NULL,id,longitude,'.$request->longitude],
                // 'longitude' => ['required', 'unique:towers,longitude,'.$tower->id.',NULL,id,latitude,'.$request->latitude]

            ]);
            // dd($validate);
            return !$validate->fails() ? "true" : "false";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->has("continue")) {
            $request->validate([
                'continue' => 'required'
            ]);
            $towerdraft = $this->tower->GetTowerDraftById($request["continue"]);

            $post_data = $towerdraft->toArray();
            unset($post_data["id"]);
            unset($post_data["deleted_at"]);
            unset($post_data["created_at"]);
            unset($post_data["updated_at"]);
            unset($post_data["user_id"]);
            // dd($towerdraft->towerowner_id);
            $tower = $this->tower->AddTower($post_data);
            if ($tower->id > 0) {
                $this->tower->CreateTowerOwnerUser(Auth::user()->id, $tower->tower_owner_id, $tower->id);
                $deleted = $this->tower->SoftDeleteTowerDraft($towerdraft);
                if ($deleted) {
                    return redirect()->route("towers.edit", [$tower, "tab" => "step1"]);
                }
            }
            return redirect("towers/create")->with("error", "An error occured");
        } else {
            $towerdraft = new TowerDraft();
            $tower = new Tower();
            $request->validate([
                'tower_owner' => 'required',
                'tower_name' => 'required|unique:towers,name',
                'tower_name' => 'required|unique:tower_drafts,name',
                'ncc_identity' => 'required',
                'address' => 'required',
                'state' => 'required',
                'lga' => 'required',
                'landlord_name' => 'required',
                'contact_number' => 'required',
                'tower_type' => 'required',
                'no_of_sections' => 'required',
                'tower_height' => 'required',
                'date_of_erection' => 'required',
                'longitude' => 'required|unique:towers,longitude,' . $tower->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:towers,latitude,' . $tower->id . ',id,longitude,' . $request->longitude,
                'longitude' => 'required|unique:tower_drafts,longitude,' . $towerdraft->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:tower_drafts,latitude,' . $towerdraft->id . ',id,longitude,' . $request->longitude
            ]);
            $towerdraft = new TowerDraft();
            $towerdraft->longitude = $request["longitude"];
            $towerdraft->latitude = $request["latitude"];;
            $towerdraft->no_of_sections = $request["no_of_sections"];
            $towerdraft->name = $request["tower_name"];
            $towerowner = $this->tower->GetTowerOwnerByTowerOwnerId($request["tower_owner"]);
            $towerdraft->towerowner()->associate($towerowner);
            $lga = $this->lga->GetLGAbyLGAId($request["lga"]);
            $towerdraft->lga()->associate($lga);
            $towerdraft->user()->associate(Auth::user());
            $towertype = $this->tower->GetTowerTypesById($request["tower_type"]);
            $towerdraft->towertype()->associate($towertype);
            $towerdraft->ncc_identity = $request["ncc_identity"];
            $towerdraft->landlord_name = $request["landlord_name"];
            $towerdraft->contact_number = $request["contact_number"];
            $towerdraft->address = $request["address"];
            $towerdraft->height = $request["tower_height"];
            $towerdraft->erected_at = $request["date_of_erection"];
            $towerdraft->measurement_unit = "mm";
            $saved = $this->tower->AddTowerDraft($towerdraft);
            if ($saved) {
                $towerdraft = $this->tower->GetTowerDraftByUser(Auth::user());
                $towerdraftid = $towerdraft->id;
                return view("towers.create", compact("saved", "towerdraftid"))->with("success", "Saved successfully");
            } else return view('towers.create')->with("error", "Cannot save tower");
        }
        //dd($tower);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function show(tower $tower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tower $tower)
    {
        $powersourcetypestower = $this->tower->GetPowerSourceTypeTowerByTowerId($tower->id);
        // foreach($powersourcetypestower as $key=>$powersourcetypetower) {
        //     if($key === 1)
        //     dd($powersourcetypetower->powersupplier->power_supplier_type_id);
        // }
        // dd($powersourcetypestower);
        $powersuppliers = $this->power->GetAllPowerSuppliers();
        $towerinsurancecompanies = $tower->insurancecompanies()->orderBy('id', 'DESC')->paginate(5);
        $towerauditagents = $tower->auditagents()->orderBy('id', 'DESC')->paginate(5);
        $towertenants = $tower->tenants()->orderBy('id', 'DESC')->paginate(5);
        $powersuppliertypes = $this->power->GetAllPowerSupplierTypes();
        // dd($tower->auditagents->first()->pivot->audittypes);

        //
        // dd($tower->tenants[0]->pivot->antennamake->name);
        // dd($tower->auditagents);
        // dd($this->audit->GetAuditTypeByAuditAgentTowerId($tower->auditagents[0]->pivot->id));
        // dd($tower->auditagents->last()->pivot->audittypes);
        $states = $this->state->GetAllStates();
        $lgas = $this->lga->GetLGAbyState($tower->lga->state);
        $towertypes = $this->tower->GetAllTowerTypes();
        $towerowners = $this->towerowner->GetAllTowerOwners();
        $insurancecompanies = $this->insurance->GetAllInsuranceCompanies();
        $insurancelimits = $this->insurance->GetAllInsuranceLimits();
        $insurancepolicies = $this->insurance->GetAllInsurancePolicies();
        $antennatypes = $this->antenna->GetAllAntennaTypes();
        $maintenanceschedules = $this->maintenance->GetAllMaintenanceSchedules();
        $audittypes = $this->audit->GetAllAuditTypes();
        $audittypequery = $this->audit;
        //dd($tower->insurancecompanies);
        $powersourcetypes=$this->power->GetAllPowerSourceTypes();
        return view("towers.edit",  compact('towertenants', 'towerauditagents', 'towerinsurancecompanies', 'tower', 'towerowners', 'towertypes', 'states', 'lgas', 'insurancecompanies', 'insurancelimits', 'insurancepolicies', 'antennatypes', 'maintenanceschedules', 'audittypes', 'audittypequery', 'powersourcetypes','powersuppliertypes', 'powersourcetypestower', 'powersuppliers'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tower $tower)
    {
        // dd($request);
        //
        $request->validate([
            'tab' => 'required'
        ]);
        if ($request->input('tab') === 'step1') {
            
            // dd($request);
            $powersourcetypecount = $this->power->GetAllPowerSourceTypes()->count();
            $request->validate([
                'tower_name' => 'required|unique:towers,name,' . $tower->id,
                'tower_owner' => 'required',
                'ncc_identity' => 'required|unique:towers,ncc_identity,' . $tower->id,
                'address' => 'required',
                'state' => 'required',
                'lga' => 'required',
                'landlord_name' => 'required',
                'contact_number' => 'required',
                'tower_type' => 'required',
                'no_of_sections' => 'required',
                'tower_height' => 'required',
                'date_of_erection' => 'required',
                'longitude' => 'required|unique:towers,longitude,' . $tower->id . ',id,latitude,' . $request->latitude,
                'latitude' => 'required|unique:towers,latitude,' . $tower->id . ',id,longitude,' . $request->longitude,
                'power_source_type' => "required|array|min:$powersourcetypecount",
                'power_supplier' => "required|array|min:$powersourcetypecount",
                'power_supplier_type' => "required|array|min:$powersourcetypecount",
                'power_source_type.*' => 'required',
                'power_supplier_type.*' => 'required',
                'power_supplier.*' => 'required'
            ]);

            // dd($towerdraft);
            $tower->longitude = $request["longitude"];
            $tower->latitude = $request["latitude"];;
            $tower->no_of_sections = $request["no_of_sections"];
            $tower->name = $request["tower_name"];
            // $towerowner = $this->tower->GetTowerOwnerByTowerOwnerId($request["tower_owner"]);
            // $tower->towerowner()->associate($towerowner);
            $lga = $this->lga->GetLGAbyLGAId($request["lga"]);
            $tower->lga()->associate($lga);
            $towertype = $this->tower->GetTowerTypesById($request["tower_type"]);
            $tower->towertype()->associate($towertype);
            $tower->ncc_identity = $request["ncc_identity"];
            $tower->landlord_name = $request["landlord_name"];
            $tower->contact_number = $request["contact_number"];
            $tower->address = $request["address"];
            $tower->height = $request["tower_height"];
            $tower->erected_at = $request["date_of_erection"];
            $tower->measurement_unit = "mm";
            $saved = $this->tower->UpdateTower($tower);
            if ($saved) {
                $this->tower->CreatePowerSourceTypeTower($tower, $request["power_supplier"], $request["power_source_type"]);
                return redirect()->route("towers.edit", [$tower, "tab" => "step2"])->with('success', 'profile information save successfully');
            } else {
                return redirect()->route("towers.edit", [$tower, "tab" => "step1"])->with('error', 'An error occurred');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tower  $tower
     * @return \Illuminate\Http\Response
     */
    public function destroy(tower $Tower)
    {
        //
    }

    public function deletetowerinsurance(Request $request, $towerinsuranceid)
    {
        $request->validate([
            'delete_tower' => 'required',
            'delete_insurance_company' => 'required'
        ]);
        $this->tower->DeleteTowerInsurance($towerinsuranceid, $request->all());

        return redirect()->route("towers.edit", [$request['delete_tower'], "tab" => "step2"])->with("success", "deleted successfully");
    }

    public function deletetowertenant(Request $request, $towertenantid)
    {
        $request->validate([
            'delete_tower' => 'required',
            'delete_tenant' => 'required'
        ]);
        $this->tower->DeleteTowerTenant($towertenantid, $request->all());

        return redirect()->route("towers.edit", [$request['delete_tower'], "tab" => "step3"])->with("success", "deleted successfully");
    }

    public function addtowerinsurance(Request $request, $towerid)
    {
        $request->validate([
            'add_insurance_tower' => 'required',
            'insurance_company' => 'required',
            'insurance_policy' => 'required',
            'insurance_limit' => 'required',
            'insurance_premium' => 'required',
            'insurance_expiry_date' => 'required|date'
        ]);
        $result = $this->tower->AddTowerInsurance($towerid, $request->all());
        //dd($result);
        return redirect()->route("towers.edit", [$towerid, "tab" => "step2"])->with("success", "saved successfully");
    }

    public function addtowertenant(Request $request, $towerid)
    {
        $request->validate([
            'add_tenant_tower' => 'required',
            'search_tenant_name' => 'required',
            'search_antenna_model' => 'required',
            'search_antenna_make' => 'required',
            'antenna_type' => 'required',
            'configuration' => 'required'
        ]);

        if ($request->has("add_tenant_tower") && isset($towerid)) {
            if ($request['add_tenant_tower'] === $towerid) {
                $tenant = $this->tenant->GetTenantById($request['tenant_name']);
                $antennamake = $this->antenna->GetAntennaMakeById($request['antenna_make']);
                $antennamodel = $this->antenna->GetAntennaModelById($request['antenna_model']);
                if (!$tenant) {
                    $tenant = $this->tenant->GetTenantByName($request['search_tenant_name']);
                    if ($tenant) {
                        // dd($tenantid);
                        $request['tenant_name'] = $tenant->id;
                    } else {
                        $tenant = $this->tenant->CreateTenant($request['search_tenant_name']);
                        $request['tenant_name'] = $tenant->id;
                    }
                }
                if (!$antennamake) {
                    $antennamake = $this->antenna->GetAntennaMakeByName($request['search_antenna_make']);
                    if ($antennamake) {
                        $request['antenna_make'] = $antennamake->id;
                    } else {
                        $antennamake = $this->antenna->CreateAntennaMake($request['search_antenna_make']);
                        $request['antenna_make'] = $antennamake->id;
                    }
                }
                if (!$antennamodel) {
                    $antennamodel = $this->antenna->GetAntennaModelByName($request['search_antenna_model']);
                    if ($antennamodel) {
                        $request['antenna_model'] = $antennamodel->id;
                    } else {
                        $antennamodel = $this->antenna->CreateAntennaModel($request['search_antenna_model']);
                        $request['antenna_model'] = $antennamodel->id;
                    }
                }

                $result = $this->tower->AddTowerTenant($towerid, $request->all());
                //dd($result);
                return redirect()->route("towers.edit", [$towerid, "tab" => "step3"])->with("success", "saved successfully");
            }
        }
        return redirect()->route("towers.edit", [$towerid, "tab" => "step3"])->with("error", "not saved");
    }


    public function addtowermaintenance(Request $request, $towerid)
    {
        $request->validate([
            'add_maintenance_tower' => 'required',
            'search_maintenance_agent_name' => 'required',
            'search_maintenance_engineer_name' => 'required',
            'maintenance_agent_name' => 'required',
            'maintenance_engineer_name' => 'required',
            'agent_ncc_licence' => 'required',
            'maintenance_schedule' => 'required'
        ]);
        $post_data = $request->paginate(5);
        // dd($request);
        if ($request->has("add_maintenance_tower") && isset($towerid)) {
            if ($towerid === $request['add_maintenance_tower']) {
                $maintenanceagent = $this->maintenance->GetMaintenanceAgentById($request['maintenance_agent_name']);
                $maintenanceengineer = $this->maintenance->GetMaintenanceEngineerById($request['maintenance_engineer_name']);
                $maintenanceschedule = $this->maintenance->GetMaintenanceScheduleById($request['maintenance_schedule']);
                $tower = $this->tower->GetTowerById($request['add_maintenance_tower']);
                if (!$maintenanceagent) {
                    $maintenanceagent = $this->maintenance->GetMaintenanceAgentByName($request['search_maintenance_agent_name']);
                    // dd($maintenanceagent);
                    if (!$maintenanceagent) {
                        // dd($maintenanceagent);
                        if ($this->maintenance->GetMaintenanceAgentByNCCLicence($request['agent_ncc_licence'])) {
                            return redirect()->route("towers.edit", [$towerid, "tab" => "step4"])->with("error", "NCC Licence exists for another maintenace agent");
                        }
                        $maintenanceagent = $this->maintenance->CreateMaintenanceAgent($request->all());
                    }
                    $post_data['maintenance_agent_name'] = $maintenanceagent->id;
                }
                if ($maintenanceagent && $maintenanceengineer) {

                    $maintenanceengineer->maintenanceagent()->associate($maintenanceagent);
                    $maintenanceengineer->tower()->associate($tower);
                    $maintenanceengineer->maintenanceschedule()->associate($maintenanceschedule);
                    $this->maintenance->UpdateMaintenanceEngineer($maintenanceengineer);
                    return redirect()->route("towers.edit", [$towerid, "tab" => "step4"])->with("success", "saved successfully");
                } else if (!$maintenanceengineer) {
                    $maintenanceengineer = $this->maintenance->GetMaintenanceEngineerByNameAndAgentId($request['search_maintenance_engineer_name'], $maintenanceagent->id);
                    if (!$maintenanceengineer) {
                        // dd($tower->maintenanceengineers);
                        $this->maintenance->DeactivateAllMaintenanceEngineersByTowerId($tower->maintenanceengineers);
                        $maintenanceengineer = $this->maintenance->CreateMaintenanceEngineer($post_data);
                        if ($maintenanceengineer)
                            return redirect()->route("towers.edit", [$towerid, "tab" => "step4"])->with("success", "saved successfully");

                        return redirect()->route("towers.edit", [$towerid, "tab" => "step4"])->with("error", "cannot saved");
                    }
                }
            }
        }
        return redirect()->route("towers.edit", [$towerid, "tab" => "step4"])->with("error", "not saved");
    }


    public function addtowerauditschedule(Request $request, $towerid)
    {

        // dd($request);
        $request->validate([
            'add_audit_tower' => 'required',
            'search_audit_agent_name' => 'required',
            'audit_schedule' => 'required',
            'audit_types_id' => "required|array|min:1",
            'audit_types_auditagenttoweraudittype' => "required|array|min:1",
            'audit_types_id.*' => 'required',
            'audit_types_auditagenttoweraudittype' => 'required',
        ]);

        $post_data = $request->all();
        // dd( $post_data);
        // dd(isset($towerid));
        if ($request->has("add_audit_tower") && isset($towerid)) {

            if ($request['add_audit_tower'] === $towerid) {
                $tower = $this->tower->GetTowerById($towerid);
                $auditagent = $this->audit->GetAuditAgentById($request["audit_agent_name"]);
                if (!$auditagent) {
                    $auditagent = $this->audit->GetAuditAgentByName($request["search_audit_agent_name"]);
                    if (!$auditagent) {
                        $auditagent = $this->audit->CreateAuditAgent($request["search_audit_agent_name"]);
                    }
                }
                $post_data['audit_agent_name'] = $auditagent->id;

                $date = explode("-", $post_data['audit_schedule']);
                $daterange = [$date[0] . "-01-01", $date[0] . "-12-31"];
                if (!is_null($this->tower->GetTowerAuditScheduleByTowerIdAndDateRange($towerid, $daterange))) {
                    // dd("hi");
                    return redirect()->route("towers.edit", [$request['add_audit_tower'], "tab" => "step5"])->with("error", "You can't add another Audit Agent here");
                }

                $this->tower->CreateAuditSchedule($towerid, $post_data);
                $auditschedule = $this->tower->GetAuditByTowerIdAndAuditAgentIdAuditDate($towerid, $post_data["audit_agent_name"], $post_data["audit_schedule"]);
                // dd($auditschedule);
                if (count($post_data['audit_types_id']) > 0) {
                    $this->tower->CreateAuditScheduleAudiType($auditschedule, $post_data['audit_types_id']);
                }
                return redirect()->route("towers.edit", [$request['add_audit_tower'], "tab" => "step5"])->with("success", "Saved successfully");
                // dd("Hi");
            }
        }
        return redirect()->route("towers.edit", [$request['add_audit_tower'], "tab" => "step5"])->with("error", "cannot save");
    }

    public function updatetowerinsurance(Request $request, $towerinsuranceid)
    {
        $request->validate([
            'add_insurance_tower' => 'required',
            'insurance_company' => 'required',
            'insurance_policy' => 'required',
            'insurance_limit' => 'required',
            'insurance_premium' => 'required',
            'insurance_expiry_date' => 'required|date'
        ]);
        $result = $this->tower->UpdateTowerInsurance($towerinsuranceid, $request->all());
        //dd($result);
        return redirect()->route("towers.edit", [$request['add_insurance_tower'], "tab" => "step2"])->with("success", "saved successfully");
    }

    public function updatetenanttower(Request $request, $towertenant)
    {
        $request->validate([
            'add_tenant_tower' => 'required',
            'search_tenant_name' => 'required',
            'search_antenna_model' => 'required',
            'search_antenna_make' => 'required',
            'antenna_type' => 'required',
            'configuration' => 'required'
        ]);

        if ($request->has("add_tenant_tower")) {
            $tenant = $this->tenant->GetTenantById($request['tenant_name']);
            $antennamake = $this->antenna->GetAntennaMakeById($request['antenna_make']);
            $antennamodel = $this->antenna->GetAntennaModelById($request['antenna_model']);
            if ($tenant) {
                $tenant = $this->tenant->GetTenantByName($request['search_tenant_name']);
                if ($tenant) {
                    // dd($tenantid);
                    $request['tenant_name'] = $tenant->id;
                } else {
                    $tenant = $this->tenant->CreateTenant($request['search_tenant_name']);
                    $request['tenant_name'] = $tenant->id;
                }
            }
            if ($antennamake) {
                $antennamake = $this->antenna->GetAntennaMakeByName($request['search_antenna_make']);
                if ($antennamake) {
                    $request['antenna_make'] = $antennamake->id;
                } else {
                    $antennamake = $this->antenna->CreateAntennaMake($request['search_antenna_make']);
                    $request['antenna_make'] = $antennamake->id;
                }
            }
            if (!$antennamodel) {
                $antennamodel = $this->antenna->GetAntennaModelByName($request['search_antenna_model']);
                if ($antennamodel) {
                    $request['antenna_model'] = $antennamodel->id;
                } else {
                    $antennamodelid = $this->antenna->CreateAntennaModel($request['search_antenna_model']);
                    $request['antenna_model'] = $antennamodel->id;
                }
            }
            $tenanttower = $this->tenanttower->GetTenantTowerById($towertenant);
            $tenanttower->tenant_id = $request['tenant_name'];
            $tenanttower->antenna_make_id = $request['antenna_make'];
            $tenanttower->antenna_type_id = $request['antenna_type'];
            $tenanttower->antenna_model_id = $request['antenna_model'];
            $tenanttower->configuration = $request['configuration'];
            $tenanttower->active = true;

            $result = $this->tower->UpdateTowerTenant($tenanttower);
            //dd($result);
            return redirect()->route("towers.edit", [$request['add_tenant_tower'], "tab" => "step3"])->with("success", "saved successfully");
        }
        return redirect()->route("towers.edit", [$request['add_tenant_tower'], "tab" => "step3"])->with("error", "cannot save");
    }

    public function updatetowermaintenance(Request $request, $towermaintenace)
    {
        $request->validate([
            'add_maintenance_tower' => 'required',
            'search_maintenance_agent_name' => 'required',
            'search_maintenance_engineer_name' => 'required',
            'maintenance_agent_name' => 'required',
            'maintenance_engineer_name' => 'required',
            'agent_ncc_licence' => 'required',
            'maintenance_schedule' => 'required'
        ]);
        // dd($request);
        $post_data = $request->all();
        if ($request->has("add_maintenance_tower") && isset($towermaintenace)) {
            $maintenanceagent = $this->maintenance->GetMaintenanceAgentById($request['maintenance_agent_name']);
            $maintenanceengineer = $this->maintenance->GetMaintenanceEngineerById($request['maintenance_engineer_name']);
            $maintenanceschedule = $this->maintenance->GetMaintenanceScheduleById($request['maintenance_schedule']);
            $tower = $this->tower->GetTowerById($request['add_maintenance_tower']);
            // dd($maintenanceengineer);
            if (!$maintenanceagent) {
                $maintenanceagent = $this->maintenance->GetMaintenanceAgentByName($request['search_maintenance_agent_name']);
                // dd($maintenanceagent);
                if (!$maintenanceagent) {
                    if ($this->maintenance->GetMaintenanceAgentByNCCLicence($request['agent_ncc_licence'])) {
                        return redirect()->route("towers.edit", [$request['add_maintenance_tower'], "tab" => "step4"])->with("error", "NCC Licence exists for another maintenace agent");
                    }
                    $maintenanceagent = $this->maintenance->CreateMaintenanceAgent($request->all());
                    // dd($maintenanceagent, "now", $maintenanceengineer);
                }
                $post_data['maintenance_agent_name'] = $maintenanceagent->id;
                // dd($maintenanceagent, "here", $maintenanceengineer);
            }
            if ($maintenanceagent && $maintenanceengineer) {
                $maintenanceengineer->maintenanceagent()->associate($maintenanceagent);
                $maintenanceengineer->tower()->associate($tower);
                $maintenanceengineer->maintenanceschedule()->associate($maintenanceschedule);
            }
            // dd($maintenanceengineer);
            if ($this->maintenance->UpdateMaintenanceEngineer($maintenanceengineer));
            return redirect()->route("towers.edit", [$request['add_maintenance_tower'], "tab" => "step4"])->with("success", "saved successfully");

            return redirect()->route("towers.edit", [$request['add_maintenance_tower'], "tab" => "step4"])->with("error", "cannot saved");
        }
    }

    public function updatetowerauditschedule(Request $request, $auditagenttowerid)
    {
        $request->validate([
            'add_audit_tower' => 'required',
            'search_audit_agent_name' => 'required',
            'audit_schedule' => 'required',
            'audit_types_id' => "required|array|min:1",
            'audit_types_auditagenttoweraudittype' => "required|array|min:1",
            'audit_types_id.*' => 'required',
            'audit_types_auditagenttoweraudittype' => 'required',
        ]);
        $a = array_map(function ($b) {
            return $b;
        }, $request["audit_types_id"]);
        // dd($a);

        if ($request['add_audit_tower']) {
            $auditagent = $this->audit->GetAuditAgentById($request["audit_agent_name"]);
            if (!$auditagent) {
                $auditagent = $this->audit->GetAuditAgentByName($request["search_audit_agent_name"]);
                if (!$auditagent) {
                    $auditagent = $this->audit->CreateAuditAgent($request["search_audit_agent_name"]);
                }
            }
            $auditagenttower = $this->audit->GetAuditAgentTowerById($auditagenttowerid);
            $auditagenttower->audit_date = $request["audit_schedule"];
            $auditagenttower->audit_agent_id = $auditagent->id;
            $result = $this->audit->UpdateAuditAgentTower($auditagenttower);
            // dd($result);
            // $result = $this->tower->UpdateTowerAuditScheduleWithAuditType($toweraudit, $request->all());
            //  foreach($request['audit_types'] as $audittype)
            //                     {
            //                         if(array_key_exists("id",$audittype))
            //                         $auditagenttower->audittypes()->sync($audittype['id']);
            //                     }

            $auditagenttower->audittypes()->sync($a);
            return redirect()->route("towers.edit", [$request['add_audit_tower'], "tab" => "step5"])->with("success", "Updated successfully");
        }
    }

      // search
      public function search(Request $request)
      {
          $fromDate = $request->input('fromDate');
          $toDate   = $request->input('toDate');
          $other    = $request->input('other');

          $towers = Tower::where(function($query) use ($other,$fromDate,$toDate) {
            if ($fromDate && $toDate) {
              $query->whereBetween('erected_at', [$fromDate, $toDate]);
            } else if ($fromDate) {
              $query->where('erected_at', '>=', $fromDate);
            } else if ($toDate) {
              $query->where('erected_at', '<=', $toDate);
            }
          })
          ->where(function($query) use ($other) {
              $query->where('name', 'LIKE','%' .$other.'%')
                    ->orWhere('ncc_identity', 'LIKE','%' .$other.'%')
                    ->orWhere('landlord_name', 'LIKE','%' .$other.'%');
          })
          ->orderBy('erected_at', 'asc')
          ->paginate(50);


        //   if($fromDate == null && $toDate  == null){
        //     $towers = Tower::where('name', 'LIKE','%' .$other.'%')
        //     ->orWhere('ncc_identity', 'LIKE','%' .$other.'%')
        //     ->orWhere('landlord_name', 'LIKE','%' .$other.'%')
        //   //   ->orWhere('towertype', 'LIKE','%' .$other.'%')
        //   //   ->orWhere('landlord_name', 'LIKE','%' .$other.'%')
        //   //   ->orWhere('address', 'LIKE','%' .$other.'%')
        //     ->paginate(10);
           

        //   }else if($fromDate != null && $toDate  !=null){
        //     $towers = Tower::where('erected_at', '>=', $fromDate)
        //       ->where('erected_at', '<=', $toDate)
        //       ->where(function($query) use ($other) {
        //           $query->where('name', 'LIKE','%' .$other.'%')
        //                 ->orWhere('ncc_identity', 'LIKE','%' .$other.'%')
        //                 ->orWhere('landlord_name', 'LIKE','%' .$other.'%');
        //         })
        //       ->paginate(10);
           

            

        //   }else if($fromDate == null && $toDate  !=null){
        //     $towers = Tower::where('erected_at', '<=', $toDate)
        //     ->where(function($query) use ($other) {
        //         $query->where('name', 'LIKE','%' .$other.'%')
        //               ->orWhere('ncc_identity', 'LIKE','%' .$other.'%')
        //               ->orWhere('landlord_name', 'LIKE','%' .$other.'%');
        //       })
        //     ->paginate(10);

            
        //   }else if($fromDate != null && $toDate  ==null){
        //     $towers = Tower::where('erected_at', '>=', $fromDate)
        //     ->where(function($query) use ($other) {
        //         $query->where('name', 'LIKE','%' .$other.'%')
        //               ->orWhere('ncc_identity', 'LIKE','%' .$other.'%')
        //               ->orWhere('landlord_name', 'LIKE','%' .$other.'%');
        //       })
        //     ->paginate(10);

            
        //   }else{
        //     return "invalid inputs";
        //   }
  
          
          // dd($query);
  
        //   $role = DB::table('users')
        //       ->select('users.role_id_user','role_name.role_id','role_name.promission')
        //       ->join('role_name','users.role_id_user','=','role_name.role_id')
        //       ->get();
        //dd($towers);
        
          return view('reports.towers.index',compact('towers'));
      }
  
   
   
  
}

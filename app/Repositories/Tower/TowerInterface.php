<?php

namespace App\Repositories\Tower;

use App\AuditAgentTower;
use App\PowerSourceType;
use App\PowerSupplier;
use App\TenantTower;
use App\Tower;
use App\TowerDraft;
use App\TowerOwner;
use App\User;

interface TowerInterface
{

    public function AddTowerDraft(TowerDraft $towerdraft);

    public function GetTowerDraftByUser(User $user);

    public function GetTowerByUser(User $user);

    public function GetTowerDraftById($id);

    public function SoftDeleteTowerDraft(TowerDraft $towerdraft);

    public function AddTower(array $post_data);

    public function GetTowerById($towerid);

    public function GetTowerInsuranceById($towerinsuranceid);

    public function GetTenantTowerById($tenanttowerid);

    public function GetAuditAgentTowerById($auditagenttowerid);

    public function DeleteTowerInsurance($towerinsuranceid, array $delete_data);

    public function DeleteTowerTenant($towertenantid, array $delete_data);

    public function AddTowerInsurance($towerid, array $post_data);

    public function AddTowerTenant($towerid, array $post_data);

    public function UpdateTowerInsurance($towerinsuranceid, array $post_data);

    public function UpdateTowerTenant(TenantTower $tenanttower);

    public function UpdateTower(Tower $tower);

    public function CreateAuditSchedule($towerid, array $post_data);

    public function UpdateTowerAuditSchedule($towerauditscheduleid, array $post_data);

    public function GetTowerAuditScheduleByTowerIdAndDateRange($towerid, array $daterange);

    public function GetAuditByTowerIdAndAuditAgentIdAuditDate($towerid, $auditagentid, $auditdate);

    public function CreateAuditScheduleAudiType(AuditAgentTower $auditagenttower, array $audittypeids);

    public function UpdateAuditScheduleAudiType(AuditAgentTower $auditagenttowerid, $auditscheduleauditypeid, $audittypes);

    public function GetAllPaginatedTowers();

    public function GetAllPaginatedTowersById(array $id);

    public function GetAllTowers();

    public function GetTowerCount($id);

    public function GetTowerCountByUser(User $user);

    public function GetTowerOwnerByTowerOwnerId(TowerOwner $towerOwner);

    public function CreateTowerOwnerUser($userid, $towerownerid, $towerid = 0);

    public function GetTowerOwnersByIds(array $towerownerids);

    public function GetAllTowerTypes();

    public function GetTowerTypesById($towertypeid);

    public function CreatePowerSourceTypeTower(Tower $tower, array $powersupplierid, array $powersourcetypeid);

    public function GetPowerSourceTypeTowerByTowerId($towerid);

    public function GetTowerWeeklyCount();

    public function GetTowerMonthlyCount();

    public function GetTowerAverageCount();
}

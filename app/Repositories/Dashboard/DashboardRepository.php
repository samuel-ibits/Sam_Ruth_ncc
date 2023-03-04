<?php

namespace App\Repositories\Dashboard;

use App\Repositories\Audit\AuditInterface;
use App\Repositories\AuditAgent\AuditAgentInterface;
use App\Repositories\Insurance\InsuranceInterface;
use App\Repositories\InsuranceCompany\InsuranceCompanyInterface;
use App\Repositories\Maintenance\MaintenanceInterface;
use App\Repositories\MaintenanceAgent\MaintenanceAgentInterface;
use App\Repositories\Tenant\TenantInterface;
use App\Repositories\Tower\TowerInterface;
use App\User;
use Carbon\Carbon;

class DashboardRepository implements DashboardInterface
{

    // private TowerInterface $tower;
    private $tower;

    // private TenantInterface $tenant;
    // private InsuranceInterface $insurance;
    // private MaintenanceInterface $maintenance;
    // private AuditInterface $audit;

    private $tenant;
    private $insurance;
    private $maintenance;
    private $audit;


    public function __construct(
        TowerInterface $tower,
        TenantInterface $tenant,
        InsuranceInterface $insurance,
        MaintenanceInterface $maintenance,
        AuditInterface $audit
    ) {
        $this->tower = $tower;
        $this->tenant = $tenant;
        $this->insurance = $insurance;
        $this->maintenance = $maintenance;
        $this->audit = $audit;
    }

    public function GetTowerCount($id)
    {
        // if($user) {
        //     return $this->tower->GetTowerCountByUser($user);
        // }
        return $this->tower->GetTowerCount($id);
    }

    public function GetTenantTowerCount($id)
    {
        return $this->tenant->GetOccupiedTenantCount($id);
    }

    public function GetInsurancesCount($id)
    {
        return $this->insurance->GetAllInsurancesCount($id);
    }

    public function GetMaintenancesCount($id)
    {
        return $this->maintenance->GetAllMaintenancesCount($id);
    }

    public function GetAuditsCount($id)
    {
        return $this->audit->GetAuditAgentCount($id);
    }

    public function GetTowerWeeklyCount()
    {
        return $this->tower->GetTowerWeeklyCount();
    }
    public function GetTowerMonthlyCount()
    {
        return $this->tower->GetTowerMonthlyCount();
    }
    public function GetTowerAverageCount()
    {
        return $this->tower->GetTowerAverageCount();
    }

    public function GetAuditsWeeklyCount()
    {
        return $this->audit->GetAuditsWeeklyCount();
    }
    public function GetAuditsMonthlyCount()
    {
        return $this->audit->GetAuditsMonthlyCount();
    }
    public function GetAuditsAverageCount()
    {
        return $this->audit->GetAuditsAverageCount();
    }
}

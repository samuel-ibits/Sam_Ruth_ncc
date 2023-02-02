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
use Carbon\Carbon;

class DashboardRepository implements DashboardInterface
{

    private $tower;
    private $tenant;
    private $insurance;
    private $maintenance;
    private $audit;



    public function __construct(TowerInterface $tower, TenantInterface $tenant,
    InsuranceInterface $insurance, MaintenanceInterface $maintenance, AuditInterface $audit)
    {
        $this->tower = $tower;
        $this->tenant = $tenant;
        $this->insurance = $insurance;
        $this->maintenance = $maintenance;
        $this->audit = $audit;
    }

    public function GetTowerCount()
    {
        return $this->tower->GetTowerCount();
    }

    public function GetTenantTowerCount()
    {
        return $this->tenant->GetOccupiedTenantCount();
    }

    public function GetInsurancesCount()
    {
        return $this->insurance->GetAllInsurancesCount();
    }

    public function GetMaintenancesCount()
    {
        return $this->maintenance->GetAllMaintenancesCount();
    }

    public function GetAuditsCount()
    {
        return $this->audit->GetAuditAgentCount();
    }

     public function GetTowerWeeklyCount(){
        return $this->tower->GetTowerWeeklyCount();

     }
    public function GetTowerMonthlyCount(){
        return $this->tower->GetTowerMonthlyCount();

    }
    public function GetTowerAverageCount(){
        return $this->tower->GetTowerAverageCount();

    }

      public function GetAuditsWeeklyCount(){
        return $this->audit->GetAuditsWeeklyCount();

      }
    public function GetAuditsMonthlyCount(){
        return $this->audit->GetAuditsMonthlyCount();

    }
    public function GetAuditsAverageCount(){
        return $this->audit->GetAuditsAverageCount();

    }

}

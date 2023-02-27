<?php
namespace App\Repositories\Report;

use App\Repositories\Audit\AuditInterface;
use App\Repositories\Insurance\InsuranceInterface;
use App\Repositories\Maintenance\MaintenanceInterface;
use App\Repositories\Tenant\TenantInterface;
use App\Repositories\Tower\TowerInterface;

class ReportRepository implements ReportInterface
{
    private $tower;
    private $insurance;
    private  $tenant;
    private  $audit;
    private $maintenance;

    public function __construct(TowerInterface $tower,
    InsuranceInterface $insurance,
    TenantInterface $tenant, AuditInterface $audit, MaintenanceInterface $maintenance)
    {
        $this->tower = $tower;
        $this->insurance = $insurance;
        $this->tenant = $tenant;
        $this->audit = $audit;
        $this->maintenance = $maintenance;
    }

    public function GetAllTowers()
    {
        return $this->tower->GetAllPaginatedTowers();
    }

    public function GetAllInsurances()
    {
        return $this->insurance->GetAllPaginatedInsurances();
    }

    public function GetAllTenants()
    {
        return $this->tenant->GetAllPaginatedTenants();
    }

    public function GetAllAudits()
    {
        return $this->audit->GetAllPaginatedTowerAudits();
    }

    public function GetAllMaintenances()
    {
        return $this->maintenance->GetAllPaginatedMaintenances();
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $dashboard;

    public function __construct(DashboardInterface $dashboard)
    {
        $this->dashboard = $dashboard;
    }
    public function index()
    {
        $usertowercount= $this->dashboard->GetUserTowerCount();
        $towercount = $this->dashboard->GetTowerCount();
        $tenantcount = $this->dashboard->GetTenantTowerCount();
        $insurancecount = $this->dashboard->GetInsurancesCount();
        $maintenancecount = $this->dashboard->GetMaintenancesCount();
        $auditcount = $this->dashboard->GetAuditsCount();

    $towerWeeklyCount = $this->dashboard->GetTowerWeeklyCount();
    $towerMonthlyCount = $this->dashboard->GetTowerMonthlyCount();
    $towerAverage = $this->dashboard->GetTowerAverageCount();

      $auditWeeklyCount = $this->dashboard->GetAuditsWeeklyCount();
    $auditMonthlyCount = $this->dashboard->GetAuditsMonthlyCount();
    $auditAverage = $this->dashboard->GetAuditsAverageCount();
    

        return view('dashboards.index', compact('towercount', 'tenantcount', 'insurancecount', 'maintenancecount', 'auditcount' , 'towerWeeklyCount','towerMonthlyCount','towerAverage','auditWeeklyCount','auditMonthlyCount','auditAverage'));
    }

}

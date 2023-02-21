<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Dashboard\DashboardInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private DashboardInterface $dashboard;

    public function __construct(DashboardInterface $dashboard)
    {
        $this->dashboard = $dashboard;
    }
    public function index()
    {
        $user = Auth::user();
        $towercount = $this->dashboard->GetTowerCount($user);
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


        return view('dashboards-user.index', compact('towercount', 'tenantcount', 'insurancecount', 'maintenancecount', 'auditcount', 'towerWeeklyCount', 'towerMonthlyCount', 'towerAverage', 'auditWeeklyCount', 'auditMonthlyCount', 'auditAverage'));
    }
}

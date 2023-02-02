<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Audit\AuditRepository;
use App\Repositories\Maintenance\MaintenanceInterface;
use App\Repositories\Report\ReportInterface;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{

    private $report;

    public function __construct(MaintenanceInterface $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $maintenances = $this->report->GetAllPaginatedMaintenances();
        //dd($maintenances);
        //dd($audits);
        return view('reports.maintenances.index', compact('maintenances'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

}

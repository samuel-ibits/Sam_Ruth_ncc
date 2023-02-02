<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Report\ReportInterface;
use Illuminate\Http\Request;

class TenantController extends Controller
{

    private $report;

    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $tenants = $this->report->GetAllTenants();
        return view('reports.tenants.index', compact('tenants'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

}

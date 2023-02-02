<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Audit\AuditRepository;
use App\Repositories\Report\ReportInterface;
use Illuminate\Http\Request;

class AuditController extends Controller
{

    private $report,
    $audit;

    public function __construct(ReportInterface $report, AuditRepository $audit)
    {
        $this->report = $report;
        $this->audit = $audit;
    }

    public function index(Request $request)
    {
        $audits = $this->report->GetAllAudits();
        $audittypes = $this->audit->GetAllAuditTypes();
        //dd($audits);
        return view('reports.audits.index', compact('audits', 'audittypes'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

}

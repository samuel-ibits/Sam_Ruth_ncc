<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Report\ReportInterface;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    private $report;

    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $insurances = $this->report->GetAllInsurances();
        // dd($insuraces);
        return view('reports.insurances.index', compact('insurances'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

}

<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Report\ReportInterface;
use Illuminate\Http\Request;

class TowerController extends Controller
{

    private $report;

    public function __construct(ReportInterface $report)
    {
        $this->report = $report;
    }

    public function index(Request $request)
    {
        $towers = $this->report->GetAllTowers();
        
        return view('reports.towers.index', compact('towers'))->with('i', ($request->input('page', 1) - 1)* 5);
    }

}

<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Repositories\Report\ReportInterface;
use App\Repositories\Tower\TowerInterface;
use Illuminate\Http\Request;
use App\Tower;
use App\TowerDraft;
use App\Repositories\User\UserInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;

class TowerController extends Controller
{

    private $report;

    public function __construct(ReportInterface $report, TowerInterface $tower, UserInterface $user)
    {
        $this->report = $report;
        $this->tower = $tower;
        $this->user = $user;
    }



    public function index(Request $request)
    {
        $userstower = $this->tower->GetTowerDraftByUser(Auth::user());
        $user = $this->user->GetUserById(Auth::user()->id);
        $towerownerids = $user->towerownerusers->pluck('tower_id')->toArray();

         if($user->isAdmin=="1"){
         $towers = $this->report->GetAllTowers();
         $towerscom=$this->report->GetAllTowers();
         return view('reports.towers.index', compact('towers', 'towerscom'))->with('i', ($request->input('page', 1) - 1)* 5);
         }else{
         $towers = $this->tower->GetAllPaginatedTowersById($towerownerids);
         $towerscom=$this->report->GetAllTowers();
         return view('reports.towers.index', compact('towers', 'towerscom'))->with('i', ($request->input('page', 1) - 1)* 5);
         }
    }

    // public function indexadmin(Request $request)
    // {

        
    
    // }

}

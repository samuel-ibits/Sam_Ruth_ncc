<?php

namespace App\Repositories\Audit;

use App\AntennaMake;
use App\AuditAgent;
use App\AuditAgentTower;
use App\AuditAgentTowerAuditType;
use App\AuditType;
use Carbon\Carbon;

class AuditRepository implements AuditInterface
{
    public function SearchAuditAgentByName($auditagentname)
    {
        return AuditAgent::where("name", "LIKE", $auditagentname."%")->get();
    }

    public function GetAuditAgentByName($auditagentname)
    {
        return AuditAgent::where("name", $auditagentname)->first();
    }

    public function GetAuditAgentById($auditagentid)
    {
        return AuditAgent::find($auditagentid);
    }

    public function CreateAuditAgent($auditagentname)
    {
        return AuditAgent::create(["name" => $auditagentname]);
    }

    public function GetAuditAgentCount($id)
    {
        if ($id==null){return $this->GetAllTowerAudits()->count();
        }else{
        return $this->GetAllTowerAudits()->whereIn('id', $id)->count();
    }
    }

    public function GetAuditAgentTowerById($auditagentid)
    {
        return AuditAgentTower::find($auditagentid);
    }

    public function UpdateAuditAgentTower(AuditAgentTower $auditagenttowerid)
    {
        $auditagenttowerid->save();
    }

    public function GetAllAuditTypes()
    {
        return AuditType::all();
    }

    public function GetAllPaginatedTowerAudits()
    {
        return AuditAgentTower::orderBy("id", 'DESC')->paginate(5);
    }

    public function GetAuditTypeByAuditAgentTowerId($auditagenttowerid)
    {
        return AuditAgentTowerAuditType::where("audit_agent_tower_id", $auditagenttowerid)->get();
    }

    public function GetAllTowerAudits()
    {
        return AuditAgentTower::all();
    }

    public function GetAuditsWeeklyCount(){
         return AuditAgent::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

    }
    public function GetAuditsMonthlyCount(){
        return AuditAgent::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

    }
    public function GetAuditsAverageCount(){
        return AuditAgent::whereDate('created_at', Carbon::today())->count();

    }
}
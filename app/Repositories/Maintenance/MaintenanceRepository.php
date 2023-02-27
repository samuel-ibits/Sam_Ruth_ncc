<?php

namespace App\Repositories\Maintenance;

use App\MaintenanceAgent;

use App\MaintenanceEngineer;

use App\MaintenanceSchedule;

class MaintenanceRepository implements MaintenanceInterface
{

    public function SearchMaintenanceAgentByName($maintenanceagentname)
    {
        return MaintenanceAgent::where("name", "LIKE", "$maintenanceagentname%")->get();
    }

    public function GetMaintenanceAgentById($maintenanceagentid)
    {
        return MaintenanceAgent::find($maintenanceagentid);
    }

    public function GetMaintenanceAgentByName($maintenanceagentname)
    {
        return MaintenanceAgent::where("name", "LIKE", $maintenanceagentname)->first();
    }

    public function CreateMaintenanceAgent($post_data)
    {
        return MaintenanceAgent::create(["ncc_licence" => $post_data["agent_ncc_licence"], "name" => $post_data["search_maintenance_agent_name"]]);
    }

    public function GetMaintenanceAgentByNCCLicence($ncclicence)
    {
        return MaintenanceAgent::where("ncc_licence", $ncclicence)->first();
    }

    public function GetAllMaintenancesCount()
    {
        return $this->GetAllMaintenances()->count();
    }
    public function SearchMaintenanceEngineerByNameAndAgentId($maintenanceengineername, $maintenanceagentid)
    {
        return MaintenanceEngineer::where("name", "LIKE", "$maintenanceengineername%", "and", "maintenance_agent_id", "=", $maintenanceagentid)->get()->load("maintenanceagent");
    }

    public function GetMaintenanceEngineerById($maintenanceengineerid)
    {
        return MaintenanceEngineer::find($maintenanceengineerid);
    }

    public function GetMaintenanceEngineerByNameAndAgentId($maintenanceengineername, $maintenanceagentid)
    {
        return MaintenanceEngineer::where("name", "=", $maintenanceengineername, "and", "maintenance_agent_id", "=", $maintenanceagentid)->first();
    }

    public function CreateMaintenanceEngineer($post_data)
    {
        // dd($post_data);
        return MaintenanceEngineer::create(["active"=>true,"name" => $post_data["search_maintenance_engineer_name"],"maintenance_agent_id" => $post_data["maintenance_agent_name"], "maintenance_schedule_id" => $post_data["add_maintenance_tower"], "tower_id" => $post_data["add_maintenance_tower"]]);
    }

    public function UpdateMaintenanceEngineer(MaintenanceEngineer $maintenanceengineer)
    {

        return $maintenanceengineer->save();
    }

    public function DeactivateAllMaintenanceEngineersByTowerId($maintenanceengineers)
    {
        foreach($maintenanceengineers as $maintenanceengineer)
        {
            $maintenanceengineer->active = false;
            $maintenanceengineer->save();
        }
    }

    public function GetAllMaintenances()
    {
        return MaintenanceEngineer::all();
    }

    public function GetAllMaintenanceSchedules()
    {
        return MaintenanceSchedule::all();
    }
    public function GetAllPaginatedMaintenances()
    {
        return MaintenanceEngineer::orderBy("id", 'DESC')->paginate(5);
    }

    public function GetMaintenanceScheduleById($maintenanceschedule)
    {
        return MaintenanceSchedule::find($maintenanceschedule);
    }

}

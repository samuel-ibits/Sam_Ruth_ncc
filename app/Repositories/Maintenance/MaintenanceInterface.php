<?php

namespace App\Repositories\Maintenance;

use App\MaintenanceEngineer;

interface MaintenanceInterface {

    public function SearchMaintenanceAgentByName($maintenanceagentname);

    public function GetMaintenanceAgentById($maintenanceagentid);

    public function GetMaintenanceAgentByName($maintenanceagentname);

    public function CreateMaintenanceAgent(Array $post_data);

    public function GetMaintenanceAgentByNCCLicence($ncclicence);

    public function GetAllMaintenancesCount($id);

    public function SearchMaintenanceEngineerByNameAndAgentId($maintenanceengineername, $maintenanceagentid);

    public function GetMaintenanceEngineerById($maintenanceengineerid);

    public function GetMaintenanceEngineerByNameAndAgentId($maintenanceengineername, $maintenanceagentid);

    public function CreateMaintenanceEngineer(Array $post_data);

    public function DeactivateAllMaintenanceEngineersByTowerId($maintenanceengineers);

    public function UpdateMaintenanceEngineer(MaintenanceEngineer $maintenanceengineer);

    public function GetAllMaintenanceSchedules();

    public function GetAllPaginatedMaintenances();

    public function GetAllMaintenances();

    public function GetMaintenanceScheduleById($maintenanceschedule);

}

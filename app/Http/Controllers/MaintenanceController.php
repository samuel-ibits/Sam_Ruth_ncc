<?php

namespace App\Http\Controllers;

use App\MaintenanceAgent;
use App\MaintenanceEngineer;
use App\MaintenanceSchedule;
use App\Repositories\Maintenance\MaintenanceInterface;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    private $maintenance;

    public function __construct(MaintenanceInterface $maintenance)
    {
        $this->maintenance = $maintenance;
    }

    public function searchmaintenanceagentbyname($maintenanceagentname)
    {
        if (!empty($maintenanceagentname)) {
            return $this->maintenance->SearchMaintenanceAgentByName($maintenanceagentname);
        } else {
            return array();
        }
    }

    public function searchmaintenanceengineerbynameandagentid($maintenanceengineername, $maintenanceagentid)
    {
        if (!empty($maintenanceagentname) && $maintenanceagentid > 0) {
            return $this->maintenance->SearchMaintenanceEngineerByNameAndAgentId($maintenanceengineername, $maintenanceagentid);
        } else {
            return array();
        }
    }
}

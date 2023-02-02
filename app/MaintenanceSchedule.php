<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceSchedule extends Model
{
    //
    public function maintenanceengineers()
    {
        return $this->hasMany("App\MaintenanceEngineer", "maintenance_schedule_id");
    }
}

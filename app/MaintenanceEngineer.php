<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceEngineer extends Model
{
    protected $fillable = ['name', 'maintenance_schedule_id', 'tower_id', 'maintenance_agent_id', 'active'];

    public function tower()
    {
        return $this->belongsTo("App\Tower");
    }

    public function maintenanceagent()
    {
        return $this->belongsTo("App\MaintenanceAgent", "maintenance_agent_id");
    }

    public function maintenanceschedule()
    {
        return $this->belongsTo("App\MaintenanceSchedule", "maintenance_schedule_id");
    }
}

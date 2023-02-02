<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceAgent extends Model
{
    //
    protected $fillable = [
        'name', 'ncc_licence'];

    public function maintenanceengineers ()
    {
        return $this->hasMany("App\MaintenanceEngineer", "maintenance_agent_id");
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditType extends Model
{
    //

    public function auditschedules()
    {
        return $this->belongsToMany("App\AuditAgentTower", "audit_agent_tower_audit_type", "audit_type_id")->using('App\AuditAgentTowerAuditType')->withPivot([
            "id"
        ])->withTimestamps();
    }
}

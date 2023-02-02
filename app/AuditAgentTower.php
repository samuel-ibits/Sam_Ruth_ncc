<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuditAgentTower extends Pivot
{
    //

    public $incrementing = true;

    public function audittypes()
    {
        return $this->belongsToMany("App\AuditType", "audit_agent_tower_audit_type", "audit_agent_tower_id")->using('App\AuditAgentTowerAuditType')->withPivot([
            'id'
        ])->withTimestamps();
    }

    public function auditagent()
    {
        # code...
        return $this->belongsTo("App\AuditAgent", "audit_agent_id");
    }

    public function auditagenttoweraudittypes()
    {
        # code...
        return $this->hasMany("App\AuditAgentTowerAuditType", "audit_agent_tower_id");
    }

    public function tower()
    {
        # code...
        return $this->belongsTo("App\Tower");
    }
}

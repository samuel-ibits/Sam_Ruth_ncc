<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuditAgentTowerAuditType extends Pivot
{
    //

    public function auditagenttower()
    {
        # code...
        return $this->belongsTo("App\AuditAgentTower", "audit_agent_tower_id");
    }

    public function audittype()
    {
        # code...
        return $this->belongsTo("App\AuditType", "audit_type_id");
    }
}

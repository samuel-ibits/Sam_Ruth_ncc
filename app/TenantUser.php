<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantUser extends Pivot
{
    //
    protected $table = 'tenant_user';

    public $incrementing = true;

    public function user ()
    {
        return $this->belongsTo("App\User");
    }

    public function tenanttower ()
    {
        return $this->belongsTo("App\TenantTower");
    }

    public function tenant ()
    {
        return $this->belongsTo("App\Tenant", "tenant_tower_id");
    }
}

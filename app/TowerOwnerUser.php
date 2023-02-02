<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TowerOwnerUser extends Pivot
{
    //
    public $incrementing = true;

    public function user ()
    {
        return $this->belongsTo("App\User");
    }

    public function tower ()
    {
        return $this->belongsTo("App\Tower");
    }

    public function towerowner ()
    {
        return $this->belongsTo("App\TowerOwner", "tower_owner_id");
    }
}

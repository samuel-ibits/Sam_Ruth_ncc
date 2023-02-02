<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TowerDraft extends Model
{
    //

    use SoftDeletes;

    public function towerowner()
    {
        # code...
        return $this->belongsTo("App\TowerOwner", "tower_owner_id");
    }

    public function towertype()
    {
        # code...
        return $this->belongsTo("App\TowerType", "tower_type_id");
    }

    public function lga()
    {
        # code...
        return $this->belongsTo("App\Lga");
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}

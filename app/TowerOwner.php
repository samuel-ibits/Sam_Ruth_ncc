<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TowerOwner extends Model
{
    //

    public function towerdrafts()
    {
        # code...
        return $this->hasMany("App\TowerDraft", "tower_owner_id");
    }

    public function towers()
    {
        # code...
        return $this->hasMany("App\Tower", "tower_owner_id");
    }

    public function users()
    {
        # code...
        return $this->belongsToMany("App\User")->using('App\TowerOwnerUser')->withPivot([
            'tower_id',
            'id'
        ])->withTimestamps();
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerSourceType extends Model
{
    // 
    public function towers()
    {
        return $this->belongsToMany("App\Tower")->using('App\PowerSourceTypeTower')->withPivot([
            'power_supplier_id',
            "others",
            'id'
        ])->withTimestamps();
    }

}

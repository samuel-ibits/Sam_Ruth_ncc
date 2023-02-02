<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerType extends Model
{
    //
    public function towerdrafts()
    {
        # code...
        return $this->hasMany("App\TowerDraft");
    }

    //
    public function towers()
    {
        # code...
        return $this->hasMany("App\Tower");
    }
}

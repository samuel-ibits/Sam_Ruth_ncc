<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    //
    public function state()
    {
        # code...
        return $this->belongsTo("App\State");
    }

    public function towerdrafts(){

        return $this->hasOne("App\TowerDraft");
    }
}

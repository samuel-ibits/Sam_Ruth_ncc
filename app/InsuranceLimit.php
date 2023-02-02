<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceLimit extends Model
{
    //

    public function towers(){

        return $this->hasMany("App\Tower");
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    //

    public function towers()
    {
        return $this->belongsToMany("App\Tower")->using('App\InsuranceCompanyTower')->withPivot([
            'insurance_policy_id',
            'insurance_limit_id',
            'insurancepremium',
            'expires_at',
            'id'
        ])->withTimestamps();
    }
}

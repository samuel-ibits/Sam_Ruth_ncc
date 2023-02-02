<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class InsuranceCompanyTower extends Pivot
{
    //

    public $incrementing = true;

    public function tower()
    {
        return $this->belongsTo('App\Tower');
    }

    public function insurancecompany()
    {
        return $this->belongsTo('App\InsuranceCompany', "insurance_company_id");
    }

    public function insurancepolicy()
    {
        return $this->belongsTo('App\InsurancePolicy', "insurance_policy_id");
    }

    public function insurancelimit()
    {
        return $this->belongsTo('App\InsuranceLimit', "insurance_limit_id");
    }
}

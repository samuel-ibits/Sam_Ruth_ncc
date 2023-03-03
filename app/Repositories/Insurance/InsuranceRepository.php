<?php

namespace App\Repositories\Insurance;

use App\InsuranceCompany;
use App\InsuranceCompanyTower;
use App\InsuranceLimit;
use App\InsurancePolicy;

class InsuranceRepository implements InsuranceInterface
{
    public function GetAllInsuranceCompanies()
    {
        return InsuranceCompany::all();
    }

    public function GetAllInsurancesCount($id)
    {
        if ($id==null){
            return $this->GetAllInsurances()->count();
        }else{
        return $this->GetAllInsurances()->whereIn('id', $id)->count();}


        // return Tower::whereIn('id', $id)->orderBy('id', 'DESC')->paginate(5);

  
        // return Tower::find($towerid);
    }

    public function GetAllInsuranceLimits()
    {
        return InsuranceLimit::all();
    }

    public function GetInsuranceLimitById($insurancelimit)
    {
        return InsuranceLimit::find($insurancelimit);
    }

    public function GetAllInsurancePolicies()
    {
        return InsurancePolicy::all();
    }

    public function GetInsurancePolicyById($insurancepolicyid)
    {
        return InsurancePolicy::find($insurancepolicyid);
    }

    public function GetAllInsurances()
    {
        return InsuranceCompanyTower::all();
    }

    public function GetAllPaginatedInsurances()
    {
        return InsuranceCompanyTower::orderBy("id", 'DESC')->paginate(5);

    }
}

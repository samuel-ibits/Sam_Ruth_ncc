<?php

namespace App\Repositories\Insurance;

interface InsuranceInterface
{
    public function GetAllInsuranceCompanies();

    public function GetAllInsurancesCount($id);

    public function GetAllInsuranceLimits();

    public function GetInsuranceLimitById($insurancelimit);

    public function GetAllInsurancePolicies();

    public function GetInsurancePolicyById($insurancepolicyid);

    public function GetAllInsurances();

    public function GetAllPaginatedInsurances();

}

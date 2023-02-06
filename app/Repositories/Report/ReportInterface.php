<?php
namespace App\Repositories\Report;

interface ReportInterface
{
    public function GetAllTowers();

    public function GetAllInsurances();

    public function GetAllTenants();

    public function GetAllAudits();

    // public function GetUserTowerCount(Array $id);

}

<?php

namespace App\Repositories\Dashboard;

use App\User;

interface DashboardInterface
{
  public function GetTowerCount($id);

  public function GetTenantTowerCount($id);

  public function GetInsurancesCount($id);

  public function GetMaintenancesCount($id);

  public function GetAuditsCount($id);

  public function GetTowerWeeklyCount();
  public function GetTowerMonthlyCount();
  public function GetTowerAverageCount();

  public function GetAuditsWeeklyCount();
  public function GetAuditsMonthlyCount();
  public function GetAuditsAverageCount();
}

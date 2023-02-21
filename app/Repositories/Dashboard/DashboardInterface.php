<?php

namespace App\Repositories\Dashboard;

use App\User;

interface DashboardInterface
{
  public function GetTowerCount(User $user = null);

  public function GetTenantTowerCount();

  public function GetInsurancesCount();

  public function GetMaintenancesCount();

  public function GetAuditsCount();

  public function GetTowerWeeklyCount();
  public function GetTowerMonthlyCount();
  public function GetTowerAverageCount();

  public function GetAuditsWeeklyCount();
  public function GetAuditsMonthlyCount();
  public function GetAuditsAverageCount();
}

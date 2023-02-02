<?php

namespace App\Repositories\TenantTower;

interface TenantTowerInterface
{
    public function GetAllTenantTowers();

    public function GetTenantTowerById($id);
}

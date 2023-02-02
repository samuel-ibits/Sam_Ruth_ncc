<?php
namespace App\Repositories\TenantTower;

use App\TenantTower;

class TenantTowerRepository implements TenantTowerInterface
{
    public function GetAllTenantTowers()
    {
        return TenantTower::all();
    }
    public function GetTenantTowerById($id)
    {
        return TenantTower::find($id);
    }
}
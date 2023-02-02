<?php
namespace App\Repositories\TowerOwner;

use App\TowerOwner;

class TowerOwnerRepository implements TowerOwnerInterface
{
    public function GetAllTowerOwners()
    {
        return TowerOwner::all();
    }
}
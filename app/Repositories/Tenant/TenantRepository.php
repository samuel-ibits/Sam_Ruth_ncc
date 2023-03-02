<?php
namespace App\Repositories\Tenant;

use App\Tenant;
use App\TenantTower;
use App\User;
use App\Repositories\User\UserInterface;
use App\TenantUser;

class TenantRepository implements TenantInterface
{
    public function SearchTenantByName($name)
    {
        return Tenant::where("name", "LIKE", "$name%")->get();
    }

    public function GetTenantByName($name)
    {
        return Tenant::where("name", $name)->first();
    }

    public function GetTenantById($tenantid)
    {
        return Tenant::find($tenantid);
    }

    public function CreateTenant($name)
    {
        return Tenant::create(["name"=>$name]);
    }

    public function GetOccupiedTenantCount()
    {
        //return $this->GetAllTenants()->count();
        return $this->GetAllTenantTowers()->count();
    }

    public function GetAllTenants()
    {
        return Tenant::all();
    }

    public function GetTenantByUser(User $user)
    {
        return $user->tenantuser();
    }

    public function GetTenantCountByUser(User $user)
    {
        # code...
        return $this->GetTenantByUser($user)->count();
    }

    public function GetAllTenantTowers()
    {

        return TenantTower::all();
    }
    public function GetAllPaginatedTenants()
    {
        return TenantTower::orderBy("id", 'DESC')->paginate(5);
    }
}

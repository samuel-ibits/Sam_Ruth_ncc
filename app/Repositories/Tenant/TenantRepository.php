<?php
namespace App\Repositories\Tenant;

use App\Tenant;
use App\TenantTower;

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

    public function GetOccupiedTenantCount($id)
    {
        if ($id==null){
            return $this->GetAllTenantTowers()->count();
        }else{
            return $this->GetAllTenantTowers()->whereIn('id', $id)->count();}

        //return $this->GetAllTenants()->count();
        return $this->GetAllTenantTowers()->count();
    }

    public function GetAllTenants()
    {
        return Tenant::all();
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

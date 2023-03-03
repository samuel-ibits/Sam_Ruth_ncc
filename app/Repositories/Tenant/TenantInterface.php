<?php
namespace App\Repositories\Tenant;


interface TenantInterface
{

    public function SearchTenantByName($name);

    public function GetTenantByName($name);

    public function GetTenantById($tenantid);

    public function CreateTenant($name);

    public function GetOccupiedTenantCount($id);

    public function GetAllTenants();
    
    public function GetAllTenantTowers();

    public function GetAllPaginatedTenants();

}

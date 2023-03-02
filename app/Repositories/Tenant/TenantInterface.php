<?php
namespace App\Repositories\Tenant;

use App\User;
use App\Tenant;

interface TenantInterface
{

    public function SearchTenantByName($name);

    public function GetTenantByName($name);

    public function GetTenantById($tenantid);

    public function CreateTenant($name);

    public function GetOccupiedTenantCount();

    public function GetAllTenants();
    
    public function GetAllTenantTowers();

    public function GetAllPaginatedTenants();

    public function GetTenantByUser(User $user);

    public function GetTenantCountByUser(User $user);

}

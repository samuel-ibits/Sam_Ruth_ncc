<?php

namespace App\Repositories\Permission;

use App\Permission;
use Spatie\Permission\Models\Role;

interface PermissionInterface
{

    public function GetAllPermission();

    public function GetAllUnusedPermission();

    public function GetPermissionById($permissionid);

    public function AddPermission(array $post_data);

    public function UpdatePermission(Permission $permission, array $post_data);

    public function GetPermissionsByRoles(array $roles);

    public function DeletePermission(Permission $permission);

}

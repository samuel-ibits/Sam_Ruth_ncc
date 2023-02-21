<?php

namespace App\Repositories\Permission;

use App\Permission;
use App\Submenu;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class PermissionRepository implements PermissionInterface
{

    public function GetAllPermission()
    {

        return Permission::all();
    }

    public function GetAllUnusedPermission()
    {
        # code...
        $exception = Submenu::pluck('permission_id')->toArray();
        //$allroutes = Route::getRoutes()->get();
        //dd($allroutes);

        $permissions = Permission::get()->whereNotIn('id', $exception);
        return $permissions;
    }

    public function GetPermissionById($permissionid)
    {

        return Permission::find($permissionid);
    }

    function AddPermission(array $post_data)
    {

        return  Permission::create($post_data);
    }

    public function UpdatePermission(Permission $permission, array $post_data)
    {

        return $permission->update($post_data);
    }

    public function GetPermissionsByRoles(array $roles)
    {
        //$permission = ROl::whereIn($roles)
        dd($roles);
        return Role::whereIn('id', $roles);
    }

    public function DeletePermission(Permission $permission)
    {
        $permission->submenu->permission()->dissociate();
        $permission->roles()->detach();
        return $permission->delete();
    }

}

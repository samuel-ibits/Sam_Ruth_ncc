<?php
namespace App\Repositories\Role;
use Spatie\Permission\Models\Role;

class RoleRepository implements RoleInterface{


    public function CreateRole(array $post_data) {
        //dd($post_data);
        $role = Role::create(['name' => $post_data['name'], 'description' =>$post_data['description']]);
        $role->syncPermissions($post_data['permission']);
        return $role;
    }


    public function UpdateRole(Role $role, array $post_data) {



    }
}

<?php
namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

interface RoleInterface {

    public function CreateRole(array $post_data);

    public function UpdateRole(Role $role, array $post_data);

}

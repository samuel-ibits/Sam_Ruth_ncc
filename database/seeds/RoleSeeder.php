<?php

use App\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => 'admin',
                "guard_name" => "web",
                "description" => "Admin",
                "permissions" => ["view_towers", "view_towers_report", "view_tenants_report", "view_audits_report", "view_maintenances_report", "view_insurances_report"]

            ], [
                'name' => 'towerowner',
                "guard_name" => "web",
                "description" => "towerowner",
                "permissions" => ["view_towers", "view_towers_report", "view_tenants_report", "view_audits_report", "view_maintenances_report", "view_insurances_report"]
            ]
        ];
        for ($i = 0; $i < count($roles); $i++) {
            $role = new Role;
            $role->name = $roles[$i]["name"];
            $role->guard_name = $roles[$i]["guard_name"];
            $role->description = $roles[$i]["description"];
            $role->created_at = new DateTime();
            $permissions = $roles[$i]["permissions"];
            for ($j = 0; $j < count($permissions); $j++) {
                $permission = Permission::findByName($permissions[$j]);
                $role->givePermissionTo($permission);
            }
            $role->save();
        }
    }
}

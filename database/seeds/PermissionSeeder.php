<?php

use App\Menu;
use App\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "view_towers",
                "guard_name" => "web",
                "description" => "view_towers"
            ], [
                "name" => "view_tenants_report",
                "guard_name" => "web",
                "description" => "view_tenants_report"
            ], [
                "name" => "view_towers_report",
                "guard_name" => "web",
                "description" => "view_towers_report"
            ], [
                "name" => "view_audits_report",
                "guard_name" => "web",
                "description" => "view_audits_report"
            ], [
                "name" => "view_maintenances_report",
                "guard_name" => "web",
                "description" => "view_maintenances_report"
            ], [
                "name" => "view_insurances_report",
                "guard_name" => "web",
                "description" => "view_insurances_report"
            ], [
                "name" => "admin_dashboard",
                "guard_name" => "web",
                "description" => "admin_dashboard"
            ], [
                "name" => "user_dashboard",
                "guard_name" => "web",
                "description" => "user_dashboard"
            ]
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permission = new Permission;
            $permission->name = $permissions[$i]["name"];
            $permission->guard_name = $permissions[$i]["guard_name"];
            $permission->description = $permissions[$i]["description"];
            $permission->created_at = new DateTime();
            // print_r($permission); 
            $permission->save();
        }
    }
}
<?php

use App\Menu;
use App\Permission;
use App\Submenu;
use Illuminate\Database\Seeder;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $submenus = [
            ["name" => "Towers", "description" => "Tower", "url" => "", "permission" => "view_towers", "menu" => "Towers", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Audits", "description" => "Towers", "url" => "audits", "permission" => "view_audits_report", "menu" => "Reports", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Insurances", "description" => "Insurances", "url" => "insurances", "permission" => "view_insurances_report", "menu" => "Reports", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Maintenances", "description" => "Maintenances", "url" => "maintenances", "permission" => "view_maintenances_report", "menu" => "Reports", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Tenants", "description" => "Tenants", "url" => "tenants", "permission" => "view_tenants_report", "menu" => "Reports", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Towers", "description" => "Towers", "url" => "towers", "permission" => "view_towers_report", "menu" => "Reports", "is_visible"=>1, "is_entry"=>0],
            ["name" => "Admin Dashbaord", "description" => "entry page dashboard for admin", "url" => "admin", "permission" => "admin_dashboard", "menu" => "Dashboard", "is_visible"=>"0", "is_entry"=>"1"],
            ["name" => "User Dashbaord", "description" => "entry page dashboard for user", "url" => "user", "permission" => "user_dashboard", "menu" => "Dashboard", "is_visible"=>"0", "is_entry"=>"1"]
        ];

        for ($i = 0; $i < count($submenus); $i++) {
            $submenu = new Submenu;

            $menu = Menu::where( "name", "=",$submenus[$i]["menu"])->first();
            // print_r($menu);
            $submenu->name = $submenus[$i]["name"];
            $submenu->description = $submenus[$i]["description"];
            $submenu->url = $submenus[$i]["url"] === ""? "/" . $submenus[$i]["url"]:$submenus[$i]["url"];
            $submenu->created_at = new DateTime();

            $permission = Permission::where( "name", "=",$submenus[$i]["permission"])->first();
            $submenu->permission()->associate($permission);
            $submenu->menu()->associate($menu);

            $submenu->save();
        }
    }
}

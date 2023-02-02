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
            ["name" => "Towers", "description" => "Tower", "url" => "", "permission" => "view_towers", "menu" => "Towers"],
            ["name" => "Audits", "description" => "Towers", "url" => "audits", "permission" => "view_audits_report", "menu" => "Reports"],
            ["name" => "Insurances", "description" => "Insurances", "url" => "insurances", "permission" => "view_insurances_report", "menu" => "Reports"],
            ["name" => "Maintenances", "description" => "Maintenances", "url" => "maintenances", "permission" => "view_maintenances_report", "menu" => "Reports"],
            ["name" => "Tenants", "description" => "Tenants", "url" => "tenants", "permission" => "view_tenants_report", "menu" => "Reports"],
            ["name" => "Towers", "description" => "Towers", "url" => "towers", "permission" => "view_towers_report", "menu" => "Reports"]
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

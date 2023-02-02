<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menus = [
            ["name" => "Towers", "description" => "Tower", "folder" => "towers"],
            ["name" => "Reports", "description" => "Report", "folder" => "reports"]
        ];

        for($i = 0; $i < count($menus); $i++) {
            $menu = Menu::create($menus[$i]);
        }
    }
}
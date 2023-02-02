<?php

use App\TowerType;
use Illuminate\Database\Seeder;

class TowerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $towerTypes = [
            ["name" => "Monopole"],
            ["name" => "Guy-Tower"],
            ["name" => "Lattice"]
        ];
        for ($i = 0; $i < count($towerTypes); $i++) {
            $towerType = new TowerType;
            $towerType->name = $towerTypes[$i]["name"];
            $towerType->created_at = new DateTime();
            $towerType->save();
        }
    }
}

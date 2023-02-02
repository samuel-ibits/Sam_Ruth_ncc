<?php

use App\TowerOwner;
use Illuminate\Database\Seeder;

class TowerOwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
        $towerOwnersModels = [
            ["name" => "IHS"],
            ["name" => "ATC"],
            ["name" => "GLO"],
            ["name" => "PAT"]
        ];

        for($i = 0; $i < count($towerOwnersModels); $i++) {
            $towerOwnersModel = new TowerOwner;
            $towerOwnersModel->name = $towerOwnersModels[$i]['name'];
            $towerOwnersModel->created_at = new DateTime();
            $towerOwnersModel->save();
        }
    }
}

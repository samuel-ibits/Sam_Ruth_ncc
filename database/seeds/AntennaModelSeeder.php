<?php

use App\AntennaModel;
use Illuminate\Database\Seeder;

class AntennaModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $antennaModels = [
            ["name" => "Test Antenna Model 1"],
            ["name" => "Test Antenna Model 2"]
        ];

        for($i = 0; $i < count($antennaModels); $i++) {
            $antennaModel = new AntennaModel;
            $antennaModel->name = $antennaModels[$i]['name'];
            $antennaModel->created_at = new DateTime();
            $antennaModel->save();
        }
    }
}

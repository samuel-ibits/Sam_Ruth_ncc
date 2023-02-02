<?php

use App\AntennaType;
use Illuminate\Database\Seeder;

class AntennaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $antennaTypes = [
            ["name" => "Radio Antenna"],
            ["name" => "Microwave Antenna"]
        ];

        for($i = 0; $i < count($antennaTypes); $i++) {
            $antennaType = new AntennaType;
            $antennaType->name = $antennaTypes[$i]['name'];
            $antennaType->created_at = new DateTime();
            $antennaType->save();
        }
    }
}

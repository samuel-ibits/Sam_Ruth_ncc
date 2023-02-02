<?php

use App\MaintenanceSchedule;
use Illuminate\Database\Seeder;

class MaintenanceScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $maintenanceSchedules = [
            [
                "id"=>1,
                "name" => "22nd May 2023"
            ], [
                "id"=>2,
                "name" => "22nd June 2023"
            ] 
        ];

        for ($i = 0; $i < count($maintenanceSchedules); $i++) {
            $maintenanceSchedule = new MaintenanceSchedule;
            $maintenanceSchedule->id = $maintenanceSchedules[$i]["id"];
            $maintenanceSchedule->name = $maintenanceSchedules[$i]["name"];
            $maintenanceSchedule->created_at = new DateTime();
            // print_r($maintenanceSchedule); 
            $maintenanceSchedule->save();
        }
    }
}

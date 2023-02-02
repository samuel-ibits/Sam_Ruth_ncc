<?php

use App\MaintenanceAgent;
use Illuminate\Database\Seeder;

class MaintenanceAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $maintenanceAgents = [
            [
                "id"=>1,
                "name" => "Makasa Sun",
                "contact_mail" => "info@makasasun.com",
                "ncc_licence" => "CL/S&I/047/15"
            ],  [
                "id"=>2,
                "name" => "Kish Resources",
                "contact_mail" => "info@kishresources.com",
                "ncc_licence" => "CL/SS/222/22"
            ], [
                "id"=>3,
                "name" => "Xousia Engineering",
                "contact_mail" => "info@xousia.com",
                "ncc_licence" => "CL/XX/111/11"
            ],
            [
                "id"=>4,
                "name" => "Romonta Holdings",
                "contact_mail" => "info@romonta.com",
                "ncc_licence" => "CL/RR/000/00"
            ] 
        ];

        for ($i = 0; $i < count($maintenanceAgents); $i++) {
            $maintenanceAgent = new MaintenanceAgent;
            $maintenanceAgent->id = $maintenanceAgents[$i]["id"];
            $maintenanceAgent->name = $maintenanceAgents[$i]["name"];
            $maintenanceAgent->contact_mail = $maintenanceAgents[$i]["contact_mail"];
            $maintenanceAgent->ncc_licence = $maintenanceAgents[$i]["ncc_licence"];
            $maintenanceAgent->created_at = new DateTime();
            // print_r($maintenanceAgent); 
            $maintenanceAgent->save();
        }
    }
}

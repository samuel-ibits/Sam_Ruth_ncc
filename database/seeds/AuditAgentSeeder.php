<?php

use App\AuditAgent;
use Illuminate\Database\Seeder;

class AuditAgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //
        $AuditAgentsModels = [
            ["name" => "Xousia Associates"],
            ["name" => "Props Resources"],
            ["name" => "Apliwin"],
            ["name" => "Kish Associates"]
        ];

        for($i = 0; $i < count($AuditAgentsModels); $i++) {
            $AuditAgentsModel = new AuditAgent;
            $AuditAgentsModel->name = $AuditAgentsModels[$i]['name'];
            $AuditAgentsModel->created_at = new DateTime();
            $AuditAgentsModel->save();
        }
    }
}

<?php

use App\AuditType;
use Illuminate\Database\Seeder;

class AuditTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $auditTypes = [
            [
                "id"=>1,
                "name" => "Audit Type 1"
            ], [
                "id"=>2,
                "name" => "Audit Type 2"
            ], [
                "id"=>3,
                "name" => "Audit Type 3"
            ]
        ];

        for ($i = 0; $i < count($auditTypes); $i++) {
            $auditType = new AuditType;
            $auditType->id = $auditTypes[$i]["id"];
            $auditType->name = $auditTypes[$i]["name"];
            $auditType->created_at = new DateTime();
            // print_r($auditType); 
            $auditType->save();
        }
    }
}

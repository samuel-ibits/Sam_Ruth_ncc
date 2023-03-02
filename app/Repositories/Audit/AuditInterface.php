<?php

namespace App\Repositories\Audit;

use App\AuditAgentTower;

interface AuditInterface
{
    public function SearchAuditAgentByName($auditagentname);

    public function GetAuditAgentByName($auditagentname);

    public function GetAuditAgentById($auditagentid);

    public function CreateAuditAgent($auditagentname);

    public function GetAuditAgentCount($id);

    public function GetAuditAgentTowerById($auditagenttowerid);

    public function UpdateAuditAgentTower(AuditAgentTower $auditagenttowerid);

    public function GetAllAuditTypes();

    public function GetAuditTypeByAuditAgentTowerId($auditagentowerid);

    public function GetAllTowerAudits();

    public function GetAllPaginatedTowerAudits();

    public function GetAuditsWeeklyCount();
    public function GetAuditsMonthlyCount();
    public function GetAuditsAverageCount();
}

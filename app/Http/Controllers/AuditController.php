<?php

namespace App\Http\Controllers;

use App\AuditAgent;
use Illuminate\Http\Request;
use App\Repositories\Audit\AuditInterface;

class AuditController extends Controller
{
    private $audit;

    public function __construct(AuditInterface $audit)
    {
        $this->audit = $audit;
    }

    public function searchauditagentbyname($auditagentname)
    {
        if (!empty($auditagentname)) {
            return $this->audit->SearchAuditAgentByName($auditagentname);
        } else {
            return array();
        }
    }
}

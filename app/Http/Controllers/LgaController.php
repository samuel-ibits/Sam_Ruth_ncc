<?php

namespace App\Http\Controllers;
use App\State;
use App\Lga;
use App\Repositories\Lga\LgaInterface;

use Illuminate\Http\Request;

class LgaController extends Controller
{

    private $lga;

    public function __construct(LgaInterface $lga)
    {
        $this->lga = $lga;   
    }

    public function GetLgabyStateId(State $state)
    {
         // if( is_numeric($stateid)){
            return $this->lga->GetLGAbyState($state);
            // }
    }
}

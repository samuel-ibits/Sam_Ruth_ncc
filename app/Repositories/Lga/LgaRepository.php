<?php

namespace App\Repositories\Lga;

use App\Lga;
use App\State;

class LgaRepository implements LgaInterface
{

    public function GetLGAbyState(State $state)
    {
        return $state->lgas;
    }

    public function GetLGAbyLGAId($lgaid)
    {
        return Lga::find($lgaid);
    }

}

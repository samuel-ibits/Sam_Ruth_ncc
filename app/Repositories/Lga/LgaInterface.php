<?php

namespace App\Repositories\Lga;

use App\State;

interface LgaInterface {

    public function GetLGAbyState(State $state);
    public function GetLGAbyLGAId($lgaid);
}

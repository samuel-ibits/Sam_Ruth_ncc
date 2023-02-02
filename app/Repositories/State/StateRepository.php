<?php

namespace App\Repositories\State;

use App\State;

class StateRepository implements StateInterface {


    public function GetAllStates()
    {

        return State::all();
    }

}

<?php

namespace App\Http\Controllers;
use App\State;
use App\Repositories\State\StateInterface;

use Illuminate\Http\Request;

class StateController extends Controller
{
    private $state;

    public function __construct(StateInterface $state)
    {
        $this->state = $state;
    }

    public function index()
    {
        return $this->state->GetAllStates();
    }
}


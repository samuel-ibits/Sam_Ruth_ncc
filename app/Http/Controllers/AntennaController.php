<?php

namespace App\Http\Controllers;

use App\AntennaMake;
use App\AntennaModel;
use Illuminate\Http\Request;
use App\Repositories\Antenna\AntennaInterface;

class AntennaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $antenna;
    

    public function __construct(AntennaInterface $antenna)
    {
        $this->antenna = $antenna;
    }

   
    public function searchantennamakebyname($antennamake)
    {
        if (!empty($antennamake)) {
            return $this->antenna->SearchAntennaMakeByName($antennamake);
        } else {
            return array();
        }
    }

    public function searchantennamodelbyname($antennamodel)
    {
        if (!empty($antennamodel)) {
            return $this->antenna->SearchAntennaModelByName($antennamodel);
        } else {
            return array();
        }
    }

}
<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:17
 */
class Spawns extends Controller
{
    function __construct($location)
    {
        parent::__construct();
        if(!empty($location)){
            require 'models/SpawnData.php';
            require 'models/LocationData.php';
            $oPData = new SpawnData($location);
            $oLData = new LocationData($location);
            $this->view->setViewParameter('pData', $oPData->getSpawnedPokemon());
            $this->view->setViewParameter('locationData', $oLData->getLocationData());
            $this->view->setViewParameter('site_title', ('Spawns'.(empty($location) ? '' : ' - '.ucfirst($location))));
        }
        $this->view->render('spawns/index');
    }
}
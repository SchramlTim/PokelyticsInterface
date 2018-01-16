<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:17
 */
class Location extends Controller
{
    function __construct($location)
    {
        parent::__construct();
        if(!empty($location)){
            require 'models/LocationData.php';
            $oLData = new LocationData($location);
            $this->view->setViewParameter('lData', $oLData->getLocationData());
            $this->view->setViewParameter('lpData', $oLData->getLastLocationPokemon());
            $this->view->setViewParameter('nData', $oLData->getNotifyPokemon());
            $this->view->setViewParameter('site_title', ('Gebiet'.(empty($location) ? '' : ' - '.ucfirst($location))));
        }
        $this->view->render('location/index');
    }
}
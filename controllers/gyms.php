<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:17
 */
class Gyms extends Controller
{
    function __construct($location)
    {
        parent::__construct();
        require 'models/GymData.php';
        $oGData = new GymData($location);
        $aGData = $oGData->getGymData();
        $this->view->setViewParameter('gData', $aGData);
        $this->view->setViewParameter('site_title', ('Gyms'.(empty($location) ? '' : ' - '.ucfirst($location))));
        $this->view->render('gyms/index');
    }
}
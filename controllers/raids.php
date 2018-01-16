<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:17
 */
class Raids extends Controller
{
    function __construct($location)
    {
        parent::__construct();
        require 'models/RaidData.php';
        $oRData = new RaidData($location);
        $aRData = $oRData->getRaidData();       
        $this->view->setViewParameter('rData', $aRData);        
        $this->view->setViewParameter('site_title', ('Raids'.(empty($location) ? '' : ' - '.ucfirst($location))));
        $this->view->render('raids/index');
    }
}
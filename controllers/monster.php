<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:17
 */
class Monster extends Controller
{
    function __construct($location,$monsterName)
    {
        parent::__construct();
        if(!empty($location)){
            require 'models/MonsterData.php';
            $oPData = new MonsterData($location,$monsterName);
            $this->view->setViewParameter('headmapData', $oPData->getHeatmapInformation());
            $this->view->setViewParameter('monsterData', $oPData->getMonsterInformation());
	    $this->view->setViewParameter('locationData', $oPData->getLocationInformation());
            $this->view->setViewParameter('site_title', ('Monster'.(empty($location) ? '' : ' - '.ucfirst($location))));
        }
        $this->view->render('monster/index');
    }
}

<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:06
 */
class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        require 'models/NextMigrationData.php';
        $oMData = new NextMigrationData();
        $this->view->setViewParameter('mData', $oMData->getNextMigrationUnixtime());
        $this->view->setViewParameter('site_title', 'Pokelytics');
        $this->view->render('index/index');
    }

}
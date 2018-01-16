<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 23:30
 */
class Controller
{
    function __construct()
    {
        $this->view = new View();
        require 'models/MenuData.php';
        $oMenuLocations = new MenuData();
        $aMenuLocations = $oMenuLocations->getMenuStructur();
        $this->view->setViewParameter('menustructur', $aMenuLocations);
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 22:06
 */
class Datenschutz extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->setViewParameter('site_title', 'Datenschutz | Pokelytics');
        $this->view->render('datenschutz/index');
    }

}
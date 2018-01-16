<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 23:21
 */
class Error404 extends Controller
{
    function __construct($sErrorTitle,$sErrorMessage)
    {
        parent::__construct();
        $this->view->params['error_title'] = $sErrorTitle;
        $this->view->params['error_message'] = $sErrorMessage;
        $this->view->params['site_title'] = 'Fehler | Pokelytics';
        $this->view->render('error/index');
    }
}
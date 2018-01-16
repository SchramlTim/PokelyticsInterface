<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 23:34
 */
class View
{
    function __construct()
    {
        $this->aViewParameter = null;
    }

    public function render($name)
    {
        require 'views/' . $name . '.php';
    }

    public function setViewParameter($key,$value)
    {
        $this->aViewParameter[$key] = $value;
    }
    public function getViewParameter($key)
    {
        return $this->aViewParameter[$key];
    }
}
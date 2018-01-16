<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.07.2017
 * Time: 23:12
 */
class Bootstrap
{
    function __construct()
    {
        $url = explode('/', rtrim($_GET['url'],'/'));

        if(!empty($url[0]))
        {
            $file = 'controllers/' . $url[0] . '.php';
            if(file_exists($file))
            {
                require $file;
            }
            else
            {
                require 'controllers/error404.php';
                $controller = new Error404('404','Diese Seite ist in der Ultra Dimension verschollen!');
                return false;
            }
            $reflection = new ReflectionClass($url[0]);
            $params = $reflection->getConstructor()->getParameters();

            if(count($url) == 0)
            {
                require 'controllers/index.php';
                $controller = new Index();
            }
            else
            {
                if(count($params) == 0 & count($url) == 1)
                {
                    $controller = new $url[0]();
                }
                elseif(count($params) == 1 & count($url) == 2)
                {
                    $controller = new $url[0]($url[1]);
                }
                elseif(count($params) == 2 & count($url) == 3)
                {
                    $controller = new $url[0]($url[1],$url[2]);
                }
                else
                {
                    require 'controllers/error404.php';
                    $controller = new Error404('404','Diese Seite ist in der Ultra Dimension verschollen!');
                    return false;
                }
            }
        }
        else
        {
            require 'controllers/index.php';
            $controller = new Index;
        }

    }
}

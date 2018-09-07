<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once 'controller/Controller.php';
    $route = new Controller($path);

    $title = $route->getTitle();
    $navbar = $route->getNav();
    $content = '';

    if (!$route->model) {
        $route->model = 'basic';
    }
    require 'view/'.ucfirst($route->page).'/'.$route->page.'_'.$route->model.'.php';

    include_once('view/layout.php');
?>

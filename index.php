<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once 'controller/Controller.php';
    $route = new Controller($path);

    $title = $route->getTitle();
    $navbar = $route->getNav();
    $content = '';

    if ($route->model) {
        require 'model/'.$route->view.'_'.$route->model.'.php';
    } else {
        require 'model/'.$route->view.'_basic.php';
    }

    include_once('view/layout.php');
?>

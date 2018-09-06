<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once 'controller/Controller.php';
    $route = new Controller($path);

    $title = $route->getTitle();
    $navbar = $route->getNav();

    if ($route->model) {
        require 'model/'.$route->view.'_'.$route->model.'.php';
    }

    include_once('view/'.$route->view.'.php');
?>

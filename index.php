<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once('controller/Controller.php');
    
    $route = new Controller($path);
    $route->createRoute();
    
    require 'model/Base.php';
    
    include_once 'view/'.$route->view.'.php';
?>

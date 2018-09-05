<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once('routing/routes.php');
    
    $route = new Router($path);
    
    var_dump($route->getController());
?>

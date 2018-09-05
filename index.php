<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once('routing/routes.php');
    
    $route = new Router($path);
    $route->getController();
    
    var_dump($route->name);
    var_dump($route->action);
    var_dump($route->param);
?>

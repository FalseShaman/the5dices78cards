<?php

    $path = $_SERVER[REQUEST_URI];
    
    require_once 'controller/Controller.php';
    $route = new Controller($path);
    $route->createRoute();
    
    require_once 'model/language.php';
    $title = isset($translateList[$route->view]) ? $translateList[$route->view] : $translateList['fail'];
    
    $navbar = '';
    foreach ($route->routes as $view => $data) 
    {
        $navbar .= $route->view == $view ? '<li class="nav-item active">' : '<li class="nav-item">';
        $navbar .= '<a class="nav-link" href="/'.$view.'">'.ucfirst($view).'</a></li>';
    }

var_dump($route->model);
    if ($route->model) {
        require 'model/'.$route->view.'_'.$route->model.'.php';
    }

var_dump('model/'.$route->view.'_'.$route->model.'.php');
    include_once('view/'.$route->view.'.php');
?>

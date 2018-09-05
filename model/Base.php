<?php
    $title = ucfirst($route->view);
    
    $navbar = '';
    foreach ($route->routes as $view => $models)
    {
        $navbar .= $view == $route->view ? '<li class="nav-item active">' : '<li class="nav-item">';
        $navbar .= '<a class="nav-link" href="#">'.ucfirst($view).'</a></li>';
    }
?>
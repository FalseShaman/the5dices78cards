<?php
    session_start();
//Database
    require_once 'model/connection.php';

// DeckUpdate
    // function getDeckList() {
    //     $folder = scandir('/app/gallery/');
    //     return array_diff($folder, array('.', '..'));
    // }

// BackgroundUpdate
    // $folder = scandir('/app/view/design/background/');
    // $backList = array_diff($folder, array('.', '..'));
    // $backLine = implode('|', $backList);

// Controller calling
    $path = $_SERVER['REQUEST_URI'];
    require_once 'model/controller.php';
    $controller = new Controller($path);

// GET request
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Auth
        if ($controller->page == 'auth' && $controller->subpage == 'logout') {
            $controller->logoutAuth();
        }
        if (!isset($_SESSION['user'])) {
            $controller->page = 'auth';
            $controller->subpage = 'basic';
        }
    // Page data
        $title = $controller->page;
        $leftMenu = $controller->page != 'auth' ? $controller->getMenu() : '';
        $rightMenu = '';
        $content = '';
    // Page html
        require 'view/'.ucfirst($controller->page).'/'.$controller->page.'_'.$controller->subpage.'.php';
        include_once('view/layout.php');
    }

// POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $controller->subpage != 'basic' ? $controller->subpage.ucfirst($controller->page) : 'urlNotFound';
        echo json_encode($controller->$action());
    }
?>

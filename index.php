<?php

    function getTranslate() {
        return array(
            'news' => 'Новости',
            'card' => 'Аркан',
            'deck' => 'Колода',
            'spread' => 'Расклад',
            'memory' => 'Память',
            'profile' => 'Профиль',
            'lost' => 'Не найдена',
            'fail' => 'Перевод не найден',
            'celtic-cross' => 'Кельтский крест',
            'ishtar-travel' => 'Путешествие Иштар'
        );
    }

    $path = $_SERVER[REQUEST_URI];
    require_once 'controller/Controller.php';
    $controller = new Controller($path);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $title = $controller->getTitle(getTranslate());
        $navbar = $controller->getNav(getTranslate());
        $content = '';

        if (!$controller->subpage) {
            $controller->subpage = 'basic';
        }

        require 'view/'.ucfirst($controller->page).'/'.$controller->page.'_'.$controller->subpage.'.php';
        include_once('view/layout.php');
    }

//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($path == '/getDeckList') {
            return $controller->getDeckList();
        }
//    }
?>

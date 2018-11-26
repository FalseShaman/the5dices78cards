<?php
    session_start();
    require_once 'model/connection.php';

    //  PHP don't care admin
    //     $connect = new connection();
    //     $result = $connect->db->query('');
    //     $result = $connect->db->query('');
    //     $response = array();
    //     if ($result->num_rows > 0) {
    //         while($row = $result->fetch_assoc()) {
    //             $response[] = $row;
    //         }
    //     }
    //     var_dump($response);
    // die();

    // User creator
    // require_once 'model/user.php';
    // $user = new user('kush', 'tengri');
    // $result = $user->create('Посох, Мантия, Спелбук, Специализация, Колода, Имя, Ритуал, Словарь, Рост - цена, Развитие - польза, Колода - цель, Орден - тайна');
    // var_dump($result); die();


    function getTranslate() {
        return array(
            'new' => 'Новый',
            'open' => 'Открыть',
            'save' => 'Сохранить',
            'auth' => 'Авторизация',
            'profile' => 'Профиль',
            'spread' => 'Расклад',
            'story' => 'История',
            'article' => 'Статья',
            'quest' => 'Квест',
            'lost' => 'Не найдена',
            'logout' => 'Выход',
            'fail' => 'Перевод не найден'
        );
    }

    // DeckUpdate
    // function getDeckList() {
    //     $folder = scandir('/app/gallery/');
    //     return array_diff($folder, array('.', '..'));
    // }

    $folder = scandir('/app/view/design/background/');
    $backList = array_diff($folder, array('.', '..'));
    $backLine = implode('|', $backList);

    $path = $_SERVER['REQUEST_URI'];
    require_once 'model/controller.php';
    $controller = new Controller($path);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (!isset($_SESSION['user'])) {
            $controller->page = 'auth';
            $controller->subpage = 'basic';
        }
        if ($controller->page == 'auth' && $controller->subpage == 'logout') {
            $controller->logoutAuth();
        }

        $title = $controller->getTitle(getTranslate());
        $leftMenu = $controller->getNav(getTranslate());
        $content = '';

        require 'view/'.ucfirst($controller->page).'/'.$controller->page.'_'.$controller->subpage.'.php';
        include_once('view/layout.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $controller->subpage != 'basic' ? $controller->subpage.ucfirst($controller->page) : 'urlNotFound';
        echo json_encode($controller->$action());
    }
?>

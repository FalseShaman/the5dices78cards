<?php
    session_start();
    var_dump($_SESSION);
    require_once 'model/connection.php';

    function getTranslate() {
        return array(
            'new' => 'Новый',
            'open' => 'Открыть',
            'save' => 'Сохранить',
            'auth' => 'Авторизация',
            'card' => 'Аркан',
            'profile' => 'Профиль',
            'spread' => 'Расклад',
            'lost' => 'Не найдена',
            'logout' => 'Выход',
            'fail' => 'Перевод не найден',
            'celtic-cross' => 'Кельтский крест',
            'ishtar-travel' => 'Путешествие Иштар',
            '78doors' => '78 дверей',
            'ghosts' => 'Призраки',
            'lovecraft' => 'Гримуар',
            'manara' => 'Манара',
            'nightsun' => 'Ночное солнце',
            'shamans' => 'Шаманы',
            'thoth' => 'Кроули',
            'vargo' => 'Варго',
            'yearweel' => 'Колесо года',
            'majorArcana' => array(
                'Шут', 'Маг', 'Жрица', 'Императрица', 'Император', 'Иерофант', 'Связь', 'Колесница', 'Сила/Правосудие', 'Отшельник', 'Фортуна',
                'Сила/Правосудие', 'Повешенный', 'Смерть', 'Искусство', 'Дьявол', 'Башня', 'Звезда', 'Луна', 'Солнце', 'Суд', 'Мир'
            ),
            'minorArcana' => array(1,2,3,4,5,6,7,8,9,10, 'Слуга', 'Воин', 'Владычица', 'Владыка')
        );
    }

    function getDeckList() {
        $folder = scandir('/app/gallery/');
        return array_diff($folder, array('.', '..'));
    }

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

        require 'model/view/'.ucfirst($controller->page).'/'.$controller->page.'_'.$controller->subpage.'.php';
        include_once('view/layout.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $controller->subpage != 'basic' ? $controller->subpage.ucfirst($controller->page) : 'urlNotFound';
        echo json_encode($controller->$action());
    }
?>

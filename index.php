<?php

    function getTranslate() {
        return array(
            'new' => 'Новый',
            'open' => 'Открыть',
            'save' => 'Сохранить',
            'news' => 'Новости',
            'card' => 'Аркан',
            'deck' => 'Колода',
            'spread' => 'Расклад',
            'memory' => 'Память',
            'profile' => 'Профиль',
            'lost' => 'Не найдена',
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


    $path = $_SERVER[REQUEST_URI];
    require_once 'model/controller.php';
    $controller = new Controller($path);

//    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//        $title = $controller->getTitle(getTranslate());
//        $leftMenu = $controller->getNav(getTranslate());
//        $content = '';
//
//        if (!$controller->subpage) {
//            $controller->subpage = 'basic';
//        }
//
//        require 'view/'.ucfirst($controller->page).'/'.$controller->page.'_'.$controller->subpage.'.php';
//        include_once('view/layout.php');
//    }

//    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//        if ($path == '/save/spread') {
//            $controller->saveSpread();
//        }
//    }

$servername = "b8rg15mwxwynuk9q.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
$username = "nujevyt4qcj34azb";
$password = "a7m9vja0q5lgqcj6";
$dbname = "ldv471cmnrt1s6aw";
$port = 3306;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

$conn->query('CREATE TABLE IF NOT EXISTS user (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(390) NOT NULL,
                pass VARCHAR(390) NOT NULL,
                folder VARCHAR(390) NOT NULL,
                register VARCHAR(390) NOT NULL,
                last_login VARCHAR(390) NOT NULL,
                UNIQUE KEY (name))');
if ($conn) {
    echo 'moon';
}


?>

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

    $dsn = "pgsql:"
        . "host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com;"
        . "dbname=daabdc45roinq9;"
        . "user=xxruwosifumind;"
        . "port=5432;"
        . "sslmode=require;"
        . "password=76c9995e9184ee542182e0e34f3355898b82ec454aea38ff676d298c913d5da6";

//    $db = new PDO($dsn);
//
//    $db->exec('CREATE TABLE spread (
//                           id SERIAL,
//                           title VARCHAR (200),
//                           map VARCHAR (250)');
//    $result = $db->exec('INSERT INTO spread (title, map)
//                           ("hi", "there"), ("hao", "here")');
$host        = "host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com";
$port        = "port=5432";
$dbname      = "dbname=daabdc45roinq9";
$credentials = "user=xxruwosifumind password=76c9995e9184ee542182e0e34f3355898b82ec454aea38ff676d298c913d5da6";

    $conn = pg_connect( " $url $host $port $dbname $credentials"  );

//    $query = 'CREATE TABLE spread (
//                           id SERIAL,
//                           title VARCHAR (200),
//                           map VARCHAR (250))';
//    $result = pg_query($conn,$query);
//    var_dump(pg_fetch_array ($result));
//
//    $query = 'INSERT INTO spread (title, map) VALUES
//                               ("stop", "never"), ("die", "no")';
//    $result = pg_query($conn,$query);
//    var_dump(pg_fetch_array ($result));
$result = pg_query($conn,'SELECT id, title, map FROM spread');
    var_dump(pg_fetch_array ($result));
//$tableList = [];
//    while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
//        $tableList[] = $row['table_name'];
//    }


?>

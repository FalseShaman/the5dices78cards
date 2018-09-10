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
$data = extract(parse_url($_ENV["DATABASE_URL"]));
var_dump($data);

$dsn = "pgsql:"
    . "host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com;"
    . "dbname=daabdc45roinq9;"
    . "user=xxruwosifumind;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=76c9995e9184ee542182e0e34f3355898b82ec454aea38ff676d298c913d5da6";

$db = new PDO($dsn);

    $db->exec('CREATE TABLE IF NOT EXISTS spread (
                           id SERIAL PRIMARY KEY,
                           title CHARACTER (200) NOT NULL,
                           map CHARACTER (250) NOT NULL');

    var_dump($controller->getTables());

    if($db){
        echo "Connected <br />".$db;
    }else {
        echo "Not connected";
    }

    $db->query("SELECT table_name 
                                       FROM information_schema.tables 
                                       WHERE table_schema= 'public' 
                                            AND table_type='BASE TABLE'
                                       ORDER BY table_name");
    $tableList = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $tableList[] = $row['table_name'];
    }

    var_dump($tableList);

?>

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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//        if ($path == '/save/spread') {
//            $controller->saveSpread();
//        }

// Соединение, выбор базы данных
        $dbconn = pg_connect("host=ec2-54-217-245-9.eu-west-1.compute.amazonaws.com dbname=daabdc45roinq9 user=xxruwosifumind password=5432")
        or die('Не удалось соединиться: ' . pg_last_error());

// Выполнение SQL-запроса
        $query = 'CREATE TABLE Spread(
                       id INT NOT NULL,
                       title VARCHAR(200) NOT NULL,
                       map VARCHAR(250) NOT NULL,      
                       PRIMARY KEY (id)';
        $result = pg_query($query) or die('Ошибка запроса: ' . pg_last_error());

// Вывод результатов в HTML
        echo "<table>\n";
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";

// Очистка результата
        pg_free_result($result);

// Закрытие соединения
        pg_close($dbconn);


    }

?>

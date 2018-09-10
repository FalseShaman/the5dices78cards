<?php

    class Controller
    {
        public $page;
        public $subpage;
        
        public $pages = array(
            'news' =>
                array(),
            'card' =>
                array(),
            'deck' =>
                array(),
            'spread' =>
                array('new', 'open',),
            'memory' =>
                array(),
            'profile' =>
                array(),
            'lost' =>
                array()
            );
                
        function __construct($path = '/') {
            $this->page = 'spread';
            $this->subpage = 'new';
        }

        public function getTitle($translateList) {
            return isset($translateList[$this->page]) ? $translateList[$this->page] : $translateList['fail'];
        }

        public function getNav($translateList) {
            $navbar = '';
            foreach ($this->pages['spread'] as $page)
            {
                $navbar .= $this->page == $page ? '<li class="nav-item active">' : '<li class="nav-item">';
                $navbar .= '<a class="nav-link" href="/spread/'.$page.'">'.ucfirst($translateList[$page]).'</a></li>';
            }
            return $navbar;
        }

        public function saveSpread() {
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

            $result = '';
            if ($_POST['name']) {
                $result .= $_POST['name'];
            }
            if ($_POST['map']) {
                $result .= $_POST['map'];
            }
            return $result;
        }
    }
    
?>

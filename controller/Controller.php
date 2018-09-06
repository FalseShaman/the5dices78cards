<?php

    class Controller
    {
        public $view;
        public $model;
        
        public $routes = array(
            'news' =>
                array(),
            'card' => 
                array(),
            'deck' => 
                array(),
            'spread' => 
                array('ishtar-travel', 'celtic-cross'),
            'memory' => 
                array(),
            'profile' => 
                array(),
            'lost' =>
                array()
            );
                        
                
        function __construct($path = '/') {
            if ($path == '/') {
                $this->view = 'news';
                $this->model = 'basic';
            } else {
                $parts = explode('/', $path);
                $this->view = isset($this->routes[$parts[1]]) ? $parts[1] : 'lost';
                if (isset($parts[2])) {
                    if (in_array($parts[2], $this->routes[$parts[1]])) {
                        $this->model = $parts[2];
                    } else {
                        $this->view = 'lost';
                    }
                }
            }
        }

        public function getTitle() {
            $translateList = $this->getTranslate();
            return isset($translateList[$this->view]) ? $translateList[$this->view] : $translateList['fail'];
        }

        public function getNav() {
            $translateList = $this->getTranslate();
            $navbar = '';
            foreach ($this->routes as $view => $data)
            {
                $navbar .= $this->view == $view ? '<li class="nav-item active">' : '<li class="nav-item">';
                $navbar .= '<a class="nav-link" href="/'.$view.'">'.ucfirst($translateList[$view]).'</a></li>';
            }
            return $navbar;
        }

        public function getTranslate() {
            return array(
                'news' => 'Новости',
                'card' => 'Аркан',
                'deck' => 'Колода',
                'spread' => 'Расклад',
                'memory' => 'Память',
                'profile' => 'Профиль',
                'lost' => 'Не найдена',
                'fail' => 'Перевод не найден'
            );
        }
    }
    
?>

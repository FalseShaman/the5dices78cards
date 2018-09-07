<?php

    class Controller
    {
        public $page;
        public $model;
        
        public $pages = array(
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
                $this->page = 'news';
                $this->model = 'basic';
            } else {
                $parts = explode('/', $path);
                $this->page = isset($this->pages[$parts[1]]) ? $parts[1] : 'lost';
                if (isset($parts[2])) {
                    if (in_array($parts[2], $this->pages[$parts[1]])) {
                        $this->model = $parts[2];
                    } else {
                        $this->page = 'lost';
                    }
                }
            }
        }

        public function getTitle() {
            $translateList = $this->getTranslate();
            return isset($translateList[$this->page]) ? $translateList[$this->page] : $translateList['fail'];
        }

        public function getNav() {
            $translateList = getTranslate();
            $navbar = '';
            foreach ($this->pages as $page => $data)
            {
                $navbar .= $this->page == $page ? '<li class="nav-item active">' : '<li class="nav-item">';
                $navbar .= '<a class="nav-link" href="/'.$page.'">'.ucfirst($translateList[$page]).'</a></li>';
            }
            return $navbar;
        }
    }
    
?>

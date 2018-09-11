<?php

    class Controller
    {
        public $page;
        public $subpage;
        public $test;
        
        public $pages = array(
            'auth' =>
                array('login', 'register', 'logout'),
            'card' =>
                array(),
            'spread' =>
                array('open', 'save', 'remove'),
            'lost' =>
                array()
            );
                
        function __construct($path = '/') {
            $parts = explode('/', $path);
            if ($parts[1] && $parts[1] > '' && isset($this->pages[$parts[1]])) {
                $this->page = $parts[1];
                if ($parts[2] && $parts[2] > '' && in_array($parts[2], $this->pages[$parts[1]])) {
                    $this->subpage = $parts[2];
                }
            }

            if (!$this->page) {
                $this->page = 'lost';
            }
            if (!$this->subpage) {
                $this->subpage = 'basic';
            }
        }

        public function getTitle($translateList) {
            return isset($translateList[$this->page]) ? $translateList[$this->page] : $translateList['fail'];
        }

        public function getNav($translateList) {
            $navbar = '';
            foreach ($this->pages as $page => $sub)
            {
                $navbar .= $this->page == $page ? '<li class="nav-item active">' : '<li class="nav-item">';
                $navbar .= '<a class="nav-link" href="/'.$page.'">'.ucfirst($translateList[$page]).'</a></li>';
            }
            return $navbar;
        }

        public function loginAuth() {
            return array($_POST['username'], $_POST['pass']);
        }

        public function registerAuth() {
            return array($_POST['username'], $_POST['pass']);
        }

        public function logoutAuth() {
            return array($_POST['username']);
        }

        public function openSpread() {
            return array($_POST['id']);
        }

        public function saveSpread() {
            return array($_POST['title'], $_POST['map']);
        }

        public function removeSpread() {
            return array($_POST['id'], $_POST['user_id']);
        }

        public function urlNotFound() {
            return 'Url not found';
        }
    }
    
?>

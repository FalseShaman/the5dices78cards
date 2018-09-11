<?php

    class Controller
    {
        public $page;
        public $subpage;
        public $test;
        
        public $pages = array(
            'auth' =>
                array('login', 'register', 'logout'),
            'profile' =>
                array('save'),
            'card' =>
                array(),
            'spread' =>
                array('open', 'save', 'remove'),
            'lost' =>
                array()
            );
                
        function __construct($path = '/') {
            if ($path == '/') {
                $path = '/spread';
            }
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
            if ($this->page != 'auth') {
                $pageList = $this->pages;
                unset($pageList['auth']);
                unset($pageList['lost']);
                foreach ($pageList as $page => $sub)
                {
                    $navbar .= $this->page == $page ? '<li class="nav-item active">' : '<li class="nav-item">';
                    $navbar .= '<a class="nav-link" href="/'.$page.'">'.ucfirst($translateList[$page]).'</a></li>';
                }
                $navbar .= '<li class="nav-item"><a class="nav-link" href="/auth/logout">'.ucfirst($translateList['logout']).'</a></li>';
            }
            return $navbar;
        }

        public function loginAuth() {
            require_once 'user.php';
            $user = new User($_POST['username'], $_POST['pass']);
            $userData = $user->auth();
            if ($userData) {
                return array('status' => 'done');
            } else {
                return array('status' => 'fail', 'message' => 'Ошибка авторизации');
            }
        }

        public function registerAuth() {
            require_once 'user.php';
            $user = new User($_POST['username'], $_POST['pass']);
            if ($user->getOne()) {
                return array('status' => 'fail', 'message' => 'Имя занято');
            }
            if ($user->save()) {
                return array('status' => 'done');
            } else {
                return array('status' => 'fail', 'message' => 'Не удалось сохранить');
            }
        }

        public function logoutAuth() {
            unset($_SESSION['user']);
            header('HTTP/1.1 200 OK');
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth');
            exit;
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

<?php

    class Controller
    {
        public $page;
        public $subpage;

        public $pages = array(
            'auth' =>
                array('login', 'logout'),
            'profile' =>
                array('open', 'save'),
            'spread' =>
                array('open', 'save'),
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
            $user = new User($_POST['name'], $_POST['pass']);
            $userData = $user->auth();
            if ($userData) {
                return array('status' => 'done');
            } else {
                return array('status' => 'fail', 'message' => 'Ошибка авторизации    -    '.$_POST['name'].'      -         '.$_POST['pass']);
            }
        }

        public function logoutAuth() {
            unset($_SESSION['user']);
            header('HTTP/1.1 200 OK');
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth');
            exit;
        }

        public function saveSpread() {
            $user = json_decode($_SESSION['user']);

            require_once 'spread.php';
            $spread = new spread($user->id, $_POST['title']);
            if ($spread->save()) {
                return array('status' => 'done');
            } else {
                return array('status' => 'fail', 'message' => 'Не удалось сохранить');
            }
        }

        public function urlNotFound() {
            return 'Url not found';
        }
    }

?>

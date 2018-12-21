<?php
    class Controller
    {
        public $page;
        public $subpage;
// Page list
        public $pages = array(
            'auth' =>
                array('login', 'logout'),
            'profile' =>
                array(),
            'spread' =>
                array('get', 'put', 'putPosition', 'getPosition', 'removePosition'),
            'story' =>
                array(),
            'article' =>
                array(),
            'quest' =>
                array(),
            'wave' =>
                array(),
            'lost' =>
                array()
            );
// Url reader
        function __construct($path = '/') {
        // Default page
            if ($path == '/') {
                $path = '/spread';
            }
        // Url parts
            $parts = explode('/', $path);
            if ($parts[1] && $parts[1] > '' && isset($this->pages[$parts[1]])) {
                $this->page = $parts[1];
                if ($parts[2] && $parts[2] > '' && in_array($parts[2], $this->pages[$parts[1]])) {
                    $this->subpage = $parts[2];
                }
            }
        // 404
            if (!$this->page) {
                $this->page = 'lost';
            }
            if (!$this->subpage) {
                $this->subpage = 'basic';
            }
        }
// Main menu
        public function getMenu() {
            $navbar = '';
            $pageList = array('Расклад' => 'spread');

            foreach ($pageList as $name => $page)
            {
                $navbar .= $this->page == $page ? '<li class="nav-item active">' : '<li class="nav-item">';
                $navbar .= '<a class="nav-link" href="/'.$page.'">'.$name.'</a></li>';
            }
            $navbar .= '<li class="nav-item"><a class="nav-link" href="/auth/logout">Выход</a></li>';

            return $navbar;
        }
// Auth
        public function loginAuth() {
            require_once 'user.php';
            $user = new User($_POST['name'], $_POST['pass']);
            $userData = $user->auth();

            if ($userData) {
                return array('status' => 'done');
            } else {
                return array('status' => 'fail', 'message' => 'Ошибка авторизации');
            }
        }
        public function logoutAuth() {
            unset($_SESSION['user']);
            header('HTTP/1.1 200 OK');
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth');
            exit;
        }
// Create-Update spread (ajax response)
        public function putSpread() {
            $user = json_decode($_SESSION['user']);
            require_once 'spread.php';
            $spread = new spread($user->id, $_POST['title'], $_POST['specification'], $_POST['history']);

            if (isset($_POST['id']) && $_POST['id'] > 0) {
                $spreadId = $spread->update($_POST['id']);
            } else {
                $spreadId = $spread->create();
            }

            if ($spreadId) {
                return array('status' => 'done', 'id' => $spreadId);
            } else {
                return array('status' => 'fail', 'message' => 'Не удалось сохранить', 'data' => $spread);
            }
        }
// Read spread (ajax response)
        public function getSpread() {
            $spreadId = (isset($_POST['id']) && $_POST['id']) > 0 ? $_POST['id'] : 0;

            if ($spreadId > 0) {
                require_once 'spread.php';
                $spread = spread::getOne($spreadId);

                require_once 'position.php';
                $positionList = position::getList($spreadId);

                return array('status' => 'done', 'data' => array('spread' => $spread, 'positionList' => $positionList));  
            }
            return array('status' => 'fail', 'message' => 'Пусто');      
        }
// Create-Update position (ajax response)
        public function putPositionSpread() {
            require_once 'position.php';
            $position = new position($_POST['spread'], $_POST['place'], $_POST['name'], $_POST['number'], $_POST['description'], $_POST['link'], $_POST['card'], $_POST['frame']);
            
            if (isset($_POST['id']) && $_POST['id'] > 0) {
                $positionId = $position->update($_POST['id']);
            } else {
                $positionId = $position->create();
            }

            if ($positionId) {
                return array('status' => 'done', 'id' => $positionId);
            } else {
                return array('status' => 'fail', 'message' => 'Не удалось сохранить', 'data' => $position);
            }
        }
// Read position (ajax response)
        public function getPositionSpread() {
            $positionId = (isset($_POST['id']) && $_POST['id']) > 0 ? $_POST['id'] : 0;

            if ($positionId > 0) {
                require_once 'position.php';
                $position = position::getOne($positionId);

                return array('status' => 'done', 'data' => $position);   
            }
            return array('status' => 'fail', 'message' => 'Пусто');
        }
// Delete position
        public function removePositionSpread() {
            $positionId = (isset($_POST['id']) && $_POST['id']) > 0 ? $_POST['id'] : 0;

            if ($positionId > 0) {
                require_once 'position.php';
                $position = position::removeOne($positionId);
            }
        }
// 404
        public function urlNotFound() {
            return 'Url not found';
        }
    }

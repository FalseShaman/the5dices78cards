<?php

    class Controller
    {
        public $page;
        public $subpage;
        
        public $pages = array(
            'login' =>
                array(),
            'card' =>
                array(),
            'spread' =>
                array('new', 'open'),
            'profile' =>
                array(),
            'lost' =>
                array()
            );
                
        function __construct($path = '/') {
            $parts = explode('/', $path);
            if ($parts[1] && $parts[1] > '' && isset($this->pages[$parts[1]])) {
                $this->page = $parts[1];
                if ($parts[2] && $parts[2] > '' && isset($this->pages[$this->page][$parts[2]])) {
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

        public function saveSpread() {

        }
    }
    
?>

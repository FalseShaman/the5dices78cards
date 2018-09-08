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
                array('new', 'open'),
            'memory' =>
                array(),
            'profile' =>
                array(),
            'lost' =>
                array()
            );
                        
                
        function __construct($path = '/') {
            if ($path == '/open') {
                $this->page = 'spread';
                $this->subpage = 'open';
            } else {
                $this->page = 'spread';
                $this->subpage = 'new';
            }
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
    }
    
?>

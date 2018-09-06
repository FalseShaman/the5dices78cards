<?php

    class Controller
    {
        public $path;
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
                array('ishtar-travel'),
            'memory' => 
                array(),
            'profile' => 
                array(),
            'lost' =>
                array()
            );
                        
                
        function __construct($path = '/') {
            $this->path = $path == '/' ? '/news' : $path;
        }
        
        public function createRoute() {
            $parts = explode('/', $this->path);
            
            $this->view = isset($this->routes[$parts[1]]) ? $parts[1] : 'lost';
            
            if (isset($parts[2]) && in_array($parts[2], $this->routes[$parts[1]])) {
                $this->model = $parts[2];   
            }
        }
    }
    
?>

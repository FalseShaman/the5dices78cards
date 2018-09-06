<?php

    class Controller
    {
        public $path;
        public $view;
        public $model;
        
        public $routes = array(
            'home' =>
                array(),
            'card' => 
                array(),
            'deck' => 
                array(),
            'spread' => 
                array(),
            'memory' => 
                array(),
            'profile' => 
                array(),
            'lost' =>
                array()
            );
                        
                
        function __construct($path = '/') {
            $this->path = $path == '/' ? '/home' : $path;
        }
        
        public function createRoute() {
            $parts = explode('/', $this->path);
            
            $this->view = isset($this->routes[$parts[1]]) ? $parts[1] : 'lost';
            
            if (isset($parts[2]) && isset($this->routes[$parts[1]][$parts[2]])) {
                $this->model = $parts[2];   
            }
        }
    }
    
?>

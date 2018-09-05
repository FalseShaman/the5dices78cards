<?php

    class Controller
    {
        public $path;
        
        public $view = 'home';
        public $model = 'base';
                
        function __construct($path = '/') {
            $this->path = $path;
        }
        
        public function createRoute() {
            $parts = explode('/', $this->path);
            
            if (isset($parts[1]) && $parts[1] > '') {
                $this->view = $parts[1];
            }
            if (isset($parts[2]) && $parts[2] > '') {
                $this->model = $parts[2];
            }
            
            if (count($parts) > 3) {
                $this->view = 'lost';
            }
        }
    }
    
?>

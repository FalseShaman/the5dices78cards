<?php

    class Controller
    {
        public $path;
        
        public $view = 'home';
        private $viewlList = ['home', 'lost'];
        
        public $model = 'base';
        private $modelList = ['home', 'lost'];
                
        function __construct($path = '/') {
            $this->path = $path;
        }
        
        public function createRoute() {
            $parts = explode('/', $this->path);
            
            if (isset($parts[1]) && in_array($parts[1], $this->viewlList)) {
                $this->view = $parts[1];
            }
            if (isset($parts[2]) && in_array($parts[2], $this->modelList)) {
                $this->model = $parts[2];
            }
            
            if (count($parts) > 3) {
                $this->model = 'base';
                $this->view = 'lost';
            }
        }
    }
    
?>

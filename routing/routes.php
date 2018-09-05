<?php

    class Router
    {
        public $path;
        
        public $name = 'lost';
        public $action;
        public $param;
                
        function __construct($path = '/404') {
            $this->path = $path;
        }
        
        public function getController() {
            $parts = explode('/', $this->path);
            
            if (isset($parts[0]) && $parts[0] > '') {
                $this->name = $parts[0];
            }
            if (isset($parts[1]) && $parts[1] > '') {
                $this->action = $parts[1];
            }
            if (isset($parts[2]) && $parts[2] > '') {
                $this->param = $parts[2];
            }
        }
    }
    
?>

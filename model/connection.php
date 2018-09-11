<?php
    class connection
    {
        protected $servername = "b8rg15mwxwynuk9q.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
        protected $username = "nujevyt4qcj34azb";
        protected $password = "a7m9vja0q5lgqcj6";
        protected $dbname = "ldv471cmnrt1s6aw";
        protected $port = 3306;

        public $db;

        function __construct() {
            $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);
        }
    }
?>
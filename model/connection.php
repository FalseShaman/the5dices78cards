<?php
    class connection
    {
        protected $servername = "fdb24.awardspace.net";
        protected $username = "2916518_spread";
        protected $password = "wind2spread";
        protected $dbname = "2916518_spread";
        protected $port = 3306;

        public $db;

        function __construct() {
            $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname, $this->port);
        }
    }
?>
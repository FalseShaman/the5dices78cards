<?php
    include('connection.php');
    class user {
        /*
        CREATE TABLE IF NOT EXISTS user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(390) NOT NULL,
        pass VARCHAR(390) NOT NULL,
        folder VARCHAR(390) NOT NULL,
        register VARCHAR(390) NOT NULL)
        */

        public $username;
        public $pass;

        public function __construct($username = '', $pass = '') {
            $this->username = $username;
            $this->pass = $pass;
        }

        public function getList() {
            return connection::runQuery('SELECT * FROM user', 1);
        }

        public function getOne() {
            return connection::runQuery('SELECT * FROM user WHERE name = '.$this->username, 1);
        }

        public function save() {
            $folder = md5($this->pass.$this->username, true);
            return connection::runQuery('INSERT INTO user (name, pass, folder, register) VALUES ('.$this->username.', '.$this->pass.', '.$folder.', NOW())');
        }
    }
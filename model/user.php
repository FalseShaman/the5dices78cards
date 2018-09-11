<?php
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
            $username = mysqli::real_escape_string($this->username);
            return connection::runQuery('SELECT * FROM user WHERE name = "'.$username.'"', 1);
        }

        public function save() {
            $username = mysqli::real_escape_string($this->username);
            $pass = mysqli::real_escape_string($this->pass);
            $folder = md5($pass.$username);
            $query = 'INSERT INTO user (name, pass, folder, register) VALUES ("'.$username.'", "'.$pass.'", "'.$folder.'", NOW())';
            $insert = connection::runQuery($query);
            return $insert;
//            if ($insert['status']) {
//                return $this->getOne();
//            } else {
//                return $insert['data'];
//            }
        }
    }
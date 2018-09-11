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

        function __construct($username = '', $pass = '') {
            $this->username = $username;
            $this->pass = $pass;
        }

        public function getList() {
            $connect = new connection();
            return $connect->runQuery('SELECT * FROM user');
        }

        public function getOne() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            return $connect->runQuery('SELECT * FROM user WHERE name = "'.$username.'"');
        }

        public function save() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            $pass = $connect->db->real_escape_string($this->pass);
            $folder = md5($pass.$username);

            $result = $connect->runQuery('INSERT INTO user (name, pass, folder, register) VALUES ("'.$username.'", "'.$pass.'", "'.$folder.'", NOW())');
            if ($result) {
                $_SESSION['user'] = $result;
            }
            return $result;
        }

        public function auth() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            $pass = $connect->db->real_escape_string($this->pass);

            $result = $connect->runQuery('SELECT * FROM user WHERE name = "'.$username.'" AND pass = "'.$pass.'"');
            if ($result) {
                $_SESSION['user'] = $result;
            }
            return $result;
        }
    }
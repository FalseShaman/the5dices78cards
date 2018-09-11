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
            $result = $connect->db->query('SELECT * FROM user');

            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
            return $response;
        }

        public function getOne() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$username.'"');

            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        public function save() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            $pass = $connect->db->real_escape_string($this->pass);
            $folder = md5($pass.$username);

            $result = $connect->db->query('INSERT INTO user (name, pass, folder, register) VALUES ("'.$username.'", "'.$pass.'", "'.$folder.'", NOW())');

            if ($result) {
                $this->auth();
            }
            return $result;
        }

        public function auth() {
            $connect = new connection();
            $username = $connect->db->real_escape_string($this->username);
            $pass = $connect->db->real_escape_string($this->pass);

            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$username.'" AND pass = "'.$pass.'"');

            if ($result && $result->num_rows > 0) {
                $_SESSION['user'] = json_encode($result->fetch_assoc());
                return true;
            } else {
                return false;
            }
        }
    }
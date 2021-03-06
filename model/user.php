<?php
    class user {
        /*
        CREATE TABLE IF NOT EXISTS user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(390) NOT NULL,
        pass VARCHAR(390) NOT NULL,
        register VARCHAR(390) NOT NULL,
        role ENUM("watcher", "writer", "wizard"))
        */

        public $name;
        public $pass;
        public $role;

        function __construct($name = '', $pass = '', $role = '') {
            $this->name = $name;
            $this->pass = $pass;
            $this->role = $role;
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
            $username = $connect->db->real_escape_string($this->name);
            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$name.'"');

            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        public function auth() {
            $connect = new connection();
            $name = $connect->db->real_escape_string($this->name);
            $pass = $connect->db->real_escape_string($this->pass);

            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$name.'" AND pass = "'.$pass.'"');

            if ($result->num_rows > 0) {
                $_SESSION['user'] = json_encode($result->fetch_assoc());
                return true;
            }
            return false;
        }
    }
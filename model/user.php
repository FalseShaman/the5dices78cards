<?php
    class user {
        /*
        CREATE TABLE IF NOT EXISTS user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(390) NOT NULL,
        pass VARCHAR(390) NOT NULL,
        register VARCHAR(390) NOT NULL,
        rules VARCHAR(390) NOT NULL,
        specialization VARCHAR(390) DEFAULT NULL,
        decks VARCHAR(390) DEFAULT NULL)
        */

        public $name;
        public $pass;

        function __construct($name = '', $pass = '') {
            $this->name = $name;
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
            $username = $connect->db->real_escape_string($this->name);
            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$name.'"');

            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        public function create($rules = '') {
            $connect = new connection();
            $name = $connect->db->real_escape_string($this->name);
            $pass = $connect->db->real_escape_string($this->pass);
            $rules = $connect->db->real_escape_string($rules);
            $result = $connect->db->query('INSERT INTO user (name, pass, register, rules) VALUES ("'.$name.'", "'.$pass.'", NOW()), "'.$rules.'"');
            return $result;
        }

        public function auth() {
            $connect = new connection();
            $name = $connect->db->real_escape_string($this->name);
            $pass = $connect->db->real_escape_string($this->pass);

            $result = $connect->db->query('SELECT * FROM user WHERE name = "'.$name.'" AND pass = "'.$pass.'"');
            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
            return $response;

            if ($result && $result->num_rows > 0) {
                $_SESSION['user'] = json_encode($result->fetch_assoc());
                return true;
            } else {
                return false;
            }
        }
    }
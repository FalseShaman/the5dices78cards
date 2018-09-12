<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        map VARCHAR(30) NOT NULL,
        user_id INT(6) UNSIGNED NOT NULL)
        */

        public $user_id;

        function __construct($username = '', $pass = '') {
            $this->username = $username;
            $this->pass = $pass;
        }

        public function getList() {
            $connect = new connection();
            $user_id = $connect->db->real_escape_string($this->user_id);
            $result = $connect->db->query('SELECT * FROM spread WHERE user_id = '.$user_id);

            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
            return $response;
        }

        public function save($title, $map, $user_id) {
            $connect = new connection();
            $title = $connect->db->real_escape_string($title);
            $map = $connect->db->real_escape_string($map);
            $user_id = $connect->db->real_escape_string($user_id);
            return $connect->runQuery('INSERT INTO spread (title, map, user_id) VALUES ("'.$title.'", "'.$map.'", '.$user_id.')');
        }
    }
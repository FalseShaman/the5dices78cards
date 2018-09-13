<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(390) NOT NULL,
        map VARCHAR(390) NOT NULL,
        user_id INT(6) UNSIGNED NOT NULL)
        */

        public $user_id;
        public $title;
        public $map;

        function __construct($user_id = '', $title = '', $map = '') {
            $this->user_id = $user_id;
            $this->title = $title;
            $this->map = $map;
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

        public function save() {
            $connect = new connection();
            $user_id = $connect->db->real_escape_string($this->user_id);
            $title = $connect->db->real_escape_string($this->title);
            $map = $connect->db->real_escape_string(json_encode($this->map));

            return $connect->db->query('INSERT INTO spread (title, map, user_id) VALUES ("'.$title.'", "'.$map.'", '.$user_id.')');
        }
    }
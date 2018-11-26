<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(390) NOT NULL,
        height TINYINT UNSIGNED NOT NULL,
        length TINYINT UNSIGNED NOT NULL,
        user_id INT(6) UNSIGNED NOT NULL)
        */

        public $user_id;
        public $title;
        public $height;
        public $length;

        function __construct($user_id = '', $title = '', $height = 0, $length = 0) {
            $this->user_id = $user_id;
            $this->title = $title;
            $this->height = $height;
            $this->length = $length;
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
            $height = $connect->db->real_escape_string($this->height);
            $length = $connect->db->real_escape_string($this->length);

            $result = $connect->db->query('INSERT INTO spread (title, user_id, height, length) VALUES ("'.$title.'", '.$user_id.', '.$height.', '.$length.')');

            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }
    }
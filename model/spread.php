<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(390) NOT NULL,
        height TINYINT UNSIGNED NOT NULL,
        length TINYINT UNSIGNED NOT NULL,
        specification VARCHAR(660) DEFAULT NULL,
        history VARCHAR(660) DEFAULT NULL,
        user_id INT(6) UNSIGNED NOT NULL)
        */

        public $user_id;
        public $title;
        public $height;
        public $length;
        public $specification;
        public $history;

        function __construct($user_id = '', $title = '', $height = 0, $length = 0, $specification = '', $history = '') {
            $this->user_id = $user_id;
            $this->title = $title;
            $this->height = $height;
            $this->length = $length;
            $this->specification = $specification;
            $this->history = $history;
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

        public function update($spreadId) {
            $connect = new connection();
            $spread_id = $connect->db->real_escape_string($spreadId);
            $user_id = $connect->db->real_escape_string($this->user_id);
            $title = $connect->db->real_escape_string($this->title);
            $specification = $connect->db->real_escape_string($this->specification);
            $history = $connect->db->real_escape_string($this->history);

            $result = $connect->db->query('UPDATE spread SET title = "'.$title.'", specification = "'.$specification.'", history = "'.$history.'" 
                                            WHERE id = '.$spread_id.' AND user_id = '.$user_id);

            if ($result) {
                return $spreadId;
            } else {
                return false;
            }
        }

        public function create() {
            $connect = new connection();
            $user_id = $connect->db->real_escape_string($this->user_id);
            $title = $connect->db->real_escape_string($this->title);
            $height = $connect->db->real_escape_string($this->height);
            $length = $connect->db->real_escape_string($this->length);
            $specification = $connect->db->real_escape_string($this->specification);
            $history = $connect->db->real_escape_string($this->history);

            $result = $connect->db->query('INSERT INTO spread (title, user_id, height, length, specification, history) VALUES ("'.$title.'", '.$user_id.', '.$height.', '.$length.', "'.$specification.'", "'.$history.'")');

            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }
    }
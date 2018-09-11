<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        map VARCHAR(30) NOT NULL,
        user_id INT(6) UNSIGNED NOT NULL)
        */

        public function getList() {
            $connect = new connection();
            return $connect->runQuery('SELECT * FROM spread', 1);
        }

        public function save($title, $map, $user_id) {
            $connect = new connection();
            $title = $connect->db->real_escape_string($title);
            $map = $connect->db->real_escape_string($map);
            $user_id = $connect->db->real_escape_string($user_id);
            return $connect->runQuery('INSERT INTO spread (title, map, user_id) VALUES ("'.$title.'", "'.$map.'", '.$user_id.')');
        }
    }
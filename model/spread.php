<?php
    include('connection.php');
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        map VARCHAR(30) NOT NULL)
        */

        public function getList() {
            return connection::runQuery('SELECT * FROM spread');
        }

        public function save($title, $map, $user_id) {
            return connection::runQuery('INSERT INTO spread (title, map, user_id) VALUES ('+$title+', '+$map+', '+$user_id+')');
        }
    }
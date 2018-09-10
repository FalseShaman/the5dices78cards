<?php
    include('connection.php');
    class user {
        /*
        CREATE TABLE IF NOT EXISTS user (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(390) NOT NULL,
        pass VARCHAR(390) NOT NULL,
        folder VARCHAR(390) NOT NULL,
        register VARCHAR(390) NOT NULL,
        last_login VARCHAR(390) NOT NULL)
        */

        public function getList() {
            return connection::runQuery('SELECT * FROM user');
        }

        public function getOne($name = '') {
            connection::runQuery('UPDATE user SET last_login = NOW()');
            return connection::runQuery('SELECT * FROM user WHERE name = '+$name);
        }

        public function save($title, $map, $user_id) {
            return connection::runQuery('INSERT INTO user (name, pass, folder, register, last_login) VALUES ('+$title+', '+$map+', '+$user_id+', NOW(), NOW())');
        }
    }
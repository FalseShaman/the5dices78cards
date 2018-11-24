<?php
    class position {
        /*
        CREATE TABLE IF NOT EXISTS position (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(390) NOT NULL,
        number SMALLINT UNSIGNED NOT NULL,
        description TEXT NOT NULL,
        spread_id INT(6) UNSIGNED NOT NULL)
        */

        public $spread_id;
        public $name;
        public $number;
        public $description;

        public function __construct($spread_id = '', $name = '', $number = '', $description = '') {
            $this->spread_id = $spread_id;
            $this->name = $name;
            $this->number = $number;
            $this->description = $description;
        }
    }
?>
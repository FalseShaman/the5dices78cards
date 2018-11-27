<?php
    class position {
        /*
        CREATE TABLE IF NOT EXISTS position (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        place SMALLINT UNSIGNED NOT NULL,
        name VARCHAR(390) NOT NULL,
        number SMALLINT UNSIGNED NOT NULL,
        description VARCHAR(660) DEFAULT NULL,
        link VARCHAR(660) DEFAULT NULL,
        card VARCHAR(660) DEFAULT NULL,
        spread_id INT(6) UNSIGNED NOT NULL)
        */

        public $spread_id;
        public $place;
        public $name;
        public $number;
        public $description;
        public $link;
        public $card;

        public function __construct($spread_id = 0, $place = 0, $name = '', $number = 0, $description = '', $link = '', $card = '') {
            $this->spread_id = $spread_id;
            $this->place = $place;
            $this->name = $name;
            $this->number = $number;
            $this->description = $description;
            $this->link = $link;
            $this->card = $card;
        }

        public function update($positionId) {
            $connect = new connection();
            $position_id = $connect->db->real_escape_string($positionId);
            $spread_id = $connect->db->real_escape_string($this->spread_id);
            $place = $connect->db->real_escape_string($this->place);
            $name = $connect->db->real_escape_string($this->name);
            $number = $connect->db->real_escape_string($this->number);
            $description = $connect->db->real_escape_string($this->description);
            $link = $connect->db->real_escape_string($this->link);
            $card = $connect->db->real_escape_string($this->card);

            $result = $connect->db->query('UPDATE position SET name = "'.$name.'", number = '.$number.', description = "'.$description.'", link = "'.$link.'", card = "'.$card.'" 
                                            WHERE id = '.$position_id.' AND spread_id = '.$spread_id);

            if ($result) {
                return $positionId;
            } else {
                return false;
            }
        }

        public function create() {
            $connect = new connection();
            $place = $connect->db->real_escape_string($this->place);
            $name = $connect->db->real_escape_string($this->name);
            $number = $connect->db->real_escape_string($this->number);
            $description = $connect->db->real_escape_string($this->description);
            $link = $connect->db->real_escape_string($this->link);
            $card = $connect->db->real_escape_string($this->card);
            $spread_id = $connect->db->real_escape_string($this->spread_id);

            $result = $connect->db->query('INSERT INTO spread (place, name, number, description, link, card, spread_id) 
                                            VALUES ('.$place.', "'.$name.'", '.$number.', "'.$description.'", "'.$link.'", "'.$card.'", '.$spread_id.')');

            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }
    }
?>
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
        frame VARCHAR(660) DEFAULT NULL,
        spread_id INT(6) UNSIGNED NOT NULL)
        */

        public $spread_id;
        public $place;
        public $name;
        public $number;
        public $description;
        public $link;
        public $card;
        public $frame;

        public function __construct($spread_id = 0, $place = 0, $name = '', $number = 0, $description = '', $link = '', $card = '', $frame = '') {
            $this->spread_id = $spread_id;
            $this->place = $place;
            $this->name = $name;
            $this->number = $number;
            $this->description = $description;
            $this->link = $link;
            $this->card = $card;
            $this->frame = $frame;
        }

        public function create() {
            $connect = new connection();
            $place = $connect->db->real_escape_string($this->place);
            $name = $connect->db->real_escape_string($this->name);
            $number = $connect->db->real_escape_string($this->number);
            $description = $connect->db->real_escape_string($this->description);
            $link = $connect->db->real_escape_string($this->link);
            $card = $connect->db->real_escape_string($this->card);
            $frame = $connect->db->real_escape_string($this->frame);
            $spread_id = $connect->db->real_escape_string($this->spread_id);

            $result = $connect->db->query('INSERT INTO position (place, name, number, description, link, card, frame, spread_id) 
                                            VALUES ('.$place.', "'.$name.'", '.$number.', "'.$description.'", "'.$link.'", "'.$card.'", "'.$frame.'", '.$spread_id.')');
            
            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }

        public function update($positionId = 0) {
            $connect = new connection();
            $position_id = $connect->db->real_escape_string($positionId);
            $spread_id = $connect->db->real_escape_string($this->spread_id);
            $place = $connect->db->real_escape_string($this->place);
            $name = $connect->db->real_escape_string($this->name);
            $number = $connect->db->real_escape_string($this->number);
            $description = $connect->db->real_escape_string($this->description);
            $link = $connect->db->real_escape_string($this->link);
            $card = $connect->db->real_escape_string($this->card);
            $frame = $connect->db->real_escape_string($this->frame);

            $result = $connect->db->query('UPDATE position SET name = "'.$name.'", number = '.$number.', description = "'.$description.'", link = "'.$link.'", card = "'.$card.'", frame = "'.$frame.'" 
                                            WHERE id = '.$position_id.' AND spread_id = '.$spread_id);

            if ($result) {
                return $positionId;
            } else {
                return false;
            }
        }

        public static function getList($spreadId = 0) {
            $connect = new connection();
            $spread_id = $connect->db->real_escape_string($spreadId);
            $result = $connect->db->query('SELECT * FROM position WHERE spread_id = '.$spread_id);

            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
            return $response;
        }

        public static function getOne($id = 0) {
            $connect = new connection();
            $id = $connect->db->real_escape_string($id);
            $result = $connect->db->query('SELECT * FROM position WHERE id = '.$id);

            if ($result && $result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        }

        public static function removeOne($id = 0) {
            $connect = new connection();
            $id = $connect->db->real_escape_string($id);
            $result = $connect->db->query('DELETE FROM position WHERE id = '.$id);

            if ($result) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
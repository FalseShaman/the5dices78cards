<?php
    class position {
        /*
        CREATE TABLE IF NOT EXISTS position (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        spread_id INT(6) UNSIGNED NOT NULL,
        name VARCHAR(390) NOT NULL,
        description VARCHAR(660) DEFAULT NULL,
        number SMALLINT UNSIGNED NOT NULL,
        example VARCHAR(660) DEFAULT NULL)
        */

        public $spread_id;
        public $name;
        public $description;
        public $number;
        public $example;

        public function __construct($spread_id = 0, $name = '', $description = '', $number = 0, $example = '') {
            $this->spread_id = $spread_id;
            $this->name = $name;
            $this->description = $description;
            $this->number = $number;
            $this->example = $example;
        }

        public function create() {
            $connect = new connection();
            $spread_id = $connect->db->real_escape_string($this->spread_id);
            $name = $connect->db->real_escape_string($this->name);
            $description = $connect->db->real_escape_string($this->description);
            $number = $connect->db->real_escape_string($this->number);
            $example = $connect->db->real_escape_string($this->example);

            $result = $connect->db->query('INSERT INTO position (spread_id, name, description, number, example) 
                                            VALUES ('.$spread_id.', "'.$name.'", '.$description.', "'.$number.'", "'.$example.'")');
            
            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }

        // public function update($positionId = 0) {
        //     $connect = new connection();
        //     $position_id = $connect->db->real_escape_string($positionId);
        //     $spread_id = $connect->db->real_escape_string($this->spread_id);
        //     $name = $connect->db->real_escape_string($this->name);
        //     $description = $connect->db->real_escape_string($this->description);
        //     $number = $connect->db->real_escape_string($this->number);
        //     $example = $connect->db->real_escape_string($this->example);

        //     $result = $connect->db->query('UPDATE position SET name = "'.$name.'", description = "'.$description.'", number = '.$number.', example = "'.$example.'" 
        //                                     WHERE id = '.$position_id.' AND spread_id = '.$spread_id);

        //     if ($result) {
        //         return $positionId;
        //     } else {
        //         return false;
        //     }
        // }

        // public static function removeOne($id = 0) {
        //     $connect = new connection();
        //     $id = $connect->db->real_escape_string($id);
        //     $result = $connect->db->query('DELETE FROM position WHERE id = '.$id);

        //     if ($result) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

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

        // public static function getOne($id = 0) {
        //     $connect = new connection();
        //     $id = $connect->db->real_escape_string($id);
        //     $result = $connect->db->query('SELECT * FROM position WHERE id = '.$id);

        //     if ($result && $result->num_rows > 0) {
        //         return $result->fetch_assoc();
        //     } else {
        //         return false;
        //     }
        // }
    }
?>
<?php
    class spread {
        /*
        CREATE TABLE IF NOT EXISTS spread (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED NOT NULL,
        name VARCHAR(390) NOT NULL,
        description VARCHAR(660) DEFAULT NULL,
        geometryCode VARCHAR(660) DEFAULT NULL)
        */

        public $user_id;
        public $name;
        public $description;
        public $geometryCode;

        function __construct($user_id = '', $name = '', $description = '', $geometryCode = '') {
            $this->user_id = $user_id;
            $this->name = $name;
            $this->description = $description;
            $this->geometryCode = $geometryCode;
        }

        public function getList() {
            $connect = new connection();
            $result = $connect->db->query('SELECT * FROM spread');

            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
            return $response;
        }

        public function create() {
            $connect = new connection();
            $user_id = $connect->db->real_escape_string($this->user_id);
            $name = $connect->db->real_escape_string($this->name);
            $description = $connect->db->real_escape_string($this->description);
            $geometryCode = $connect->db->real_escape_string($this->geometryCode);

            $result = $connect->db->query('INSERT INTO spread (user_id, name, description, geometryCode) 
                                            VALUES ('.$user_id.', "'.$name.'", "'.$description.'", "'.$geometryCode.'")');

            if ($result) {
                return $connect->db->insert_id;
            } else {
                return false;
            }
        }

        // public function update($spreadId = 0) {
        //     $connect = new connection();
        //     $spread_id = $connect->db->real_escape_string($spreadId);
        //     $user_id = $connect->db->real_escape_string($this->user_id);
        //     $name = $connect->db->real_escape_string($this->name);
        //     $description = $connect->db->real_escape_string($this->description);
        //     $geometryCode = $connect->db->real_escape_string($this->geometryCode);

        //     $result = $connect->db->query('UPDATE spread SET name = "'.$name.'", description = "'.$description.'", geometryCode = "'.$geometryCode.'" 
        //                                     WHERE id = '.$spread_id.' AND user_id = '.$user_id);

        //     if ($result) {
        //         return $spreadId;
        //     } else {
        //         return false;
        //     }
        // }

        // public static function removeOne($id = 0) {
        //     $connect = new connection();
        //     $id = $connect->db->real_escape_string($id);
        //     $result = $connect->db->query('DELETE FROM spread WHERE id = '.$id);

        //     if ($result) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
        
        public static function getOne($id = 0) {
            $connect = new connection();
            $id = $connect->db->real_escape_string($id);
            $result = $connect->db->query('SELECT * FROM spread WHERE id = '.$id);

            if ($result && $result->num_rows > 0) {
                $spread = $result->fetch_assoc();
                require_once 'position.php';
                $spread['positionList'] = position::getList($spread['id']);
                return $spread;
            } else {
                return false;
            }
        }
    }
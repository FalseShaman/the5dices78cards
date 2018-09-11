<?php
    class connection {
        /* $type = 1 for SELECT, SHOW, DESCRIBE, EXPLAIN */
        public static function runQuery($request, $type = 0) {
            $servername = "b8rg15mwxwynuk9q.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
            $username = "nujevyt4qcj34azb";
            $password = "a7m9vja0q5lgqcj6";
            $dbname = "ldv471cmnrt1s6aw";
            $port = 3306;

            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            $query = mysqli_real_escape_string($conn, $request);

            $result = $conn->query($query);

            if ($result && $type == 1) {
                $response = array();
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $response[] = $row;
                    }
                }
                if (!empty($response)) {
                    return $response;
                } else {
                    return false;
                }
            } else {
                return array('status' => $result, 'data' => $query);
            }

        }
    }
?>
<?php
    class connection {
        public static function runQuery($request) {
            $servername = "b8rg15mwxwynuk9q.chr7pe7iynqr.eu-west-1.rds.amazonaws.com";
            $username = "nujevyt4qcj34azb";
            $password = "a7m9vja0q5lgqcj6";
            $dbname = "ldv471cmnrt1s6aw";
            $port = 3306;

            $conn = new mysqli($servername, $username, $password, $dbname, $port);
            $query = mysqli_real_escape_string($request);
            $result = $conn->query($query);
            $response = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }

            return $query;
        }
    }
?>
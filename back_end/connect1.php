<?php
class ConnectDB
{

    private $servername = "103.97.125.251";
    private $username = "truongna_hung_btl_db";
    private $password = "y8Xx5Q7cZpfv9pBx";
    private $dbname = "truongna_nam_btl_db";

    public function connect()
    {
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        mysqli_query($conn, "set names utf8");
        // check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            // echo "connect successfully";
        }
        return $conn;
    }
}

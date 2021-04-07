<?php
    $servername = "103.97.125.251"; 
    $username = "truongna_hung_btl_db"; 
    $password = "y8Xx5Q7cZpfv9pBx";   
    $dbname = "truongna_nam_btl_db"; 
    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_query($conn,"set names utf8");
    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "connect successfully";
    }
    echo "<br>";

        
?>
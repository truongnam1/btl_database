<?php
    include 'connect.php';

    $sql = "SELECT ten_chi_nhanh FROM chi_nhanh";
    $result = $conn->query($sql) ;
    $list_chi_nhanh = array();
    while($row = $result->fetch_assoc()) {
        $list_chi_nhanh[] = $row["ten_chi_nhanh"];
    }
    $conn->close();

    // for($i=0 ; $i<count($list_chi_nhanh) ; $i++) {
    //     echo $list_chi_nhanh[$i] . "<br>";
    // }

    
?>

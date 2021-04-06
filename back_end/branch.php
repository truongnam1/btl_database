<?php
    function listBranches() {
        include 'connect.php';

        
        //lay ma khu vuc
        $khu_vuc = array();
        $sql = "SELECT DISTINCT idkhu_vuc,ten_khu_vuc FROM khu_vuc";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $idkhu_vuc[$row["ten_khu_vuc"]] = $row["idkhu_vuc"];
        } 

        // echo "<pre>";
        // print_r($idkhu_vuc);
        // echo "<pre>";

        //
        $list_chi_nhanh = array();
        foreach($idkhu_vuc as $ten => $id) {
            $chi_nhanh = array();
            $sql = "SELECT ten_chi_nhanh FROM chi_nhanh WHERE idkhu_vuc = $id";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $chi_nhanh[] = $row["ten_chi_nhanh"];
            } 
            $list_chi_nhanh[$ten] = $chi_nhanh;
        }

        $conn->close();

        return $list_chi_nhanh;
    }

    //$list_chi_nhanh = listBranches();
    //// for($i=0 ; $i<count($list_chi_nhanh) ; $i++) {
    ////     echo $list_chi_nhanh[$i] . "<br>";
    //// }

    // echo "<pre>";
    // print_r($list_chi_nhanh);
    // echo "<pre>";
?>

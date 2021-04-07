<?php
    function listDish(){
        include 'connect.php';

        //lay ma thuc don
        $list_thuc_don = array();
        $sql = "SELECT idthuc_don,ten_thuc_don FROM thuc_don";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $list_thuc_don[$row["ten_thuc_don"]] = $row["idthuc_don"];
        } 

        // echo "<pre>";
        // print_r($list_thuc_don);
        // echo "<pre>";

        //
        $list_mon_an = array();
        foreach($list_thuc_don as $ten => $id) {
            $mon_an = array();
            $sql = "SELECT  gia, mo_ta, ten_mon_an FROM mon_an WHERE idthuc_don = $id";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $detail_mon_an = array();
                $detail_mon_an['gia'] = $row["gia"];
                $detail_mon_an['mo_ta'] = $row["mo_ta"];
                $mon_an[$row["ten_mon_an"]]  = $detail_mon_an;
            } 
            $list_mon_an[$ten] = $mon_an;
        }

        $conn->close();

        return $list_mon_an;
    }

    $list_mon_an = listDish();
    echo "<pre>";
    print_r($list_mon_an);
    echo "<pre>";
?>
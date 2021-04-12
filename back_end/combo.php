<?php
    function combo_id_Price() {
        include 'connect.php';

        $list_thuc_don = array();
        $sql = "SELECT idthuc_don,ten_thuc_don FROM thuc_don";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $list_thuc_don[$row["ten_thuc_don"]] = $row["idthuc_don"];
        }

        $listPrice = array();
        foreach($list_thuc_don as $ten => $id) {
            $combo = array();
            $sql = "SELECT gia, idcombo, name_combo FROM combo WHERE idthuc_don = $id";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $combo[$row["idcombo"]] = array();
                $combo[$row["idcombo"]]["gia"] = $row["gia"];
                $combo[$row["idcombo"]]["name_combo"] = $row["name_combo"];
                // $combo[$row["idcombo"]][] = $row["name_combo"];
            }
            $listPrice[$ten] = $combo;
        }

        $conn->close();

        return $listPrice;
    }

    // $comboPrice = combo_id_Price();
    // echo "<pre>";
    // print_r($comboPrice);
    // echo "<pre>";
?>
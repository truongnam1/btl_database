<?php
    function detailCombo($idcombo) {
        include 'connect.php';
        
        $detailCombo = array();
        $sql = "SELECT mon_an.gia, mon_an.mo_ta, mon_an.ten_mon_an FROM mon_an 
                INNER JOIN combo_monan ON mon_an.idmon_an = combo_monan.idmon_an
                WHERE combo_monan.idcombo = $idcombo ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $dish = array();
            $dish['gia'] = $row["gia"];
            $dish['mo_ta'] = $row["mo_ta"];
            $detailCombo[$row["ten_mon_an"]] = $dish;
        }
        return $detailCombo;
    }

    // $list_mon_an = detailCombo(101);
    // echo "<pre>";
    // print_r($list_mon_an);
    // echo "<pre>";
?>
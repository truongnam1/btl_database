<?php
    function detailCombo($idcombo) {
        include 'connect.php';
        
        $detailCombo = array();
        $sql = "SELECT mon_an.gia, mon_an.mo_ta, mon_an.ten_mon_an, mon_an.link_image FROM mon_an 
                INNER JOIN combo_monan ON mon_an.idmon_an = combo_monan.idmon_an
                WHERE combo_monan.idcombo = $idcombo ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $dish = array();
            $dish['gia'] = $row["gia"];
            $dish['mo_ta'] = $row["mo_ta"];
            $dish['link_image'] = $row["link_image"];
            $detailCombo[$row["ten_mon_an"]] = $dish;
        }
        return $detailCombo;
    }

    // $list_mon_an = detailCombo(101);

    // echo "<pre>";
    // print_r(detailCombo(101));
    // echo "<pre>";

    function detailNotInCombo(){
        include 'connect.php';

        $list = array();
        $fullId = array();
        $idInCombo = array();
        $idNotInCombo;
        //
        $sql = "SELECT idmon_an FROM mon_an";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $fullId[] = $row['idmon_an'];
        }

        // 
        $sql = "SELECT DISTINCT idmon_an FROM combo_monan";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $idInCombo[] = $row['idmon_an'];
        }
        $idNotInCombo = array_diff($fullId, $idInCombo);

        //
        foreach($idNotInCombo as $value) {
            $sql = "SELECT mon_an.gia, mon_an.mo_ta, mon_an.ten_mon_an, mon_an.link_image 
                    FROM mon_an 
                    WHERE idmon_an = $value";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $dish = array();
                $dish['gia'] = $row["gia"];
                $dish['mo_ta'] = $row["mo_ta"];
                $dish['link_image'] = $row["link_image"];
                $list[$row["ten_mon_an"]] = $dish;
            }
        }

        return $list;
    }

    // echo "<pre>";
    // print_r(detailNotInCombo());
    // echo "<pre>";
?>
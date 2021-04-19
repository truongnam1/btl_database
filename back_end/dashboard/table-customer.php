<?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    //lay arrayIdForm
    if(isset($_POST["type-status"]) && isset($_POST["dateForm"]) && isset($_POST["dateTo"])) {
        print_r($_POST);
        $trang_thai = $_POST["type-status"];
        $dateFrom = $_POST["dateForm"];
        $dateTo = $_POST["dateTo"];
        $ArrayIdForm = array();
        $sql = "SELECT idkhach_hang FROM khach_hang
                WHERE ngay_den BETWEEN '$dateFrom' AND '$dateTo'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $ArrayIdForm[] = $row['idkhach_hang'];
        }
        echo json_encode($ArrayIdForm);
    }


    //query idForm
    if(isset($_POST["idForm"])) {
        $array = [];
        
        foreach ($_POST["idForm"] as $key => $value) {
            $arrayTemp = array();
            $idban_an ;

            //
            $sql = "SELECT fullname, email, so_nguoi, sdt, thoi_gian_den, ngay_den, loi_nhan, trang_thai 
                    FROM khach_hang
                    WHERE idkhach_hang = $value";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $arrayTemp["fullName"] = $row["fullName"] . $value;
            $arrayTemp["email"] = $row["email"];
            $arrayTemp["amountPeople"] = $row["so_nguoi"];
            $arrayTemp["phoneNumber"] = $row["sdt"];
            $arrayTemp["timestampComeTo"] = $row["ngay_den"] . ' ' . $row["thoi_gian_den"];
            $arrayTemp["note"] = $row["loi_nhan"];
            $arrayTemp["status"] = $row["trang_thai"];

            //
            $sql = "SELECT idban_an FROM dat_ban
                    WHERE idkhach_hang = $value";
            $result = $conn->query($sql);
            $arrayTemp["tables"] = array();
            while($row = $result->fetch_assoc()) {
                $arrayTemp["tables"][] = $row['idban_an'];
                $idban_an = $row['idban_an'];
            }

            // 
            $sql = "SELECT chi_nhanh.ten_chi_nhanh FROM chi_nhanh
                    INNER JOIN ban_an ON ban_an.idchi_nhanh = chi_nhanh.idchi_nhanh
                    WHERE ban_an.idban_an = $idban_an";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $arrayTemp["branch"] = $row['ten_chi_nhanh'];

            //
            $array[] = $arrayTemp;
        }
        
        echo json_encode($array);

    }



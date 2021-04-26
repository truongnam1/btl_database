<?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    /**
     * nếu chỉ có $_POST["type-status"] có dữ liệu, những biến khác trống thì lấy tất cả theo type-status
     * nếu $_POST["dateForm"] có dữ liệu và $_POST["dateTo"] trống thì lấy từ $_POST["dateForm"] đến ngày hiện tại
     * nếu $_POST["dateTo"] có dữ liệu và $_POST["dateForm"] trống thì lấy từ đấu đến $_POST["dateTo"]
     */
    //lay arrayIdForm
    $sql;
    // if(isset($_POST["type-status"]) && $_POST["type-status"] == 'all') {
    //     $dateFrom = $_POST["dateForm"];
    //     $dateTo = $_POST["dateTo"];
    //     if(!empty($dateFrom) && !empty($dateTo)) {
    //         $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //             WHERE ngay_den BETWEEN '$dateFrom' AND '$dateTo'";
    //     } else {
    //         $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang";
    //     }
    // } elseif(isset($_POST["type-status"]) && !empty($_POST["dateForm"]) && !empty($_POST["dateTo"])) {
    //     $trang_thai = $_POST["type-status"];
    //     $dateFrom = $_POST["dateForm"];
    //     $dateTo = $_POST["dateTo"];
    //     $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //             WHERE ngay_den BETWEEN '$dateFrom' AND '$dateTo' AND trang_thai = '$trang_thai'";

    // } elseif(isset($_POST["type-status"]) && empty($_POST["dateForm"]) && !empty($_POST["dateTo"])) {
    //     $trang_thai = $_POST["type-status"];
    //     $dateTo = $_POST["dateTo"];
    //     $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //             WHERE ngay_den <= '$dateTo' AND trang_thai = '$trang_thai'";

    // } elseif(isset($_POST["type-status"]) && !empty($_POST["dateForm"]) && empty($_POST["dateTo"])) {
    //     $trang_thai = $_POST["type-status"];
    //     $dateFrom = $_POST["dateForm"];
    //     $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //             WHERE ngay_den >= '$dateFrom' AND trang_thai = '$trang_thai'";
    // } elseif(isset($_POST["type-status"])) {
    //     $trang_thai = $_POST["type-status"];
    //     $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //                         WHERE trang_thai = '$trang_thai'";
    // }

    // if(isset($_POST["type-status"]) && $_POST["type-status"] == 'all') {
    //     $dateFrom = $_POST["dateForm"];
    //     $dateTo = $_POST["dateTo"];
    //     if(!empty($dateFrom) && !empty($dateTo)) {
    //         $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
    //             WHERE ngay_den BETWEEN '$dateFrom' AND '$dateTo'";
    //     } else {
    //         $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang";
    //     }
    // } else
    
    if( !empty($_POST["dateForm"]) && !empty($_POST["dateTo"])) {
        $trang_thai = $_POST["type-status"];
        $dateFrom = $_POST["dateForm"];
        $dateTo = $_POST["dateTo"];
        $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
                WHERE ngay_den BETWEEN '$dateFrom' AND '$dateTo'";
        if($trang_thai != 'all') {
            $GLOBALS['sql'] = $GLOBALS['sql'] . " AND trang_thai = '$trang_thai'";
        }

    } elseif( empty($_POST["dateForm"]) && !empty($_POST["dateTo"])) {
        $trang_thai = $_POST["type-status"];
        $dateTo = $_POST["dateTo"];
        $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
                WHERE ngay_den <= '$dateTo'";
        if($trang_thai != 'all') {
            $GLOBALS['sql'] = $GLOBALS['sql'] . " AND trang_thai = '$trang_thai'";
        }

    } elseif( !empty($_POST["dateForm"]) && empty($_POST["dateTo"])) {
        $trang_thai = $_POST["type-status"];
        $dateFrom = $_POST["dateForm"];
        $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang
                WHERE ngay_den >= '$dateFrom'";
        if($trang_thai != 'all') {
            $GLOBALS['sql'] = $GLOBALS['sql'] . " AND trang_thai = '$trang_thai'";
        }
    } elseif(isset($_POST["type-status"])) {
        $trang_thai = $_POST["type-status"];
        $GLOBALS['sql'] = "SELECT idkhach_hang FROM khach_hang";
        if($trang_thai != 'all') {
            $GLOBALS['sql'] = $GLOBALS['sql'] . " WHERE trang_thai = '$trang_thai'";
        }
    }


    
    if(isset($_POST["type-status"])) {
        $ArrayIdForm = array();
        $result = $conn->query($GLOBALS['sql']);
        while($row = $result->fetch_assoc()) {
            $ArrayIdForm[] = $row['idkhach_hang'];
        }
        echo json_encode($ArrayIdForm);
    }
    



    //query idForm
    if(isset($_POST["idForm"])) {
        $array = array();
        foreach ($_POST["idForm"] as $key => $value) {
            $arrayTemp = array();
            $idban_an;
            $value = (int)$value;

        
            //
            $sql = "SELECT fullname, email, so_nguoi, sdt, thoi_gian_den, ngay_den, ngay_dat, loi_nhan, trang_thai 
                    FROM khach_hang
                    WHERE idkhach_hang = $value";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $arrayTemp["idForm"] = $value;
            $arrayTemp["fullName"] = $row["fullname"];
            $arrayTemp["email"] = $row["email"];
            $arrayTemp["amountPeople"] = $row["so_nguoi"];
            $arrayTemp["phoneNumber"] = $row["sdt"];
            $arrayTemp["timeToCome"] = $row["thoi_gian_den"];
            $arrayTemp["dateToCome"] = $row["ngay_den"];
            $arrayTemp["note"] = $row["loi_nhan"];
            $arrayTemp["status"] = $row["trang_thai"];
            $arrayTemp["dateOrder"] = $row["ngay_dat"];


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
            if ($result->num_rows > 0) {
                $sql = "SELECT chi_nhanh.ten_chi_nhanh FROM chi_nhanh
                        INNER JOIN ban_an ON ban_an.idchi_nhanh = chi_nhanh.idchi_nhanh
                        WHERE ban_an.idban_an = $idban_an";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                $arrayTemp["branch"] = $row['ten_chi_nhanh'];
            } else {
                $arrayTemp["branch"] = '';
            }
            //
            $array[] = $arrayTemp;
        }
        
        echo json_encode($array);

    }

    /**
     * dữ liệu của 1 form sau khi được cập nhật và gửi về server
     * công việc: cập nhật lại db theo dữ liệu form gửi về
     */
    if (isset($_POST["update-row"])) {
        //
        $idkhach_hang = $_POST["update-row"]["idForm"];
        $fullName = $_POST["update-row"]["fullName"];
        $email = $_POST["update-row"]["email"];
        $amountPeople = $_POST["update-row"]["amountPeople"];
        $phoneNumber = $_POST["update-row"]["phoneNumber"];
        $branch = $_POST["update-row"]["branch"];
        $tables = $_POST["update-row"]["tables"];
        $dateToCome = $_POST["update-row"]["dateToCome"];
        $timeToCome = $_POST["update-row"]["timeToCome"];
        $dateOrder = $_POST["update-row"]["dateOrder"];
        $note = $_POST["update-row"]["note"];
        $status = $_POST["update-row"]["status"];

        //
        $sql = "UPDATE khach_hang 
                SET fullName = '$fullName', 
                    thoi_gian_den = '$timeToCome', 
                    ngay_den = '$dateToCome',
                    ngay_dat = '$dateOrder',
                    so_nguoi = '$amountPeople',
                    email = '$email',
                    sdt = $phoneNumber,
                    loi_nhan = '$note',
                    trang_thai = '$status'
                WHERE idkhach_hang = $idkhach_hang;";
        $conn->query($sql);

        //
        $sql = "DELETE FROM dat_ban WHERE idkhach_hang = $idkhach_hang;";
        $conn->query($sql);
        if(count($tables)>0 && $status != 'đã huỷ') {
            foreach($tables as $value) {
                $sql = "INSERT INTO dat_ban (idkhach_hang, idban_an) 
                        VALUES ($idkhach_hang, $value);";
                $conn->query($sql);
            }
        }
    }


<?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    /**
     * nếu chỉ có $_POST["type-status"] có dữ liệu, những biến khác trống thì lấy tất cả theo type-status
     * nếu $_POST["dateForm"] có dữ liệu và $_POST["dateTo"] trống thì lấy từ $_POST["dateForm"] đến ngày hiện tại
     * nếu $_POST["dateTo"] có dữ liệu và $_POST["dateForm"] trống thì lấy từ đấu đến $_POST["dateTo"]
     */
    //lay arrayIdForm, chưa xử lý type-status
    if(isset($_POST["type-status"]) && isset($_POST["dateForm"]) && isset($_POST["dateTo"])) {
        // print_r($_POST);
        $trang_thai = $_POST["type-status"];
        $dateFrom = $_POST["dateForm"];
        $dateTo = $_POST["dateTo"];
        //echo $dateFrom . " " . $dateTo ;
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
        // print_r($_POST);
        // form mới
    //     "idForm" => 1, 
    // "fullName" => "nam ",
    // "email" => "nam@gmail.com",
    // "amountPeople" => 5,
    // "phoneNumber" => "0123456789",
    // "branch" => "IPH IPHIPHIPHIPHIPHIPHI PHIPHIPHIPH",
    // "tables" => [101102, 101103],
    // "timeToCome" => "13:20",
    // "dateToCome" => "2021-06-29",
    // "dateOrder" => "2021-04-02",
    // "note" => "ghiiiiaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaa aaaaaaaaa",
    // "status" => "đã xử lý"
        $array = [];
        foreach ($_POST["idForm"] as $key => $value) {
            $arrayTemp = array();
            $idban_an;
            //echo " value: " . $value;
            $value = (int)$value;
            //$value = 34;
            //
            $sql = "SELECT fullname, email, so_nguoi, sdt, thoi_gian_den, ngay_den, ngay_dat, loi_nhan, trang_thai 
                    FROM khach_hang
                    WHERE idkhach_hang = $value";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $arrayTemp["idForm"] = $value;
            $arrayTemp["fullName"] = $row["fullname"] . " $value";
            $arrayTemp["email"] = $row["email"];
            $arrayTemp["amountPeople"] = $row["so_nguoi"];
            $arrayTemp["phoneNumber"] = $row["sdt"];
            $arrayTemp["timestampComeTo"] = $row["ngay_den"] . ' ' . $row["thoi_gian_den"];
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

    /**
     * dữ liệu của 1 form sau khi được cập nhật và gửi về server
     * công việc: cập nhật lại db theo dữ liệu form gửi về
     */
    if (isset($_POST["update-row"])) {

        print_r($_POST);
        // trong ($_POST["update-row"] là 1 mảng chứa
         //     "idForm" => 1, 
    // "fullName" => "nam ",
    // "email" => "nam@gmail.com",
    // "amountPeople" => 5,
    // "phoneNumber" => "0123456789",
    // "branch" => "IPH IP",
    // "tables" => [101102, 101103],
    // "timeToCome" => "13:20",
    // "dateToCome" => "2021-06-29",
    // "dateOrder" => "2021-04-02",
    // "note" => "ghiiiiaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaa aaaaaaaa aaaaaaaaa",
    // "status" => "đã xử lý"


    }


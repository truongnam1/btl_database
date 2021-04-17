<?php
    // include 'connect.php';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    include 'subsetSum.php';


    //insert data into database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['inputFullName-down'];
        $phoneNumber = (string)$_POST['inputPhoneNo-down'];
        $email = $_POST['inputEmail-down'];
        $local = $_POST['inputState-down'];
        $branch = $_POST['inputBranch-down'];
        $amountPeople = $_POST['inputAmountPeople'];
        $time = $_POST['time'] . ':00'; 
        $date = $_POST['date']; 
        $note = $_POST['note'];
    

        //insert to khach_hang
        $present = getdate();
        $ngay_dat = (string)$present['year'] . ':' . (string)$present['mon'] . ':' . (string)$present['mday'];
        $sql = "INSERT INTO khach_hang(fullname, thoi_gian_den, ngay_den, ngay_dat, so_nguoi, email, sdt, loi_nhan, trang_thai)
                VALUES ('$name', '$time', '$date', '$ngay_dat', '$amountPeople', '$email', '$phoneNumber', '$note', 'chưa xử lý')";
        $conn->query($sql);


        //idkhach_hang
        $idkhach_hang = $conn->insert_id; //last_id
        

        //idchi_nhanh
        $idchi_nhanh;
        $branch = substr($branch, 0, strpos($branch,'-'));
        $sql = "SELECT idchi_nhanh FROM chi_nhanh
                WHERE ten_chi_nhanh = '$branch' " ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $idchi_nhanh = $row['idchi_nhanh'];
        } 
        

        //idban_available
        $idban_available  = array();
        $sql = "SELECT ban_an.idban_an, ban_an.so_luong_ghe FROM ban_an
        LEFT JOIN dat_ban ON dat_ban.idban_an = ban_an.idban_an
        LEFT JOIN khach_hang ON khach_hang.idkhach_hang = dat_ban.idkhach_hang
        WHERE ban_an.id_chi_nhanh = $idchi_nhanh 
                AND (khach_hang.ngay_den = '$date' OR khach_hang.ngay_den IS NULL) 
                AND (khach_hang.thoi_gian_den != '$time' OR khach_hang.thoi_gian_den IS NULL)
        ORDER BY so_luong_ghe; ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $idban_available[$row['idban_an']] = $row['so_luong_ghe'];
        }


        //idban_an
        $idban_an = findIDban($idban_available,$amountPeople);
        // echo '<pre>';
        // print_r($idban_an);
        // echo '<pre>';

        //insert to dat_ban
        for($i=0 ; $i<count($idban_an) ; $i++) {
            $sql = "INSERT INTO dat_ban (idkhach_hang, idban_an)
                    VALUES ('$idkhach_hang', '$idban_an[$i]')";
            $conn->query($sql);
        }

    }

    // echo "<pre>";
    // print_r(getdate());
    // echo "<pre>";
    // $present = getdate();
    // $ngay_dat = (string)$present['year'] . ':' . (string)$present['mon'] . ':' . (string)$present['mday'];
    // echo $ngay_dat;
    // $conn->close();
?>
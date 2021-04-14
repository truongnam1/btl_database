<?php
    // include 'connect.php';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    //insert data into database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_POST['inputFullName-down'];
        $phoneNumber = $_POST['inputPhoneNo-down'];
        $email = $_POST['inputEmail-down'];
        $local = $_POST['inputState-down'];
        $branch = $_POST['inputBranch-down'];
        $amountPeople = $_POST['inputAmountPeople'];
        $time = $_POST['time']; //format chua dung
        $date = $_POST['date']; //format chua dung
        $note = $_POST['note'];
        
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";


        //insert to khach_hang
        $sql = "INSERT INTO khach_hang (fullname, email, sdt)
                VALUES ($name, $email ,$phoneNumber)";
        $conn->query($sql);

        //idkhach_hang
        $idkhach_hang = $conn->insert_id; //last_id

        //idchi_nhanh
        $idchi_nhanh;
        $sql = "SELECT idchi_nhanh FROM chi_nhanh
                WHERE ten_chi_nhanh = '$branch' " ;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $idchi_nhanh = $result->fetch_assoc(); 
            $idchi_nhanh = $idchi_nhanh["idchi_nhanh"];
        } 

        //idban_available
        $sql = "SELECT idban_an FROM ban_an
                WHERE id_chi_nhanh = $idchi_nhanh AND so_luong_ghe BETWEEN $amountPeople AND (2*$amountPeople)-1 ";
        $idban_available = $conn->query($sql);

        //idban_an
        $idban_an;
        while($row = $idban_available->fetch_assoc()) {
            $idban_an = $row["idban_an"];
            $sql = "SELECT idban_an FROM dat_ban
                    WHERE ngay_dat = $date AND thoi_gian_dat = $time AND idban_an = $idban_an";
            $result = $conn->query($sql);
            if ($result->num_rows = 0) {
                //idban khong bi trung
                break;
            } 
        }

        //insert to dat_ban
        $sql = "INSERT INTO dat_ban (idkhach_hang, idban_an, thoi_gian_dat, ngay_dat, loi_nhan)
                VALUES ($idkhach_hang, $idban_an, $time, $date , $text)";
        
        // if (empty($name)) {
        //   echo "Name is empty";
        // } else {
        //   echo $name;
        // }
    }
    $conn->close();
?>
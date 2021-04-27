<?php
// include 'connect.php';
session_start();
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
include 'subsetSum.php';


function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["datban"])) {
    $name = testInput($_POST['inputFullName-down']);
    $phoneNumber = testInput((string)$_POST['inputPhoneNo-down']);
    $email = testInput($_POST['inputEmail-down']);
    $local = testInput($_POST['inputState-down']);
    $branch = testInput($_POST['inputBranch-down']);
    $amountPeople = testInput($_POST['inputAmountPeople']);
    $time = testInput($_POST['time'] . ':00'); // thời gian đến
    $date = testInput($_POST['date']); // ngày đến
    $note = testInput($_POST['note']);

    if (!$name || !$phoneNumber || !$local || !$amountPeople || !$time  || !$date || !$time) {
        $_SESSION["status_datban"] = "error";
        header("Location: ../dat-ban/", true, 301);
        exit;
    }

    $regex_name = "/[\^<,\"\'@\/\{\}\(\)\*\$%\?=>:\|;#]+/i";
    $regex_email = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    $regex_numberPhone = '/^[0-9]+$/';

    if (preg_match($regex_name, $name) || !preg_match($regex_name, $email) || !preg_match($regex_numberPhone, $phoneNumber)) {
        $_SESSION["status_datban"] = "error";
        header("Location: ../dat-ban/", true, 301);
        exit;
    }


    // echo "name:" .  $name . "<br>";
    // echo "phoneNumber:" . $phoneNumber . "<br>";
    // echo "email:" . $email . "<br>";
    // echo "local:" . $local . "<br>";
    // echo "branch:" . $branch . "<br>";
    // echo "amountPeople:" . $amountPeople . "<br>";
    // echo "time:" . $time . "<br>";
    // echo "date:" . $date . "<br>";
    // echo "note:" . $note . "<br>";

    try {

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
        $branch = substr($branch, 0, strpos($branch, '-'));
        $sql = "SELECT idchi_nhanh FROM chi_nhanh
                WHERE ten_chi_nhanh = '$branch' ";
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
                WHERE ban_an.idchi_nhanh = $idchi_nhanh 
                AND (khach_hang.ngay_den = '$date' OR khach_hang.ngay_den IS NULL) 
                AND (khach_hang.thoi_gian_den != '$time' OR khach_hang.thoi_gian_den IS NULL)
                ORDER BY so_luong_ghe; ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $idban_available[$row['idban_an']] = $row['so_luong_ghe'];
        }


        //idban_an
        $idban_an = findIDban($idban_available, $amountPeople);
        // echo '<pre>';
        // print_r($idban_an);
        // echo '<pre>';

        //insert to dat_ban
        for ($i = 0; $i < count($idban_an); $i++) {
            $sql = "INSERT INTO dat_ban (idkhach_hang, idban_an)
                    VALUES ('$idkhach_hang', '$idban_an[$i]')";
            $conn->query($sql);
        }
        $_SESSION["status_datban"] = "ok";
        $conn->close();
        header("Location: ../dat-ban/", true, 301);
        exit;
    } catch (Exception $e) {
        echo "Lỗi đặt bàn, vui lòng thử lại <br>";
        echo '<button onclick="goBack()">Quay lại đặt bàn</button>';

        echo '<script>
        function goBack() {
          window.history.go(-1);
        }
        </script>';
        $_SESSION["status_datban"] = "error";
        header("Location: ../dat-ban/", true, 301);
        $conn->close();
        exit;
    }
} else {
    header("Location: ../dat-ban/", true, 301);
    exit;
}

// echo "<pre>";
// print_r(getdate());
// echo "<pre>";
// $present = getdate();
// $ngay_dat = (string)$present['year'] . ':' . (string)$present['mon'] . ':' . (string)$present['mday'];
// echo $ngay_dat;
// $conn->close();
header("Location: ../dat-ban/", true, 301);
exit;

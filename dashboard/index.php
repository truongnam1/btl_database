<?php
session_start();
// date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/dashboard/code_status.php';

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['login'])) {


    //Lấy dữ liệu nhập vào
    $username = testInput($_POST['username']);
    $password = testInput($_POST['password']);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        $_SESSION['code'] = getCode(3); // nhập thiếu tài khoản hoặc mật khẩu
        header("Location: login.php", true, 301);
        exit;
    }

    // mã hóa pasword
    $password = md5($password);

    $sql = "SELECT username, password, level FROM admin_user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($password != $row["password"]) {
            $_SESSION['code'] = getCode(8); // sai mật khẩu
            header("Location: login.php", true, 301);
            exit;
        } else if ($row["level"] == 0) {
            $_SESSION['code'] = getCode(7); // tài khoản bị khoá
            header("Location: login.php", true, 301);
            exit;
        } else if ($username == $row["username"] && $password == $row["password"] && $row["level"] == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $row["level"];
            // $_SESSION['code'] = getCode(1); // đăng nhập thành công
            header("Location: dashboard.php", true, 301);
            exit;
        }
    } else {
        $_SESSION['code'] = getCode(5); // Tài khoản k tồn tại
        header("Location: login.php", true, 301);
        exit;
    }
    exit;
}

if (isset($_POST['register'])) {
    $username = testInput($_POST['username']);
    $password = testInput($_POST['password']);
    $firstName = testInput($_POST['first-name']);
    $lastName = testInput($_POST['last-name']);
    $email = testInput($_POST['email']);

    if (!$username || !$password || !$email || !$firstName || !$lastName) {
        $_SESSION['code'] = getCode(20); // thiếu dữ liệu
        header("Location: register.php", true, 301);
        exit;
    } else if (checkUsernameTonTai($username)) {
        $_SESSION['code'] = getCode(22); // username tồn tại
        header("Location: register.php", true, 301);
        exit;
    } else if (checkEmailTonTai($email)) {
        $_SESSION['code'] = getCode(23); // email tồn tại
        header("Location: register.php", true, 301);
        exit;
    } else {


        $password = md5($password);
        $level = 0;
        $sql = "INSERT INTO admin_user(username, password, firstName, lastName, email, level)
        VALUES ('$username', '$password', '$firstName', '$lastName', '$email', '$level')";
        try {
            $result = $conn->query($sql);
        } catch (Exception $e) {
            echo "loi dang ki tai khoan";
            $_SESSION['code'] = getCode(4); // lỗi hệ thống
            header("Location: register.php", true, 301);
            exit;
        }
        $_SESSION['code'] = getCode(21); // đăng kí thành công
        header("Location: login.php", true, 301);
        exit;
    }
}

// tồn tại thì trả về true
function checkUsernameTonTai($username)
{
    global $conn;

    $sql = "SELECT username FROM admin_user WHERE username = '$username'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["username"] == $username) {
            return true;
        }
    }

    return false;
}


// nếu email tồn tại thì trả về true
function checkEmailTonTai($email)
{
    global $conn;

    $sql = "SELECT email FROM admin_user WHERE email = '$email'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row["email"] == $email) {
            return true;
        }
    }

    return false;
}

if (isset($_POST['reset-password'])) {
    $email = testInput($_POST['inputEmail']);

    if (!checkEmailTonTai($email)) {
        $_SESSION['code'] = getCode(30); // email k tồn tại
        header("Location: forgot-password.php", true, 301);
        exit;
    } else {
        include_once "../back_end/send-mail.php";
        $title = "";
        $body = "";
        $randToken = randString();
        $timePlus = 2; // phút
        $timeExp = time() + 60 * $timePlus;
        contentEmail($title, $body, $randToken, $timePlus);
        $sendMail = new SendMail($title, $body, $email);

        if ($sendMail->send()) {

            // global $conn;
            $randToken = md5($randToken);
            // $timeNow  = time() + 60*$timePlus;
            $sql = "UPDATE admin_user SET token = '$randToken', died_time_token = '$timeExp' WHERE (email = '$email')";

            $result = $conn->query($sql);
            $_SESSION["code"] = getCode(31); // thành công
            $_SESSION["statusEmail"] = true;
        } else {
            $_SESSION["code"] = getCode(32); // thất bại
            $_SESSION["statusEmail"] = false;
        }

        header("Location: forgot-password.php", true, 301);
    }
    exit;
}

if (isset($_GET["active"])) {
    $token = testInput($_GET["active"]);
    $token = md5($token);
    $sql = "SELECT token, username,died_time_token FROM admin_user WHERE token = '$token'";
    $result = $conn->query($sql);
    echo "length = $result->num_rows <br>";
    if ($result->num_rows > 0) {
        // echo "lon hon 0";
        $row = $result->fetch_assoc();
        // print_r($row);
        if ($row["token"] == $token && $row["died_time_token"] > time()) {
            $_SESSION["active"] = true;
            $_SESSION["username"] = $row["username"];
            $_SESSION["token"] = $row["token"];
            $_SESSION["died_time_token"] = $row["died_time_token"];
            // print_r($_SESSION);
            header("Location: new-password.php", true, 301);
            exit;
        } else if ($row["token"] == $token && $row["died_time_token"] < time()) {
            $_SESSION["code"] = getCode(34); // mã khôi phục hết hạn
            header("Location: login.php", true, 301);
            exit;
        }
    } else {
        $_SESSION["code"] = getCode(34); // mã khôi phục hết hạn
        header("Location: login.php", true, 301);
        exit;
    }

    header("Location: login.php", true, 301);
    exit;
}

if (isset($_POST["new-password"])) {
    $password  = testInput($_POST["password"]);

    $username = $_SESSION["username"];
    $password = md5($password);
    $randToken = md5($randToken);
    $timeNow  = time();
    $sql = "UPDATE admin_user SET token = '$randToken', died_time_token = '$timeNow', password = '$password' WHERE (username = '$username')";
    $result = $conn->query($sql);

    unset($_SESSION["active"]);
    unset($_SESSION["username"]);
    $_SESSION['code'] = getCode(33);
    header("Location: login.php", true, 301);
}

if (isset($_SESSION['username']) && isset($_SESSION['level']) == 1) {
    header("Location: dashboard.php", true, 301);
    exit;
}




function contentEmail(&$title, &$body, $randToken, $timePlus)
{
    $title = "Khôi phục mật khẩu";

    $body = '<p>Link khôi phục mật khẩu <p>
                <a href ="http://localhost/btl_database/dashboard/?active=' . $randToken . '"> http://localhost/btl_database/dashboard/?active=' . $randToken . '</a>';
    $body .= '<p><strong>Đường dẫn này sẽ hết hạn sau ' . $timePlus . ' phút kể từ thời gian gửi email</strong></p> ';
}

function randString()
{
    $str = "abcdefghiklmnorstpquvsxyzw123456789";
    $strRand = "";
    // echo "length = ". strlen($str). "<br>";
    for ($i = 0; $i < 30; $i++) {
        $strRand .= $str[rand(0, strlen($str) - 1)];
    }
    return $strRand;
}

header("Location: login.php", true, 301);
exit;

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function randString()
{
    $str = "abcdefghiklmnorstpquvsxyzw123456789";
    $strRand = "";
    echo "length = " . strlen($str) . "<br>";
    for ($i = 0; $i < 20; $i++) {
        $strRand .= $str[rand(0, strlen($str) - 1)];
    }
    return $strRand;
}

// echo randString();
function getFirstName()
{
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    $username = $_SESSION["username"];
    $sql = "SELECT firstName FROM admin_user WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["firstName"];
    }
    return "";
}

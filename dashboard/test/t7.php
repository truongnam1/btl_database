<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function randString() {
    $str ="abcdefghiklmnorstpquvsxyzw123456789";
    $strRand ="";
    echo "length = ". strlen($str). "<br>";
    for ($i=0; $i < 20; $i++) { 
        $strRand .= $str[rand(0,strlen($str) - 1)];
    }
    return $strRand;

}

// echo randString();
echo date_default_timezone_get();



?>
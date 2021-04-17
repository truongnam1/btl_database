<?php
// INSERT INTO 'truongna_nam_btl_db`.`ban_an` (`idban_an`, `so_luong_ghe`, `id_chi_nhanh`) VALUES ('102101', '4', '102');
// INSERT INTO `truongna_nam_btl_db`.`ban_an` (`idban_an`, `so_luong_ghe`, `id_chi_nhanh`) VALUES ('102102', '4', '102');
// INSERT INTO `truongna_nam_btl_db`.`ban_an` (`idban_an`, `so_luong_ghe`, `id_chi_nhanh`) VALUES ('102103', '6', '102');

$array = array();
$array['2'] = 2;
// $array['3'] = 1;
$array['4'] = 1;
$array['6'] = 4;
$array['8'] = 1;
$array['10'] = 6;
$array['12'] = 4;
$array['14'] = 2;
$array['16'] = 0;
$array['18'] = 0;
$array['20'] = 3;
$array['24'] = 3;
$array['30'] = 2;
$array['32'] = 3;
// $array['24'] = 3;
$array['50'] = 2;

// echo "<pre>";

// print_r($array);
// echo "</pre>";

 function showHang($idNhaHang, $arraySetUp, $minIdBan) {
    $string = "";
    $count = 100;
    // $idNhaHang = 105;
    foreach ($arraySetUp as $key => $value) {
        for($i = 1; $i <= $value; $i++) {
            $string = "INSERT INTO ban_an (idban_an, so_luong_ghe, id_chi_nhanh) 
        VALUES ('$idNhaHang$count', '$key', '$idNhaHang');";
        echo $string . "<br>";
        $count++;
        }
        
    }

 }

//  showHang(105, $array, 100);

//  foreach ($array as $key => $value) {
//      $rad = rand(1,100);
//      if($rad < 45) {
//         $array[$key] = 1;
//      } else if($rad < 60) {
//         $array[$key] = 2;
//      } else if($rad < 70) {
//         $array[$key] = 3;
//      } else {
//         $array[$key] = 4;
//      }
//  }

 for ($i=201; $i<= 228  ; $i++) { 
    foreach ($array as $key => $value) {
        $rad = rand(1,100);
        if($rad < 45) {
           $array[$key] = 2;
        } else if($rad < 60) {
           $array[$key] = 3;
        } else if($rad < 70) {
           $array[$key] = 4;
        } else {
           $array[$key] = 3;
        }
    }

    $array['2'] = rand(3,5);
    $array['4'] = rand(2,5);
    // echo "<pre>";

// print_r($array);
// echo "</pre>";
    showHang($i, $array, 100);
 }

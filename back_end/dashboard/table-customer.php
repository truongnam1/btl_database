<?php


/**
 * sau khi ấn "truy vấn",dữ liệu đẩy lên bằng post, post sẽ có 3 key: dateForm, dateTo, type-status.
 * Xử lý dữ liệu và trả về 1 json id form
 * convert từ array sang json bằng cách json_encode($demoArrayIdForm);
 * 
 */

 // demo id của form
$demoArrayIdForm = [];

// demo id của form, tương lai là lấy id từ db
for ($i=0; $i < 3500; $i++) { 
    $demoArrayIdForm[] = $i;
}


if(isset($_POST["type-status"])) {
    // trả dữ liệu về
    echo json_encode($demoArrayIdForm);


}




/**
 * dữ liệu đẩy lên bằng post, post sẽ có 1 key là idForm, $_POST["idForm"] là 1 array idForm
 * dữ liệu cần trả về là 1 json
 * 
 */


$demoArray = [
    
    "idForm" => 1, 
    "fullName" => "nam ",
    "email" => "nam@gmail.com",
    "phoneNumber" => "0123456789",
    "branch" => "IPH",
    "tables" => [101102, 101103],
    "timestampComeTo" => "2021-04-03 20:20PM",
    "dateOrder" => "2021-04-02",
    "note" => "ghiiii",
    "status" => "đang chờ phê duyệt1"

];


// cứ tạo mảng như bình thường rồi cuối cùng convert sang json là đc
if(isset($_POST["idForm"])) {
    $array = [];
    // print_r($_POST["idForm"]);
    foreach ($_POST["idForm"] as $key => $value) {
        $demoArrayTemp = $demoArray;
    
    // cái dòng này để test tên thôi chứ dữ liệu lấy từ db
    $demoArrayTemp["fullName"] = $demoArray["fullName"] . $value;


    $array[] = $demoArrayTemp;
    }
    // chuyển thành dạng json
    echo json_encode($array);

}

if(isset($_POST["type-status"])) {
    // print_r($_POST);
    echo json_encode($demoArrayIdForm);


}


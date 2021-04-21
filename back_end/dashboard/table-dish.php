<?php


$demoArrayDish = [];
for ($i=0; $i < 10; $i++) { 
    $demoArrayDish[] = $i;
}



/**
 * dataDish là string, hiện tại chỉ xử lý 1 trường hợp $_POST["dataDish"] = all
 * , all là lấy tất cả id các món ăn, trả về 1 mảng id món ăn 
 */
if(isset($_POST["dataDish"])) {
    echo json_encode($demoArrayDish);
}

//************************************************************************* */




$formDish = [
"idDish" => 4,
"dishName" => "đùi gà",
"conceptName" => "bbq alanticate",
"comboName" => "buffet 289k",// nếu món ăn k thuộc combo nào thì chỗ này có giá trị là "no"
"describe" => "ngon",
"imageLink" => "linkanh.jpg",
"price" => "12365" // giá món riêng thì là giá món riêng, nếu món ăn thuộc trong combo nào đó thì để trống giá tiền
];



/**
 * $_POST["idDish"] là 1 mảng id món ăn
 * cần trả về 1 mảng form món ăn như trên
 */
if(isset($_POST["idDish"])) {

    $arrayDataDish = [];

    // cái này để test, form k liên quan j đến cái này
    foreach ($_POST["idDish"] as $key => $value) {
        $tempDataDish = $formDish;
        $tempDataDish["idDish"] = $value;
        $tempDataDish["dishName"] = $formDish["dishName"]  . " test " . rand(1,2000);
        $tempDataDish["describe"] = $formDish["describe"]  . " test " . rand(1,2000);
        if (rand(1,200) > 100) {
            $tempDataDish["comboName"] = "no";
        }
        $arrayDataDish[] = $tempDataDish;
    }


    echo json_encode($arrayDataDish);
}



//******************************************************* */



// Array
// (
//     [0] => Array
//         (
//             [name] => dish-name
//             [value] => đùi gà test 1821
//         )

//     [1] => Array
//         (
//             [name] => concept-name
//             [value] => 1 // id concept
//         )

//     [2] => Array
//         (
//             [name] => combo-name
//             [value] => 102  // id combo
//         )

//     [3] => Array
//         (
//             [name] => describe
//             [value] => ngon test 1013
//         )

//     [4] => Array
//         (
//             [name] => image-link
//             [value] => linkanh.jpg
//         )

//     [5] => Array
//         (
//             [name] => dish-price
//             [value] => 123 
//         )

//     [6] => Array
//         (
//             [name] => id-dish
//             [value] => 6
//         )

// )
/**
 * $_POST["updateDish"]) trả về 1 mảng như trên
 * form được đẩy lên đây là món ăn sau khi được sửa 1 số thứ, cập nhật lại thông tin món ăn trong db.
 * cần trả về 1 form như bên dưới, thông tin bên dưới này là thông tin món ăn sau khi được cập nhật
 */

// "idDish" => 4,
// "dishName" => "đùi gà",
// "conceptName" => "bbq alanticate",
// "comboName" => "buffet 289k",// nếu món ăn k thuộc combo nào thì chỗ này có giá trị là "no"
// "describe" => "ngon",
// "imageLink" => "linkanh.jpg",
// "price" => "12365" // giá món riêng thì là giá món riêng, nếu món ăn thuộc trong combo nào đó thì để trống giá tiền


if(isset($_POST["updateDish"])) {
    // echo "<pre>";
    // print_r($_POST["updateDish"]);
    // echo "</pre>";

    echo json_encode($formDish);
}

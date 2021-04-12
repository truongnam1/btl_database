<?php
include_once '../back_end/combo.php';
include_once '../back_end/dish.php';
include_once '../back_end/detailCombo.php';

$conceptSelected = "";
$typeBuffet = "";
$minPrice = "";
$maxPrice = "";

// get data từ bên index.php
function getDataThucDon($conceptSelected_n, $typeBuffet_n, $minPrice_n, $maxPrice_n)
{
    global $conceptSelected, $typeBuffet, $minPrice, $maxPrice;

    $conceptSelected = $conceptSelected_n;
    $typeBuffet = $typeBuffet_n;
    $minPrice = $minPrice_n;
    $maxPrice = $maxPrice_n;
}

function showData()
{
    global $conceptSelected, $typeBuffet, $minPrice, $maxPrice;
    echo $conceptSelected . "\t" .  $typeBuffet . "\t" . $minPrice . "\t" . $maxPrice;
}

$combo = combo_id_Price();

function htmlComboBuffet($nameInputCkecked = "")
{

    global $combo;
    $html = "";
    foreach ($combo["King BBQ Buffet"] as $key => $value) {
        $html = $html . '<div class="form-check">
                        <label class="form-check-label">
                         <input type="radio" class="form-check-input" value="' . $key . '" name="typeBuffet"';
        if (($key) == $nameInputCkecked && !empty($nameInputCkecked)) {
            $html = $html . 'checked>' . $value['name_combo'] . '</label> </div>';
        } else {
            $html = $html . '>' . $value['name_combo'] . '</label> </div>';
        }
    }
    return $html;
}

function htmlTypeConcept($nameInputCkecked = "")
{
    global $combo;
    $nameConcepts = array_keys($combo);
    $html = "";

    foreach ($nameConcepts as $value) {
        $html = $html . '<div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" value="' . $value . '" name="conceptSelected"';

        if ($value == $nameInputCkecked && !empty($nameInputCkecked)) {
            $html = $html . 'checked>' . $value . '</label></div>';
        } else {
            $html = $html . '>' . $value . '</label></div>';
        }
    }
    return $html;
}

//chua xong
function arrayPrice($minPrice, $maxPrice, $array)
{
    return $array;
}

function htmlArrayItemMenu($conceptSelected, $typeBuffet, $minPrice, $maxPrice)
{
    // <div class="card content-item col-6 col-md-3" style="width:400px" code="ma concept">
    //     <img class="card-img-top" src="../assets/img/thuc-don/item-menu.png" alt="hình ảnh sản phẩm">
    //     <div class="card-body content-text-item">
    //         <h4 class="card-title name-item">Cái niêu</h4>
    //         <p class="card-text description-item">Đây là cái niêu</p>
    //         <div class="price-item">100000000 vnđ</div>
    //     </div>
    // </div>


    $htmlArrayItem  = array();
    $arrayItemMenu = array();

    if (empty($conceptSelected) && empty($typeBuffet) && empty($minPrice) && empty($maxPrice)) {
        // chua xong
        $arrayItemMenu = listDish()['King BBQ Buffet'];
    } else if ($conceptSelected == 'King BBQ Buffet') {
        if (empty($typeBuffet)) {
            $arrayItemMenu = listDish()['King BBQ Buffet'];
        } else {
            $arrayItemMenu = detailCombo($typeBuffet);
            if(count($arrayItemMenu) <= 0) {
            echo 'không có loại sản phẩm này';
            }

        }
    } else if ($conceptSelected == 'King BBQ Alacarte') {
        $arrayItemMenu = listDish()['King BBQ Alacarte'];
    }

    // $arrayItemMenu = arrayPrice($minPrice, $maxPrice, $arrayItemMenu);

    // [Đùi gà sốt BBQ] => Array
    //             (
    //                 [gia] => 229000
    //                 [mo_ta] => Thơm ngon mềm mịn
    //                 [link_image] => 
    //             )

    $code = $conceptSelected == 'King BBQ Buffet' ? 'buffet' : 'alacarte';


    foreach ($arrayItemMenu as $key => $item) {
        $htmlItem = '<div class="card content-item col-6 col-md-3" style="width:400px; height:auto" code="' . $code . '">
        <img style="height: auto; width: 100%" class="card-img-top" src="';

        if (empty($item['link_image'])) {
            // $htmlItem = $htmlItem . '../assets/img/thuc-don/unknown-img.jpg';
            $htmlItem = $htmlItem . 'https://dotobjyajpegd.cloudfront.net/photo/5d0c4e19bfeba50c0d3bcd6f_l';
            // https://dotobjyajpegd.cloudfront.net/photo/5d0c4e19bfeba50c0d3bcd6f_l
        } else {
            $htmlItem = $htmlItem . $item['link_image'];
        }
        $htmlItem = $htmlItem . '" alt="hình ảnh sản phẩm">
        <div class="card-body content-text-item">
        <h4 class="card-title name-item">' . $key . '</h4>
        <p class="card-text description-item">' . $item['mo_ta'] . '</p>';

        if ($code != 'buffet') {
            $htmlItem = $htmlItem . ' <div class="price-item">' . $item['gia'] . '</div>';
        } else {
            $htmlItem = $htmlItem . ' <div class="price-item"></div>';
        }

        $htmlItem = $htmlItem . '</div></div>';
        $htmlArrayItem[] =  $htmlItem;
    }
    return $htmlArrayItem;
}

function htmlItemMenu()
{
    global $conceptSelected, $typeBuffet, $minPrice, $maxPrice;
    $arrayhtmlItem = htmlArrayItemMenu($conceptSelected, $typeBuffet, $minPrice, $maxPrice);

    $beginRow = '<div class="row">';
    $endRow = '</div>';
    $count = 0;
    foreach ($arrayhtmlItem as $key => $value) {
        if ($key % 4 == 0) {
            echo $beginRow;
            $count = 0;
        }
        echo $value;
        $count++;
        if ($count == 4) {
            echo $endRow;
        }
    }
    // print_r(htmlArrayItemMenu($conceptSelected, $typeBuffet, $minPrice, $maxPrice)) ;
}






// echo '<form action="" method="get">';
// echo htmlcomboBuffet();
// echo '<button type="submit" class="btn btn-primary">Submit</button>';
// echo '</form>';

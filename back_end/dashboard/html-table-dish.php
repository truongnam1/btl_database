<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/dish.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/combo.php';


//tên concept

// <option value="chưa xử lý">buffet</option>
// <option value="đã xử lý">alnticale</option>

// ( [0] => buffet [1] => alanticate )
function htmlOptionConcept() {

    $html = "";
    $listConcept = nameConcept();
    foreach ($listConcept as $key => $name) {
        $html = $html . '<option value="' .$key. '">' . $name . '</option>';
    }
    return $html;
}


// tên combo
function htmlOptionCombo() {
    $html = "";
    $listCombo = combo_id_Price();
    foreach ($listCombo as $nameConcept => $listIdCombo) {
        foreach ($listIdCombo as $id => $value) {
            $html = $html . '<option code="'.$nameConcept.'" " value="' .$id. '">' . $value["name_combo"] . '</option>';

            // $html = $html . '<option code="'.$nameConcept.'" " value="' .$id. '">'.'<input type="checkbox" class="form-check-input" value="">' . $value["name_combo"] . '</option>';

        }
        // <input type="checkbox" class="form-check-input" value="">Option 2
    }
    $html = $html . '<option code="no" " value="no">không</option>';
    return $html;
}


if(isset($_POST["getCombo"])) {
    echo htmlOptionCombo();
}

if(isset($_POST["getConcept"])) {
    echo htmlOptionConcept();
}

// echo '<select name="concept-name" class="custom-select" id="concept-name">';                                                       
// echo htmlOptionCombo();
// echo ' </select>';

<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/combo.php';
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/detailCombo.php';

$combo = combo_id_Price();

function htmlComboBuffet()
{
    global $combo;
    $comboBuffet = $combo["King BBQ Buffet"];
    $arrayHtmlCombo = [];
    foreach ($comboBuffet as $idCombo => $value) {
        $html = "";
        $html = $html . '<div class="dish-item combo-menu">
                            <div class="title-combo">
                                <h3>' . $value['name_combo'] . '</h3>
                            </div>
                            <div class="item-menu-combo">';

        $arrayComboDish = detailCombo($idCombo);
        $count = 0;
        $beginRow = '<div class="row">';
        $endRow = '</div>';

        foreach ($arrayComboDish as $nameDish => $value) {
            if ($count == 0) {
                $html = $html . $beginRow;
            }

            $html = $html . '<div class="col-12 col-sm-6">
                                <div class="row">
                                
                                <img class="col-4 col-sm-3" style="width:50px" src="' . $value['link_image'] . '" alt="">
                                    <div class=" col-8 col-sm-9 content-item-menu">
                                        <h4>' . $nameDish . '</h4>
                                        <p>' . $value['mo_ta'] . '</p>
                                    </div>
                                </div>
                            </div>';

            if ($count >= 1) {
                $html = $html . $endRow;
                $count = 0;
            } else {
                $count++;
            }
        }
        if (count($arrayComboDish) % 2 == 1) {
            $html = $html . $endRow;
        }

        $html = $html . '</div></div>';
        $arrayHtmlCombo[] = $html;
    }

    foreach ($arrayHtmlCombo as $key => $value) {
        echo $value;
    }
}

function  htmlComboAlarcate()
{
    global $combo;
    $comboBuffet = $combo["King BBQ Alacarte"];
    $arrayHtmlCombo = [];
    foreach ($comboBuffet as $idCombo => $value) {
        $html = "";
        $html = $html . '<div class="dish-item combo-menu">
                            <div class="title-combo">
                                <h3>' . $value['name_combo'] . '</h3>
                            </div>
                            <div class="item-menu-combo">';

        $arrayComboDish = detailCombo($idCombo);
        $count = 0;
        $beginRow = '<div class="row">';
        $endRow = '</div>';

        foreach ($arrayComboDish as $nameDish => $value) {
            if ($count == 0) {
                $html = $html . $beginRow;
            }

            $html = $html . '<div class="col-12 col-sm-6" test_count ="' .  $count . '">
                                <div class="row">
                                    <img class="col-4 col-sm-3" style="width:50px" src="' . $value['link_image'] . '" alt="">
                                    <div class=" col-8 col-sm-9 content-item-menu">
                                        <h4>' . $nameDish . '</h4>
                                        <p>' . $value['mo_ta'] . '</p>
                                    </div>
                                </div>
                            </div>';

            if ($count >= 1) {
                $html = $html . $endRow;
                $count = 0;
            } else {
                $count++;
            }
        }
        if (count($arrayComboDish) % 2 == 1) {
            $html = $html . $endRow;
        }

        $html = $html . '</div></div>';
        $arrayHtmlCombo[] = $html;
    }

    foreach ($arrayHtmlCombo as $key => $value) {
        echo $value;
    }
}

function htmlComboOther()
{
    $html = "";
    $html = $html . '<div class="dish-item combo-menu">
                            <div class="title-combo">
                                <h3>Special</h3>
                            </div>
                            <div class="item-menu-combo">';

    $arrayComboDish = detailNotInCombo();
    $count = 0;
    $beginRow = '<div class="row">';
    $endRow = '</div>';

    foreach ($arrayComboDish as $nameDish => $value) {
        if ($count == 0) {
            $html = $html . $beginRow;
        }

        $html = $html . '<div class="col-12 col-sm-6" test_count ="' .  $count . '">
                                <div class="row">
                                    <img class="col-4 col-sm-3" style="width:50px" src="' . $value['link_image'] . '" alt="">
                                    <div class=" col-8 col-sm-9 content-item-menu">
                                        <h4>' . $nameDish . '</h4>
                                        <p>' . $value['mo_ta'] . '</p>
                                    </div>
                                </div>
                            </div>';

        if ($count >= 1) {
            $html = $html . $endRow;
            $count = 0;
        } else {
            $count++;
        }
    }
    if (count($arrayComboDish) % 2 == 1) {
        $html = $html . $endRow;
    }

    $html = $html . '</div></div>';
    $arrayHtmlCombo[] = $html;


    foreach ($arrayHtmlCombo as $key => $value) {
        echo $value;
    }
}
// htmlComboOther();

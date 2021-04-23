<?php
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';

    /**
     * dataDish là string, hiện tại chỉ xử lý 1 trường hợp $_POST["dataDish"] = all
     * , all là lấy tất cả id các món ăn, trả về 1 mảng id món ăn 
     */
    if(isset($_POST["dataDish"])) {
        $ArrayIdDish = array();
        $sql = "SELECT idmon_an FROM mon_an";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $ArrayIdDish[] = $row['idmon_an'];
        }
        echo json_encode($ArrayIdDish);
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
        $arrayDataDish = array();
        foreach ($_POST["idDish"] as $key => $value) {
            $tempDataDish = array();
            //
            $sql = "SELECT mon_an.ten_mon_an, mon_an.mo_ta, mon_an.link_image, mon_an.idthuc_don, mon_an.gia, thuc_don.ten_thuc_don 
                    FROM mon_an
                    INNER JOIN thuc_don ON thuc_don.idthuc_don = mon_an.idthuc_don
                    WHERE mon_an.idmon_an = $value";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $tempDataDish["idDish"] = $value;
            $tempDataDish["dishName"] = $row["ten_mon_an"];
            $tempDataDish["conceptName"] = $row["ten_thuc_don"];
            $tempDataDish["describe"] = $row["mo_ta"];
            $tempDataDish["imageLink"] = $row["link_image"];
            if($row["idthuc_don"] == 1) {
                $tempDataDish["price"] = '';
            } else {
                $tempDataDish["price"] = $row["gia"];
            }

            // 
            $sql = "SELECT combo.name_combo FROM combo_monan
                    INNER JOIN combo ON combo_monan.idcombo = combo.idcombo
                    WHERE combo_monan.idmon_an = $value";
            $result = $conn->query($sql);
            $tempDataDish["comboName"] = array();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $tempDataDish["comboName"][] = $row['name_combo'];
                }
            } else {
                $tempDataDish["comboName"][] = 'no';
            }
            //
            $arrayDataDish[] = $tempDataDish;
        }


        echo json_encode($arrayDataDish);
    }



    //******************************************************* */


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
        echo "<pre>";
        print_r($_POST["updateDish"]);
        echo "<pre>";

        // 
        $idDish = $_POST["updateDish"]["id-dish"];
        $dishName = $_POST["updateDish"]["dish-name"];
        $idConcept = $_POST["updateDish"]["concept-name"];
        $idCombo = $_POST["updateDish"]["combo-id"];
        $describe = $_POST["updateDish"]["describe"];
        $imageLink = $_POST["updateDish"]["image-link"];
        $price = $_POST["updateDish"]["dish-price"];

        // update tên món ăn, mô tả, giá, link ảnh, loại concept của 1 món
        $sql = "UPDATE mon_an
                SET ten_mon_an = '$dishName',
                    mo_ta = '$describe',
                    gia = '$price',
                    link_image = '$imageLink',
                    idthuc_don = $idConcept
                WHERE idmon_an = $idDish";
        $conn->query($sql);

        //bh fix hết thì sửa cái này
        if(count($idCombo)>0) {
            $sql = "DELETE FROM combo_monan WHERE idmon_an = $idDish";
            $conn->query($sql);
        
            foreach($idCombo as $value) {
                $sql = "INSERT INTO combo_monan(idmon_an, idcombo)
                        VALUES ($idDish, $value)";
                $conn->query($sql);
            }
        }
        //echo json_encode($formDish);

    
    }
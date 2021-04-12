<?php
    function listDish(){
        include 'connect.php';

        //lay ma thuc don
        $list_thuc_don = array();
        $sql = "SELECT idthuc_don,ten_thuc_don FROM thuc_don";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $list_thuc_don[$row["ten_thuc_don"]] = $row["idthuc_don"];
        } 

        // echo "<pre>";
        // print_r($list_thuc_don);
        // echo "<pre>";

        //
        $list_mon_an = array();
        foreach($list_thuc_don as $ten => $id) {
            $mon_an = array();
            $sql = "SELECT  gia, mo_ta, ten_mon_an, link_image FROM mon_an WHERE idthuc_don = $id";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $detail_mon_an = array();
                $detail_mon_an['gia'] = $row["gia"];
                $detail_mon_an['mo_ta'] = $row["mo_ta"];
                $detail_mon_an['link_image'] = $row["link_image"];
                $mon_an[$row["ten_mon_an"]]  = $detail_mon_an;

            } 
            $list_mon_an[$ten] = $mon_an;
        }

        $conn->close();

        return $list_mon_an;
    }

    /**
     * truyền vào 1 ten_thuc_don vd: King BBQ Buffet
     * $minPrice : giá thấp nhất
     * $maxPrice : giá cao nhất
     * return: array món ăn thuộc $typeConcept nằm trong khoảng giá này, sắp xếp theo giá tăng dần
     * array trả về cấu trúc giống với array detailCombo($idcombo) trả về, bổ sung thêm link_image nữa nhá
     * 
     */
    function($typeConcept, $minPrice, $maxPrice) {
        
    }

    // $list_mon_an = listDish();
    // echo "<pre>";
    // print_r($list_mon_an);
    // echo "<pre>";
?>
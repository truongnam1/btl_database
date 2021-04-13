<?php 
    //include_once '../back_end/connect.php';

/**
 * lấy TỔNG SỐ KHÁCH DỰ KIẾN(của tháng này) 
 * TỔNG SỐ KHÁCH DỰ KIẾN là cộng tổng số người trong form đặt bàn
 * return : tổng số người (số)
 */
function f0() {
    include 'connect.php';

    $count = 0;
    $present = getdate();
    $year = $present['year'];
    $month = $present['mon'];
    // print_r(getdate());
    // echo $present['mon'] + $present['year'];
    $sql = "SELECT so_nguoi FROM dat_ban
    WHERE EXTRACT(YEAR FROM ngay_dat) = $year AND EXTRACT(MONTH FROM ngay_dat) = $month";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $count += $row["so_nguoi"];
    }

    return $count;
}

//echo f0();

/**
 * trả về tổng số đơn đặt bàn của tháng hiện tại
 * mỗi form đc tính là 1 đơn
 * return: tổng số đơn tháng này (số)
 */
function f1 () {
    include 'connect.php';

    $count = 0;
    $present = getdate();
    $year = $present['year'];
    $month = $present['mon'];
    // print_r(getdate());
    // echo $present['mon'] + $present['year'];
    $sql = "SELECT COUNT(*) AS total FROM dat_ban
    WHERE EXTRACT(YEAR FROM ngay_dat) = $year AND EXTRACT(MONTH FROM ngay_dat) = $month";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['total'];

    return $count;

}

echo f1();
/**
 * trả về tổng số đơn đặt bàn của tháng này ở trạng thái phê duyệt
 * mỗi form đc tính là 1 đơn
 * return: tổng số đơn đã phê duyệt tháng hiện tại (số)
 */
function f2() {
    include 'connect.php';

    $count = 0;
    $present = getdate();
    $year = $present['year'];
    $month = $present['mon'];
    $sql = "SELECT COUNT(*) AS total FROM dat_ban
    WHERE EXTRACT(YEAR FROM ngay_dat) = $year AND EXTRACT(MONTH FROM ngay_dat) = $month AND trang_thai = 'phê duyệt'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['total'];

    return $count;
}

/**
 * trả về tổng số đơn đặt bàn ở trạng thái chưa xử lý (tất cả các đơn từ trước đến hiện tại)
 * mỗi form đc tính là 1 đơn
 * return: tổng số đơn đã phê duyệt tháng hiện tại (số)
 */
function f3() {
    include 'connect.php';

    $count = 0;
    $sql = "SELECT COUNT(*) AS total FROM dat_ban
    WHERE trang_thai = 'chưa xử lý'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $count = $row['total'];

    return $count;
}


/**
 * trả về 1 array gồm 12 phần tử, key là tên tháng, value là tổng số lượng đơn của tháng đó
 * 
 */
function f4() {
    include 'connect.php';
    
    $list = array();
    for($i=1 ; $i<=12 ; $i++) {
        $list[$i] = 0;
    }
    $sql = "SELECT MONTH(ngay_dat) AS month, COUNT(*) AS count 
            FROM dat_ban
            GROUP BY month
            ORDER BY month";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $list[$row["month"]] = $row["count"];
    }
    
    return $list;
}

// echo "<pre>";
// print_r(f4());
// echo "<pre>";







?>
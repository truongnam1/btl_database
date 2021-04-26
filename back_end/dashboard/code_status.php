<?php
$arrayCode = [
    1 => "Đăng nhập thành công",
    2 => "Tài khoản hoặc mật khẩu không chính xác",
    3 => "Nhập thiếu tài khoản hoặc mật khẩu",
    4 => "Hệ thống xảy ra lỗi, vui lòng thử lại sau ít phút",
    5 => "Tài khoản không tồn tại",
    6 => "Đăng ký tài khoản thành công",
    7 => "Tài khoản hiện tại dang bị khoá",
    8 => "Sai mật khẩu đăng nhập",

    20 => "Nhập thiếu trường dữ liệu",
    21 => "Đăng ký tài khoản thành công",
    22 => "Tài khoản này đã tồn tại",
    23 => "Email đã tồn tại",
    
    30 => "Email không tồn tại",
    31 => "Đã gửi email thành công",
    32 => "Gửi email thất bại",
    33 => "Đổi mật khẩu thành công",
    34 => "Mã khôi phục đã hết hạn",
    35 => "Đã hết hạn thời gian khôi phục mật khẩu",
];

function getCode($code) {
    global $arrayCode;
    if (array_key_exists($code, $arrayCode)) {
        return $arrayCode["$code"];
    }
    return "unknown";
}


?>
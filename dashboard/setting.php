<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['level'] == 1)) {
    header("Location: login.php", true, 301);
    exit;
}

if (isset($_POST['changePass'])) {
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/connect.php';
    include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/btl_database/back_end/dashboard/code_status.php';

    function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_POST["inputCurrentPass"]) && isset($_POST["inputNewPass"])) {
        $inputCurrentPass = testInput($_POST["inputCurrentPass"]);
        $inputNewPass = testInput($_POST["inputNewPass"]);

        $inputCurrentPass = md5($inputCurrentPass);
        $inputNewPass = md5($inputNewPass);
        $username = $_SESSION['username'];

        $sql = "SELECT username, password FROM admin_user WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($inputCurrentPass != $row["password"]) {
                $_SESSION["code"] = getCode(8); // sai mật khẩu đăng nhập
                header("location: setting.php", true, 301);
                exit;
            } else {
                $sql = "UPDATE admin_user SET password = '$inputNewPass' WHERE (username = '$username')";
                $result = $conn->query($sql);
                $_SESSION["code"] = getCode(33); // đổi mật khẩu thành công
                header("location: setting.php", true, 301);
                exit;
            }
        }
    } else {
        $_SESSION["code"] = getCode(20); // nhập thiếu
        header("location: setting.php", true, 301);
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Setting</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- custom css -->
    <link rel="stylesheet" href="./css/setting.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once './module/module_sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include_once './module/module_topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary">Setting</h4>
                        </div>
                        <div class="card-body">
                            <div class="" id="security">
                                <!-- <h4 class="d-flex justify-content-center">Bảo mật</h4>
                                <hr> -->
                                <div id="change-password">
                                    <h4 class="d-flex justify-content-center">Đổi mật khẩu</h4>
                                    <div class="row">
                                        <div class="col-sm-4"></div>
                                        <form class="user col-sm-4" method="POST">
                                            <div class="form-group pass_show">
                                                <input name="inputCurrentPass" type="password" class="form-control form-control-user d-flex justify-content-center" id="inputCurrentPass" placeholder="Current Password" required>
                                            </div>
                                            <div class="form-group pass_show">
                                                <input name="inputNewPass" type="password" class="form-control form-control-user d-flex justify-content-center" id="inputNewPass" placeholder="New Password" required>
                                            </div>
                                            <div class="form-group pass_show">
                                                <input type="password" class="form-control form-control-user d-flex justify-content-center" id="inputConfirmPass" placeholder="Confirm Password" required>
                                            </div>
                                            <button name="changePass" type="submit" class="btn btn-primary btn-user btn-block d-flex justify-content-center">Change password</button>

                                        </form>
                                        <div class="col-sm-4"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <?php
        include './module/module_footer.php';
    ?>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php
        include './module/module_logout_modal.php';
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.pass_show').append('<span class="ptxt">Show</span>');
        });

        $(document).on('click', '.pass_show .ptxt', function() {
            $(this).text($(this).text() == "Show" ? "Hide" : "Show");
            $(this).prev().attr('type', function(index, attr) {
                return attr == 'password' ? 'text' : 'password';
            });

        });
    </script>


    <script>
        var password = document.getElementById("inputNewPass"),
            confirm_password = document.getElementById("inputConfirmPass");
        // var eleUsername = document.getElementById("inputUsername");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Mật khẩu không khớp");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
    <?php
    if (isset($_SESSION['code'])) {
        echo  '<script>
        window.onload = function()
        {
            alert("' . $_SESSION['code'] . '");   
        };
            </script>';

        unset($_SESSION['code']);
    }
    ?>


</body>

</html>
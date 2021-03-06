<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['level']) == 1) {
    header("Location: dashboard.php", true, 301);
    exit;
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

    <title>Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot password?</h1>
                                        <p class="mb-4">Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
                                    <form class="user row" action="index.php" method="POST">
                                        <div class="form-group col-12 col-md-8">
                                            <input type="email" name="inputEmail" class="form-control form-control-user" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                        </div>
                                        <button name="reset-password" type="submit" class="col-12 col-md-4
                                         btn btn-primary btn-user btn-block">Reset Password</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">????ng k??</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">???? c?? t??i m???t t??i kho???n? ????ng nh???p!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

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
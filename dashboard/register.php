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

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="index.php" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="first-name" type="text" class="form-control form-control-user" id="firstName" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="last-name" type="text" class="form-control form-control-user" id="lastName" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control form-control-user" id="inputUsername" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" id="inputEmail" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="password" type="password" class="form-control form-control-user" id="inputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="repeatPassword" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Register Account</button>
                                <hr>

                            </form>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var password = document.getElementById("inputPassword"),
            confirm_password = document.getElementById("repeatPassword");
        var eleUsername = document.getElementById("inputUsername");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        function validateUsername () {
            console.log("do dai:" + eleUsername.value.length);
            if (eleUsername.value.length < 8) {
                eleUsername.setCustomValidity("Độ dài username phải từ 8 đến 20 kí tự");

            } else {
                // eleUsername.setCustomValidity('');
                var patt = new RegExp("^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$");
                var res = patt.test(eleUsername.value);
                if (!res) {
                    eleUsername.setCustomValidity("Username chỉ chứa chữ cái, số, kí tự '.' và '_'");
                } else {
                    eleUsername.setCustomValidity('');
                }
            }
            // var patt = new RegExp("^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$");
            // var res = patt.test(val);
            // if (!res) {
            //     eleUsername.setCustomValidity("Username chỉ chứa chữ cái, số, kí tự '.' và '_'");
            // } else {
            //     eleUsername.setCustomValidity('');
            // }

        }
        eleUsername.oninput = validateUsername;
        // eleUsername.onchange = validateUsername(eleUsername.value);
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>

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
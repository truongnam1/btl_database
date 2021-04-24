<?php
include_once 'html-thuc-don-test.php';
?>

<!doctype html>
<html lang="en">

<head>
    <title>thuc don</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel='stylesheet' id='google-webfonts-css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C900%7CCabin%3A400%2C700%2C400italic%2C700italic%7CHerr+Von+Muellerhoff' type='text/css' media='all' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- custom css -->
    <link rel="stylesheet" href="../assets/list-css/style.css">
    <!-- <link rel="stylesheet" href="http://restabook.kwst.net/light/css/style.css"> -->
    <link rel="stylesheet" href="../assets/list-css/thuc-don-test.css">

</head>

<body>

    <div class="container-fluid">
        <!-- begin header-->
        <div class="row header">
            <?php
            include '../main_menu.php';
            ?>
        </div>
        <!-- end header -->

        <div class="content">

            <!-- slide content  -->
            <div id="slideMenu" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/img/thuc-don/bg-menu.jpg" alt="bg menu" width="100%" height="auto">
                        <div class="carousel-caption">
                            <h3>Special menu offers.</h3>
                            <p>Discover Our menu</p>
                        </div>
                        <div class="brush-dec">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- menu -->
        <ul class="nav nav-tabs d-flex justify-content-center" id="nav-menu-combo">
            <li class="nav-item current">
                <a class="nav-link active" data-toggle="tab" href="#buffet">Buffet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#alaticare">Alarcate</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#other">Other</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="buffet" class="container tab-pane active"><br>
                <!-- bat dau lap -->
                <?php
                echo htmlComboBuffet();
                ?>
                <!-- ket thuc lap -->
            </div>

            <div id="alaticare" class="container tab-pane fade"><br>
                <!-- bat dau alaticare  -->
                <?php
                echo htmlComboAlarcate();
                ?>
                <!-- ket thuc alaticare  -->
            </div>

            <div id="other" class="container tab-pane fade"><br>
                <h3>Menu 2</h3>
                <p>Saaed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
        </div>
        <!-- ket thuc panes -->



    </div>

    <div class="footer">
        <?php
        include "../footer_main.php";
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="thuc-don-test.js"></script>
</body>

</html>
<?php
include_once 'thuc-don.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // print_r($_GET);

    $conceptSelected = "";
    $typeBuffet = "";
    $minPrice = "";
    $maxPrice = "";
    
    
    if (isset($_GET['conceptSelected'])) {
        $conceptSelected = test_input($_GET['conceptSelected']);
    }
    if (isset($_GET['typeBuffet'])) {
        $typeBuffet = test_input($_GET['typeBuffet']);
    }
    if (isset($_GET['minPrice'])) {
        $minPrice = test_input($_GET['minPrice']);
    }
    if (isset($_GET['maxPrice'])) {
        $maxPrice = test_input($_REQUEST['maxPrice']);
    }
    getDataThucDon($conceptSelected,$typeBuffet, $minPrice, $maxPrice);

}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Thực đơn</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="../assets/list-css/simple-sidebar.css" rel="stylesheet">

    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 500,
                values: [75, 300],
                slide: function(event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
    
    

</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Bộ lọc tìm kiếm</div>
            <div class="list-group list-group-flush">

                <li class="list-group-item" id="concept-type">
                    <h4 class="list-group-item-heading">Loại concept</h4>
                    <!-- <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="concept-select">King BBQ Alarcate
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="concept-select">King BBQ Buffet
                        </label>
                    </div> -->
                    <?php
                    
                    echo htmlTypeConcept($conceptSelected);
                    ?>
                </li>
                <li class="list-group-item" id="combo-buffet">
                    <h4 class="list-group-item-heading">Loại combo</h4>
                    <?php
                    echo htmlComboBuffet($typeBuffet);
                    ?>
                </li>
                <li class="list-group-item list-group-item-action bg-light" id="price-range">
                    <h4 class="list-group-item-heading">khoảng giá</h4>
                    <p class="">
                        <label for="amount">Price range:</label>
                    <div class="d-inline">
                        <input type="number" name="minPrice" <?php echo "value=".'"'.$minPrice.'"'?> id="minPrice">
                        <p>đến</p>
                        <input type="number" name="maxPrice" <?php echo "value=".'"'.$maxPrice.'"'?> id="maxPrice">
                    </div>
                    <button class="btn btn-primary" id="apdunggia">Áp dụng</button>
                </li>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="../index_main.php">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../dat-ban/">Đặt bàn</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="./index.php">Thực đơn<span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="products">
                    <div class="row">
                        <div class="card content-item col-6 col-md-3" style="width:400px">
                            <img class="card-img-top" src="../assets/img/thuc-don/item-menu.png" alt="hình ảnh sản phẩm">
                            <div class="card-body content-text-item">
                                <h4 class="card-title name-item">Cái niêu</h4>
                                <p class="card-text Description-item">Đây là cái niêu</p>
                                <div class="price-item">100000000 vnđ</div>
                            </div>
                        </div>
                        <div class="card content-item col-6 col-md-3" style="width:400px">
                            <img class="card-img-top" src="../assets/img/thuc-don/item-menu.png" alt="hình ảnh sản phẩm">
                            <div class="card-body content-text-item">
                                <h4 class="card-title name-item">Cái niêu</h4>
                                <p class="card-text Description-item">Đây là cái niêu</p>
                                <div class="price-item"></div>
                            </div>
                        </div>
                        <div class="card content-item col-6 col-md-3" style="width:400px">
                            <img class="card-img-top" src="../assets/img/thuc-don/item-menu.png" alt="hình ảnh sản phẩm">
                            <div class="card-body content-text-item">
                                <h4 class="card-title name-item">Cái niêu</h4>
                                <p class="card-text Description-item">Đây là cái niêu</p>
                                <div class="price-item"></div>
                            </div>
                        </div>
                        <div class="card content-item col-6 col-md-3" style="width:400px">
                            <img class="card-img-top" src="../assets/img/thuc-don/item-menu.png" alt="hình ảnh sản phẩm">
                            <div class="card-body content-text-item">
                                <h4 class="card-title name-item">Cái niêu</h4>
                                <p class="card-text Description-item">Đây là cái niêu</p>
                                <div class="price-item"></div>
                            </div>
                        </div>
                    </div>


                </div>
                <?php     
                // test
                htmlItemMenu();
                ?>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

        <!-- <script src="../assets/bootstrap-4.6.0-dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="../assets/bootstrap-4.6.0-dist/js/jquery.min.js"></script>
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </div>
    <!-- /#wrapper -->

    <!-- Optional JavaScript -->
    <script src="thuc-don.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
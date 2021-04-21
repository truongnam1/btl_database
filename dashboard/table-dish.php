<?php
include_once '../back_end/dashboard/html-table-dish.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Table dish</title>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    <!-- custom css -->
    <link rel="stylesheet" href="./css/table-dish.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include_once 'module_sidebar.php';
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include_once 'module_topbar.php';
                ?>
                <!-- End of Topbar -->

                <div class="modal" id="info-item-dish">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h1 class="modal-title">Thông tin món ăn</h1>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body" id="form-dish">
                                <form>
                                    <div class="form-group">
                                        <label for="dish-name">Tên món ăn:</label>
                                        <input name="dish-name" type="text" class="form-control" id="dish-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="concept-name">Loại concept:</label>
                                        <select name="concept-name" class="custom-select" id="concept-name">
                                            <?php
                                            echo htmlOptionConcept();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="combo-name">Loại combo:</label>
                                        <select name="combo-name" class="custom-select" id="combo-name">
                                            <?php
                                            echo htmlOptionCombo();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="describe">Mô tả:</label>
                                        <textarea name="describe" class="form-control" rows="2" id="describe"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image-link">Link ảnh:</label>
                                        <input name="image-link" type="text" class="form-control" id="image-link">
                                    </div>
                                    <div class="form-group">
                                        <label for="dish-price">Giá:</label>
                                        <input name="dish-price" type="text" class="form-control" id="dish-price">
                                    </div>
                                </form>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-update-dish" data-dismiss="modal" id="btn-update-dish">Cập nhật</button>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#info-item-dish" id="btn-toggle-edit">
                                Chỉnh sửa
                            </button>
                            <button class="btn btn-outline-primary" id="btn-update-table">Cập nhật</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data-table-dish" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tên món ăn</th>
                                            <th>Loại concept</th>
                                            <th>Loại combo</th>
                                            <th>Mô tả</th>
                                            <th>Link ảnh</th>
                                            <th>Giá</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tên món ăn</th>
                                            <th>Loại concept</th>
                                            <th>Loại combo</th>
                                            <th>Mô tả</th>
                                            <th>Link ảnh</th>
                                            <th>Giá</th>
                                        </tr>
                                    </tfoot>
                                    <!-- <tbody>
                                        <tr>
                                            <td>Đùi gà sốt BBQ</td>
                                            <td>king bbg bufet</td>
                                            <td>229k</td>
                                            <td>ngon</td>
                                            <td>https://vcdn-dulich.vnecdn.net/2020/09/04/1-Meo-chup-anh-dep-khi-di-bien-9310-1599219010.jpg</td>

                                        </tr>
                                        


                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->

    <!-- custom js -->

    <script src="./js/table-dish/table-dish.js"></script>

</body>

</html>
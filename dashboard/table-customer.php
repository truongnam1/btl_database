<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Table customer</title>

    <!-- js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- custom js -->
    <script src="./js/table-customer/table_customer.js"></script>
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
                        <div class="row">
                            <div class="col-2">
                                <button class="btn btn-outline-secondary">Lưu các chỉnh sửa</button>
                            </div>
                            <div class="d-flex col-10" id="form-query">
                                <div class="col-3">
                                    <select name="type-status" id="type-status">
                                        <option value="allowed">Đơn đã phê duyệt</option>
                                        <option value="waiting">Đơn đã chưa phê duyệt</option>
                                        <option value="not allowed">Đơn đã huỷ</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-5 d-flex">

                                    <p>Từ</p>
                                    <input type="date" name="dateForm" id="dateForm">
                                    <p>đến</p>
                                    <input type="date" name="dateTo" id="dateTo">
                                </div class="col-3 d-flex">
                                <!-- <button type="submit" class="btn btn-outline-secondary">Try vấn</button> -->
                                <div id="btn-query">
                                    <button class="btn btn-outline-secondary">Truy vấn</button>
                                </div>
                            </div>
                            <div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>số người</th>
                                            <th>Chi nhánh</th>
                                            <th>Bàn</th>
                                            <th>Thời gian đến</th>
                                            <th>Thời gian đặt</th>
                                            <th>Ghi chú</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Họ và tên</th>
                                            <th>Email</th>
                                            <th>Sđt</th>
                                            <th>số người</th>
                                            <th>Chi nhánh</th>
                                            <th>Bàn</th>
                                            <th>Thời gian đến</th>
                                            <th>Thời gian đặt</th>
                                            <th>Ghi chú</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </tfoot>
                                    <!-- <tbody>
                                        <tr>
                                            <td>Nam</td>
                                            <td>nam@gmail.com</td>
                                            <td>093256875</td>
                                            <td>10</td>
                                            <td>IPH</td>
                                            <td>101, 102, 103</td>
                                            <td>13/04/2021 9:10PM</td>
                                            <td>12/04/2021</td>
                                            <th>không</th>
                                            <th>đang chờ phê duyệt</th>
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
                        <span>Copyright &copy; restaurantvippro.ga 2021</span>
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
    <script src="js/table-customer/datatables-customer.js"></script>


</body>

</html>
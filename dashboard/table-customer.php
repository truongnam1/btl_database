<?php
session_start();
if (!(isset($_SESSION['username']) && $_SESSION['level'] == 1)) {
    header("Location: login.php", true, 301);
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

    <title>Table customer</title>

    <!-- js -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> -->

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/table-customer.css">

    <!-- custom js -->
    <script src="./js/table-customer/table_customer.js"></script>
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
                include_once 'module_topbar.php';
                ?>
                <!-- End of Topbar -->

                <!-- The Modal -->
                <div class="modal" id="infoForm">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h1 class="modal-title">Thông tin đặt bàn</h1>
                                <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="fullName">Họ và tên:</label>
                                    <input type="text" class="form-control" id="fullName">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Sđt:</label>
                                    <input type="text" class="form-control" id="phoneNumber">
                                </div>
                                <div class="form-group">
                                    <label for="amountPeople">Số người:</label>
                                    <input type="text" class="form-control" id="amountPeople">
                                </div>
                                <div class="form-group">
                                    <label for="branch">Chi nhánh:</label>
                                    <input type="text" class="form-control" id="branch">
                                </div>
                                <div class="form-group">
                                    <label for="tables">Bàn:</label>
                                    <input type="text" class="form-control" id="tables">
                                </div>
                                <div class="form-group">
                                    <label for="datetimeToCome">Thời gian đến:</label>
                                    <input type="datetime-local" class="form-control" id="datetimeToCome">
                                </div>
                                <div class="form-group">
                                    <label for="dateOrder">Thời gian đặt:</label>
                                    <input type="date" class="form-control" id="dateOrder">
                                </div>
                                <div class="form-group">
                                    <label for="note">Ghi chú:</label>
                                    <textarea class="form-control" rows="2" id="note"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng thái:</label>
                                    <select name="status" class="custom-select" id="status">

                                        <option value="chưa xử lý">Chưa xử lý</option>
                                        <option value="đã xử lý">Đã xử lý</option>
                                        <option value="đã huỷ">Đã huỷ</option>
                                    </select>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-update" data-dismiss="modal" id="btn-update">Cập nhật</button>
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
                        <div class="row" id="form-header">
                            <div class="col-2">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#infoForm" id="toggle-form-edit">
                                    Chỉnh sửa
                                </button>
                            </div>
                            <div class="d-flex col-10" id="form-query">
                                <div class="col-3">
                                    <select name="type-status" class="custom-select" id="type-status">
                                        <option value="đã xử lý">Đã xử lý</option>
                                        <option value="chưa xử lý">Chưa xử lý</option>
                                        <option value="đã hủy">Đã hủy</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-6 d-flex" id="date-query">

                                    <p class="item-date-query">Từ</p>
                                    <input class="item-date-query" type="date" name="dateForm" id="dateForm">
                                    <p class="item-date-query">đến</p>
                                    <input class="item-date-query" type="date" name="dateTo" id="dateTo">
                                </div>
                                <!-- <button type="submit" class="btn btn-outline-secondary">Try vấn</button> -->
                                <div class="col-3 d-flex">
                                    <button class="btn btn-primary" id="btn-query">
                                        Truy vấn</button>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/datatables-demo.js"></script> -->
    <script src="js/table-customer/datatables-customer.js"></script>


</body>

</html>
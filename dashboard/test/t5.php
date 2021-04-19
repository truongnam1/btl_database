<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>Modal Scroll Example</h2>
    <p>Use the .modal-dialog-scrollable class to enable scrolling inside the modal.</p>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoForm">
      Open modal
    </button>

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
              <label for="timestampComeTo">Thời gian đến:</label>
              <input type="datetime-local" class="form-control" id="timestampComeTo">
            </div>
            <div class="form-group">
              <label for="dateOrder">Thời gian đặt:</label>
              <input type="date" class="form-control" id="dateOrder" disabled>
            </div>
            <div class="form-group">
              <label for="note">Ghi chú:</label>
              <textarea class="form-control" rows="2" id="note"></textarea>
            </div>
            <div class="form-group">
              <label for="status">Trạng thái:</label>
              <select name="status" class="custom-select" id="status">
                
                <option value="waiting">Đang chờ phê duyệt</option>
                <option value="allowed">Đã phê duyệt</option>
                <option value="not allowed">Đã huỷ</option>
              </select>
            </div>

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-update" data-dismiss="modal">Cập nhật</button>
          </div>

        </div>
      </div>
    </div>

  </div>

</body>

</html>
<!doctype html>
<html lang="en">

<head>
  <title>đặt bàn</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../assets/list-css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/list-css/dat-ban.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="container-fluid">
    <div class="header">
      <?php
      include '../main_menu.php';
      ?>
    </div>

    <div class="content">

      <!-- dat ban tren -->
      <div class="col-md-12" id="banner-datban-top">
        <div class="form-group" id="form-datban-lite">
          <p>ĐẶT BÀN NGAY</p>
          <a href="#">hotline: 1900234546</a>
          <p>Được mệnh danh là “Vua nướng”, Chuỗi nhà hàng King BBQ sẽ đem đến cho khách hàng những trải nghiệm đặc sắc</p>
          <label for=""></label>
          <div class="form-book-banner">
            <form action="">
              <div class="group_field">
                <input type="text" placeholder="Họ tên" name="bb_name" id="bb_name" class="underline">
              </div>
              <div class="group_field underline">
                <input type="text" placeholder="Sđt" name="bb_tel" id="bb_tel" class="underline">
              </div>
              <div class="group_field submit">
                <input type="submit" value="Đặt bàn ngay" class="button-default light">
              </div>

            </form>
          </div>
        </div>
      </div>

      <!-- begin: dat ban duoi -->
      <div class="_content book-bbq text-light" id="dat-ban" action="back_end/booking.php">

        <!-- begin form -->
        <div class="col-md-6">
          <form class="" action="" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputname">Họ và tên</label>
                <input type="text" class="form-control" id="inputfullname-down" name="inputFullName-down">
              </div>
              <div class="form-group col-md-6">
                <label for="inputphoneno">Số điện thoại</label>
                <input type="text" class="form-control" id="inputphoneNo" name="inputPhoneNo-down">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail-down" placeholder="email" name="inputEmail-down">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">Khu vực</label>
                <select id="inputState" class="form-control" name="inputState-down">
                  <option selected>Choose...</option>
                  <option>mien nam</option>
                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="inputBranch">Chi nhánh</label>
                <select id="inputBranch" class="form-control" name="inputBranch-down">
                  <option selected>Choose...</option>
                  <option>iph</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputAmount">Số người</label>
                <select id="inputAmount" class="form-control" name="inputAmountPeople">
                  <option selected>Choose...</option>
                  <option>5</option>
                  <option>6</option>
                  <option>7</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Chọn giờ</label>
                <select id="inputState" class="form-control" name="time">
                  <option selected>Choose...</option>
                  <option>10:00</option>
                  <option>11:00</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputState">Chọn ngày</label>
                <select id="inputState" class="form-control" name="date">
                  <option selected>Choose...</option>
                  <option>02/02/2021</option>
                  <option>03/03/2023</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Lời nhắn</label>
              <textarea class="form-control" id="formControlTextarea1" rows="3" name="note"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Đặt bàn ngay</button>
          </form>
        </div>
        <!-- end form -->

        <div class="img-datban-down col-md-6">
          <img src="..\assets\img\dat-ban\img-form-book-down.png" alt="">
        </div>

      </div>
      <!-- end đặt bàn dưới -->


      <!-- test -->

      <?php
      echo '<pre>';
      print_r($_POST);
      echo '</pre';
      ?>

      <p id="datepairExample">
        <input type="text" class="date start" />
        <input type="text" class="time start" /> to
        <input type="text" class="time end" />
        <input type="text" class="date end" />
      </p>

      <script type="text/javascript" src="..\assets\js\datepair.js"></script>
      <script type="text/javascript" src="..\assets\js\jquery.datepair.js"></script>
      <script>
        // initialize input widgets first
        $('#datepairExample .time').timepicker({
          'showDuration': true,
          'timeFormat': 'g:ia'
        });

        $('#datepairExample .date').datepicker({
          'format': 'yyyy-m-d',
          'autoclose': true
        });

        // initialize datepair
        $('#datepairExample').datepair();
      </script>

      <!-- end test -->

    </div>
  </div>



  <div class="footer">
    <?php
    include '../footer_main.php';
    ?>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
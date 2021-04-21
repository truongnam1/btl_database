<!doctype html>
<html lang="en">

<head>
  <title>đặt bàn</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- <script type="text/javascript" src="../assets/js/bootstrap-timepicker.js"></script> -->
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- css customs -->
  <link rel="stylesheet" type="text/css" href="../assets/list-css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/list-css/dat-ban.css">


</head>

<body>

  <div class="container-fluid">
    <div class="header">
      <?php
      include '../main_menu.php';
      ?>
    </div>

    <div class="_content">


      <!-- dat ban tren -->

      <div class="" id="banner-datban-top">
        <!--  
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
        -->
      </div>

      <!-- usp -->
      <div class="content-usp">

        <div class="_title-usp">
          <span>KING BBQ</span>
          <h2>USP</h2>
        </div>
        <div class="row boxtext-usp">
          <div class="boxtext-usp-item col-md-3">

            <p>
              <img src="..\assets\img\dat-ban\spa_flower_96px.png" alt="">
              <strong>Dịch vụ khách hàng</strong>
              tận tâm
            </p>
          </div>
          <div class="boxtext-usp-item col-md-3">

            <p>
              <img src="..\assets\img\dat-ban\spa_flower_96px.png" alt="">
              <strong>Bếp trưởng Hàn Quốc với hơn 40 năm kinh nghiệm</strong>
              đã nghiên cứu và sáng tạo ra nhiều công thức chế biến hoàn hảo.
            </p>
          </div>
          <div class="boxtext-usp-item col-md-3">

            <p>
              <img src="..\assets\img\dat-ban\spa_flower_96px.png" alt="">
              <strong>Hoạt động với 2 concept chính: Buffet và Alacarte</strong>
              mang đến cho khách hàng nhiều lựa chọn phong phú nhưng vẫn đảm bảo: Đẳng cấp
              , Sang trọng, Chuyên nghiệp
            </p>
          </div>
          <div class="boxtext-usp-item col-md-3">

            <p>
              <img src="..\assets\img\dat-ban\spa_flower_96px.png" alt="">
              <strong>Nguồn nguyên liệu</strong>
              luôn được đảm bảo, được tuyển chọn kỹ lưỡng, và nướng trên hệ thống bếp gốm hồng ngoại hiện đại nhất Hàn Quốc
              , giúp các món nướng vừa lưu giữ vị ngọt thơm của các món thịt mà không hại cho sức khỏe.
            </p>
          </div>
        </div>

      </div>

      <hr style="border-top: 1px solid #fff">

      <!-- begin menu -->
      <div class="_content-menu col-md-12">
        <div class="_title-menu">
          <span>KING BBQ</span>
          <h2>Menu</h2>
        </div>
        <div class="row _item-menu col-md-12">
          <div class="left-item col-md-6">
            <img src="..\assets\img\dat-ban\img-menu-left.png" alt="">
            <div class="box-text">
              <a href="">
                <h5>Buffet</h5>
              </a>
            </div>
          </div>
          <div class="right-item col-md-6">
            <img src="..\assets\img\dat-ban\img-menu-right.png" alt="">
            <div class="box-text">

              <a href="">
                <h5>Alarcate</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- end menu -->

      <hr style="border-top: 1px solid #fff">

      <!-- begin: dat ban duoi -->
      <div class="row book-bbq text-light col-md-12" id="dat-ban" action="back_end/booking.php">


        <!-- begin form -->
        <div class="col-md-7 form-datban">
          <div class="title-datban-down">
            <span>KING BBQ</span>
            <h2>Đặt bàn</h2>
          </div>
          <form class="" action="../back_end/booking.php" method="post">
            <div class="form-row row">
              <div class="form-group col-md-6">
                <label for="inputname">Họ và tên</label>
                <input type="text" class="form-control" id="inputfullname-down" name="inputFullName-down" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputphoneno">Số điện thoại</label>
                <input type="text" class="form-control" id="inputphoneNo" name="inputPhoneNo-down" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail-down" placeholder="email" name="inputEmail-down">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputState">Khu vực</label>
                <select id="inputState" class="form-control" name="inputState-down" required>
                  <!-- <option value="" selected disabled hidden>---</option> -->
                  <option value="" disabled hidden>---</option>
                  <!-- <option value="1">Miền Nam</option>
                  <option value="2">Miền Bắc</option> -->
                  <script type="text/javascript" src="dat-ban.js"></script>
                  <?php
                  include_once 'dat-ban.php';
                  echo htmlOpitionKhuVuc();
                  ?>
                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="inputBranch">Chi nhánh</label>
                <select id="inputBranch" class="form-control" name="inputBranch-down" value="default" required>
                  <!-- <option selected disabled hidden>---</option> -->
                  <option disabled hidden>---</option>
                  <!-- <option>iph</option> -->
                  <?php

                  echo htmlOptionChiNhanh();
                  ?>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputAmount">Số người</label>
                <select id="inputAmount" class="form-control" name="inputAmountPeople" required>
                  <!-- <option selected disabled hidden value="default">---</option> -->
                  <option disabled hidden value="default">---</option>
                  <?php
                  for ($i = 2; $i <= 50; $i+=2) {
                    echo "<option>$i</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-4">

                <label for="inputTime">Chọn giờ</label>
                <input type="time" id="inputTime" class="form-control" name="time" step="1200" min="08:00" max="21:00" required>

              </div>
              <div class="form-group col-md-5">
                <label for="inputDate">Chọn ngày</label>
                <input type="date" id="inputDate" class="form-control" name="date">

              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Lời nhắn</label>
              <textarea class="form-control" id="formControlTextarea1" rows="3" name="note"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-secondary btn-submit-datban" name="submit">Đặt bàn ngay</button>
          </form>
        </div>
        <!-- end form -->

        <div class="img-datban-down col-md-5">
          <img src="..\assets\img\dat-ban\img-form-book-down.png" alt="">
        </div>

      </div>
      <!-- end đặt bàn dưới -->


      <!-- test -->
    

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

  <!-- js customs -->
  <script src="dat-ban.js"></script>
</body>

</html>
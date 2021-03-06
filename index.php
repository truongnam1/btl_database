<!doctype html>
<html lang="vi">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>King BBQ | Vua Nướng Hàn Quốc</title>
  <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="./assets/list-css/style.css">
  <link rel='stylesheet' id='google-webfonts-css' href='http://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C700%2C900%7CCabin%3A400%2C700%2C400italic%2C700italic%7CHerr+Von+Muellerhoff' type='text/css' media='all' />
  <style>
    @media (max-width: 990px) {
      .navbar .nav-item a {
        color: #212529;
      }

    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <!-- begin header-->
    <div class="row header">
      <?php
      include 'main_menu.php';
      ?>

    </div>
    <!-- end header -->
    <!-- begin slides -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <!-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol> -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets\img\slides\slide_main\king-b_tiec-nuong-ngon-vui-ven-tron-_banner-01-1500x1000.jpg" class="d-block w-100" alt="...">
        </div>
        <!-- <div class="carousel-item">
          <img src="assets\img\slides\slide_main\king-b_tiec-nuong-ngon-vui-ven-tron-_banner-01-1500x1000.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets\img\slides\slide_main\king-b_tiec-nuong-ngon-vui-ven-tron-_banner-01-1500x1000.jpg" class="d-block w-100" alt="...">
        </div> -->
      </div>
      <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a> -->
    </div>
    <!-- end slides -->



    <!-- begin content -->
    <div class="row content">

      <!-- concept -->
      <div class="row article-content concept-content">
        <div class="col-md-6 text-article" id="text-concept-content">
          <p class="title-text">Concept</p>

          <p class="content-text">Bí quyết của King BBQ nằm ở nước sốt tẩm ướp thịt được chế biến từ nguyên liệu hoàn toàn tự nhiên,
            theo công thức bí truyền, hội tụ tinh hoa từ những miền ẩm thực nổi tiếng Hàn Quốc.
            Được mệnh danh là “Vua nướng”,
            Chuỗi nhà hàng King BBQ đem đến cho khách hàng 2 hình thức trải nghiệm đặc sắc sau:</p>
          <p id="link-menu">
            <a href="./thuc-don/">King BBQ Alarcate</a> và <a href="./thuc-don/">King BBQ Buffet</a>
          </p>
          <button class="button-text">Concept</button>

          <hr>
        </div>
        <div class="col-md-6 concept-article" id="concept-restaurant-0">
          <img src="./assets/img/concpet.jpg" alt="">
        </div>
      </div>

      <!-- banner menu -->
      <div class="row banner-menu">
        <div class="row item-menu-img">
          <div class="col-md-4 item-menu-img1"><img src="./assets/img/banner-menu-1-1.png" alt=""></div>
          <div class="col-md-4 item-menu-img2"><img src="./assets/img/banner-menu-1-3.png" alt=""></div>
          <div class="col-md-4 item-menu-img3"><img src="./assets/img/banner-menu-1-2.png" alt=""></div>
        </div>
        <div class="text-banner">
          <span>Menu</span>
          <h3>MENU KING BBQ</h3>
        </div>


      </div>

      <!-- menu -->
      <div class="row article-content">
        <div class="col-md-6 gallery-article" id="gallery-menu-1">
          <table class="table-article">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td><img src="assets\img\gallery-menu-1\fzn_0370_ll12.jpg" alt=""></td>
                <td><img src="assets\img\gallery-menu-1\fzn_0496_ll-900x598.jpg" alt=""></td>
              </tr>
              <tr>
                <td><img src="assets\img\gallery-menu-1\mg_3136-a.jpg" alt=""></td>
                <td><img src="assets\img\gallery-menu-1\mg_9252-a-1200x800.jpg" alt=""></td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="col-md-6 text-article" id="text-menu-content">
          <p class="title-text">Menu</p>

          <p class="content-text">Menu King BBQ đem đến cho khách hàng hơn 200 món ăn, được chắt lọc từ Tinh hoa ẩm thực Hàn Quốc.
            Tất cả được chính đầu bếp Hàn Quốc chế biến, khéo léo kết hợp
            trong nhiều combo và set ăn hấp dẫn của King BBQ Alacart và vô vàn món ngon không giới hạn từ King BBQ Buffet</p>
          <button class="button-text">thực đơn</button>
          <hr>
        </div>
      </div>
      <!-- end menu -->

      <!-- banner -->
      <div class="col-md-12 banner-restaurant">
        <!-- <img src="assets\img\nha-hang-king-bbq-1.jpg" alt="" class="img-banner"> -->
        <div class="border-before"></div>
        <div class="text-banner">
          <span>Restaurant</span>
          <h3>NHÀ HÀNG KING BBQ</h3>
        </div>
        <div class="border-after"></div>
      </div>

      <!-- nha hang -->
      <div class="row article-content">
        <div class="col-md-6 text-article" id="text-restaurant-content">
          <p class="title-text">Restaurants</p>

          <p class="content-text">Hệ thống King BBQ hiện có tới 85 nhà hàng trên toàn quốc
            , trong đó có 16 nhà hàng phục vụ hình thức gọi món (King BBQ Alacarte) và 69 nhà hàng tự chọn (King BBQ Buffet)</p>
          <button class="button-text">NHÀ HÀNG</button>
          <hr>
        </div>
        <div class="col-md-6 gallery-article" id="gallery-restaurant-1">
          <table class="table-article">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td><img src="assets\img\gallery-restaurant\nha-hang-king-bbq-1-1-679x1024.jpg" alt=""></td>
                <td><img src="assets\img\gallery-restaurant\nha-hang-king-bbq-1-2-900x1355.jpg" alt=""></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>





    </div>
    <!-- end content -->

    <!-- begin footer -->
    <div class="row footer">
      <?php
      include 'footer_main.php';
      ?>
    </div>
    <!-- end footer -->
  </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $("button.button-text").click(function() {
        window.location = "./thuc-don/";
      });
    });
  </script>
</body>

</html>
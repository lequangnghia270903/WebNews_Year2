<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <title>website bán hàng</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="/DoAnCoSo2/public/frontend/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/DoAnCoSo2/public/frontend/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/DoAnCoSo2/public/frontend/css/slick.css">
  <link rel="stylesheet" type="text/css" href="/DoAnCoSo2/public/frontend/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="/DoAnCoSo2/public/frontend/css/style.css">
  <script src="/DoAnCoSo2/public/frontend/js/jquery-3.2.1.min.js"></script>
  <script src="/DoAnCoSo2/public/frontend/js/bootstrap.min.js"></script>
  <script src="/DoAnCoSo2/public/frontend/js/script.js"></script>

  <style>
    .toggle-password {
      position: absolute;
      right: 8%;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #aaa;
    }

    .toggle-password:hover {
      color: #000;
    }
  </style>
</head>

<body style="background-image: url(../../../public/frontend/images/background_user.jpg); background-repeat: no-repeat; background-size: cover;">
  <?php
  if (isset($_GET['tim_kiem'])) {
    $tim_kiem = $_GET['tim_kiem'];
    header("location: /DoAnCoSo2/?tim_kiem=$tim_kiem");
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $iddanhmuc = $_POST['iddanhmuc'];
    $idsanpham = $_POST['idsanpham'];
    $name = $_POST['ten_dang_nhap'];
    $password = md5($_POST['mat_khau']);

    $conn = mysqli_connect('localhost', 'root', '', 'doancoso2');
    $sql = "SELECT * FROM users WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($name == '' &&  $password = '') {
    }
    if ($count == 1 && isset($iddanhmuc) && isset($idsanpham)) {
      $row = mysqli_fetch_array($result);
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
      header("location: /DoAnCoSo2/product_details.php?iddanhmuc=$iddanhmuc&idsanpham=$idsanpham");
      die();
    }
    if ($count == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION['email'] = $row['email'];
      $_SESSION['name'] = $row['name'];
      $_SESSION['id'] = $row['id'];
      header('location: /DoAnCoSo2/index.php');
    } else {
      $error_message = 'Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.';
      $_SESSION['error'] = $error_message;

      // echo "<script type='text/javascript'>alert('$message')</script>";
    }
  }
  // Kiểm tra lỗi và hiển thị thông báo lỗi nếu có
  if (isset($_SESSION['error'])) {
    echo "<script type='text/javascript'>
            var errorMessage = '{$_SESSION['error']}';
          </script>";
    unset($_SESSION['error']);  // Xóa lỗi sau khi hiển thị để tránh lặp lại
  }
  ?>

  <div id="wrapper">
    <div id="header">
      <div class="container">
        <div class="row" id="header-main">
          <div class="col-md-2" id="header-left">
            <a href="/DoAnCoSo2/"><i class="fa fa-shopping-basket"></i>
              <span style="color: white; font-size: 30px; margin-top: 20px; display: inline-block;">SHOP</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="maincontent">
    <div class="container" style="width: 50%">
      <div class="panel panel-primary" style="margin-bottom: 0px; border-color: #ee4d2c">
        <div class="panel-heading" style="font-size: 17px; background-color: #ee4d2c; border-color: #ee4d2c">Đăng nhập</div>
        <div class="panel-body">
          <form id="form" class="form-horizontal" action="login.php" method="POST">
            <div class="form-group" style="text-align: center">
              <label class="col-sm-3 control-label" style="font-size: 13px">Tên đăng nhập <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input id="ten_dang_nhap" type="text" class="form-control" placeholder="Tên đăng nhập" name="ten_dang_nhap" style="font-size: 13px">
                <span id="error-username" style="color: red; display: none">Vui lòng nhập tên đăng nhập!</span>
              </div>
            </div>

            <div class="form-group" style="text-align: center; position: relative;">
              <label class="col-sm-3 control-label" style="font-size: 13px">Mật khẩu <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input id="mat_khau" type="password" class="form-control" placeholder="********" name="mat_khau" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự">
                <span class="toggle-password">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <span id="error-password" style="color: red; display: none">Vui lòng nhập mật khẩu!</span>
              </div>
            </div>
            <?php
            if (isset($_GET['iddanhmuc']) && isset($_GET['idsanpham'])) {
              $iddanhmuc = $_GET['iddanhmuc'];
              $idsanpham = $_GET['idsanpham'];
              echo "
                      <input type='hidden' name='iddanhmuc' value='$iddanhmuc'>
                      <input type='hidden' name='idsanpham' value='$idsanpham'>
                    ";
            }
            ?>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button id="btn_dang_nhap" type="submit" class="btn btn-primary" style="font-size: 13px; margin-left: 35%; background-color: #ee4d2c; border-color: #ee4d2c">Đăng nhập</button>
              </div>
            </div>
          </form>
          <label style="font-size: 13px; margin-left: 38%;">Bạn chưa có tài khoản? <span><a href="register.php" style="font-size: 13px; color: red">Đăng ký</a></span></label>
        </div>
      </div>
    </div>
    <div class="container-pluid" style="margin-top: 155px; border-top: 10px solid #444">
      <section id="footer-button" style="background-color: #fff">
        <div class="container-pluid">
          <div class="container">
            <div class="col-md-3 box-footer" style="border-left: none">
              <h3 class="tittle-footer">Theo dõi chúng tôi</h3>
              <ul>
                <li>
                  <i class="fa fa-facebook-official" aria-hidden="true"></i>
                  <a href="">Facebook</a>
                </li>
                <li>
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  <a href=""><i></i>Instagram</a>
                </li>
                <li>
                  <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                  <a href=""><i></i>LinkedIn</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 box-footer">
              <h3 class="tittle-footer">Sản phẩm</h3>
              <ul>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Điện thoại</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Laptop</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Tablet</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 box-footer">
              <h3 class="tittle-footer">Tổng đài hỗ trợ</h3>
              <ul>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Gọi mua hàng: 0123 456 456</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Gọi khiếu nại: 0123 567 567</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i>Gọi bảo hành: 0123 678 678</a>
                </li>
              </ul>
            </div>

            <div class="col-md-3 box-footer">
              <h3 class="tittle-footer">Liên hệ</h3>
              <ul>
                <li>
                  <i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i>
                  <a href=""><i></i>470 Trần Đại Nghĩa, Phường Hòa Quý, Quận Ngũ Hành Sơn, TP. Đà Nẵng</a>
                </li>
                <li>
                  <i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i>
                  <a href=""><i></i>0123 456 789</a>
                </li>
                <li>
                  <i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i>
                  <a href=""><i></i>support@gmail.com</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
      <section id="ft-bottom" style="background-color: #f1f1f1">
        <p class="text-center">Copyright &#169 2022 - Website bán hàng</p>
      </section>
    </div>
  </div>
  </div>
  <script src="/DoAnCoSo2/public/frontend/js/slick.min.js"></script>
  <script type="text/javascript">
    document.querySelectorAll('.toggle-password').forEach(item => {
      item.addEventListener('click', function() {
        let input = this.previousElementSibling;
        if (input.type === "password") {
          input.type = "text";
          this.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
          input.type = "password";
          this.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
      });
    });

    document.addEventListener('DOMContentLoaded', function() {
      // Kiểm tra xem có biến errorMessage không
      if (typeof errorMessage !== 'undefined') {
        // Nếu có lỗi thì hiển thị thông báo
        alert(errorMessage);
      }

      document.getElementById('btn_dang_nhap').addEventListener('click', function(event) {
        let isValid = true;

        const usernameInput = document.getElementById('ten_dang_nhap');
        const passwordInput = document.getElementById('mat_khau');
        const usernameError = document.getElementById('error-username');
        const passwordError = document.getElementById('error-password');

        // Kiểm tra tên đăng nhập
        if (usernameInput.value.trim() === '') {
          usernameError.style.display = 'block';
          isValid = false;
        } else {
          usernameError.style.display = 'none';
        }

        // Kiểm tra mật khẩu
        if (passwordInput.value.trim() === '') {
          passwordError.style.display = 'block';
          isValid = false;
        } else {
          passwordError.style.display = 'none';
        }

        // Nếu có lỗi thì không submit form
        if (!isValid) {
          event.preventDefault();
        }
      });
    });
  </script>


</body>

</html>
<script type="text/javascript">
  $(function() {
    $hidenitem = $(".hidenitem");
    $itemproduct = $(".item-product");
    $itemproduct.hover(function() {
      $(this).children(".hidenitem").show(100);
    }, function() {
      $hidenitem.hide(500);
    })
  })
</script>
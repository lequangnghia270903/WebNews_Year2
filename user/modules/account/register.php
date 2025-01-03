<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
  <title>website bán hàng</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../../public/frontend/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../../public/frontend/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../../..public/frontend/css/slick.css">
  <link rel="stylesheet" type="text/css" href="../../../public/frontend/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="../../../public/frontend/css/style.css">
  <script src="../../../public/frontend/js/jquery-3.2.1.min.js"></script>
  <script src="../../../public/frontend/js/bootstrap.min.js"></script>
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $mat_khau = md5($_POST['mat_khau']);
    // $nhap_lai_mat_khau = md5($_POST['nhap_lai_mat_khau']);

    $conn = mysqli_connect('localhost', 'root', '', 'doancoso2');
    // $them_tai_khoan_vao_bang_users_sql = "INSERT INTO users (name, email, phone, password, password_again) VALUES ('$name', '$email', '$so_dien_thoai', '$mat_khau', '$nhap_lai_mat_khau')";
    $them_tai_khoan_vao_bang_users_sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$so_dien_thoai', '$mat_khau')";

    // mysqli_query($conn, $them_tai_khoan_vao_bang_users_sql);

    if (mysqli_query($conn, $them_tai_khoan_vao_bang_users_sql)) {
      // Insert thành công, hiển thị alert bằng JavaScript
      echo '<script>
        alert("Đã đăng ký tài khoản thành công!");
        window.location.href = "login.php";
      </script>';
    } else {
      // Insert thất bại, có thể thêm xử lý khác ở đây nếu cần
      echo '<script>alert("Đăng ký tài khoản thất bại!");</script>';
    }
    // require '../../../mail.php';
    // $title = "Đăng ký thành công";
    // $content = "Chúc mừng";
    // sendmail($email, $name, $title, $content);
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
        <div class="panel-heading" style="font-size: 17px; background-color: #ee4d2c; border-color: #ee4d2c">Đăng ký</div>
        <div class="panel-body">
          <form class="form-horizontal" action="register.php" method="POST" id="registrationForm">
            <div class="form-group" style="text-align: center">
              <label class="col-sm-3 control-label" style="font-size: 13px">Họ và tên <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input type="text" class="form-control" placeholder="Họ và tên" name="name" style="font-size: 13px">
                <span class="error-message" style="color: red; font-size: 13px"></span>
              </div>
            </div>
            <div class="form-group" style="text-align: center">
              <label class="col-sm-3 control-label" style="font-size: 13px">Email <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input type="email" class="form-control" placeholder="Email" name="email" style="font-size: 13px">
                <span class="error-message" style="color: red; font-size: 13px"></span>
              </div>
            </div>
            <div class="form-group" style="text-align: center">
              <label class="col-sm-3 control-label" style="font-size: 13px">SĐT <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input type="number" id="inputPhone" class="form-control" placeholder="Số điện thoại" name="so_dien_thoai" style="font-size: 13px">
                <span class="error-message" style="color: red; font-size: 13px" id="phoneError"></span>
              </div>
            </div>
            <div class="form-group" style="text-align: center; position: relative;">
              <label class="col-sm-3 control-label" style="font-size: 13px">Mật khẩu <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input type="password" class="form-control" placeholder="********" name="mat_khau" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự">
                <span class="toggle-password">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <div class="error-message" style="color: red; font-size: 13px;"></div>
              </div>
            </div>

            <div class="form-group" style="text-align: center; position: relative;">
              <label class="col-sm-3 control-label" style="font-size: 13px">Nhập lại mật khẩu <span style="color: red">*</span></label>
              <div class="col-sm-7" style="display: inline-block">
                <input type="password" class="form-control" placeholder="********" name="nhap_lai_mat_khau" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự">
                <span class="toggle-password">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <div class="error-message" style="color: red; font-size: 13px;"></div>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary" style="font-size: 13px; margin-left: 35%; background-color: #ee4d2c; border-color: #ee4d2c">Đăng ký</button>
              </div>
            </div>
            <label style="font-size: 13px; margin-left: 38%;">Bạn đã có tài khoản? <span><a href="login.php" style="font-size: 13px; color: red">Đăng nhập</a></span></label>
          </form>
        </div>
      </div>
    </div>
    <div class="container-pluid" style="border-top: 10px solid #444; margin-top: 55px;">
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
  <script src="../../../public/frontend/js/slick.min.js"></script>
  <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
      let isValid = true;
      const inputs = document.querySelectorAll('.form-control');
      inputs.forEach(input => {
        const errorMessage = input.parentElement.querySelector('.error-message');
        if (input.value.trim() === '') {
          errorMessage.textContent = 'Không được để trống!!';
          isValid = false;
        } else {
          errorMessage.textContent = '';
        }
      });

      // Kiểm tra số điện thoại
      const phoneInput = document.getElementById('inputPhone');
      const phoneErrorMessage = document.getElementById('phoneError');
      const phoneValue = phoneInput.value.trim();
      if (phoneValue === '') {
        phoneErrorMessage.textContent = 'Trường này không được để trống!';
        isValid = false;
      } else if (phoneValue.length !== 10 || phoneValue[0] !== '0') {
        phoneErrorMessage.textContent = 'Số điện thoại phải đủ 10 số và bắt đầu bằng số 0!';
        isValid = false;
      } else {
        phoneErrorMessage.textContent = '';
      }

      // Kiểm tra mật khẩu và nhập lại mật khẩu
      const passwordInput = document.querySelector('input[name="mat_khau"]');
      const confirmPasswordInput = document.querySelector('input[name="nhap_lai_mat_khau"]');
      const confirmPasswordErrorMessage = confirmPasswordInput.parentElement.querySelector('.error-message');

      if (confirmPasswordInput.value.trim() === '') {
        confirmPasswordErrorMessage.textContent = 'Trường này không được để trống!';
        isValid = false;
      } else if (passwordInput.value !== confirmPasswordInput.value) {
        confirmPasswordErrorMessage.textContent = 'Mật khẩu không khớp!';
        isValid = false;
      } else {
        confirmPasswordErrorMessage.textContent = '';
      }

      // Nếu form không hợp lệ thì ngăn việc submit
      if (!isValid) {
        event.preventDefault();
      }
    });

    // Thêm chức năng hiện/ẩn mật khẩu
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
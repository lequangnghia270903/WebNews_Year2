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

<body style="background-color: rgb(245 245 245)">
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_SESSION['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $conn = mysqli_connect("localhost", "root", "", "doancoso2");

    // Kiểm tra mật khẩu cũ có đúng không
    $query = "SELECT password FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    // Nếu mật khẩu cũ khớp với mật khẩu trong cơ sở dữ liệu
    if (md5($old_password) === $user['password']) {
      $password_md5 = md5($new_password);

      // Cập nhật mật khẩu mới vào cơ sở dữ liệu
      $update_query = "UPDATE users SET password = '$password_md5' WHERE id = '$id'";
      if (mysqli_query($conn, $update_query)) {
        echo '<script>alert("Đổi mật khẩu thành công!");</script>';
      } else {
        echo '<script>alert("Đổi mật khẩu thất bại!");</script>';
      }
    } else {
      echo '<script>alert("Mật khẩu cũ không chính xác!");</script>';
    }
  }
  ?>
  <div id="wrapper">
    <div id="header">
      <div id="header-top">
        <div class="container">
          <div class="row clearfix">
            <div class="col-md-6" style="float: right">
              <nav id="header-nav-top">
                <ul class="list-inline pull-right" id="headermenu">
                  <li>
                    <a href="" style="font-size: 13px"><img src="/DoAnCoSo2/public/frontend/images/avatar.png" class="img-circle" alt="" width="22px"> <?php echo $_SESSION['name'] ?> <i class="fa fa-caret-down"></i></a>
                    <ul id="header-submenu">
                      <li><a href="./my_profile.php">Tài khoản của tôi</a></li>
                      <li><a href="../order/purchase_order.php">Đơn mua</a></li>
                      <li><a href="./logout.php">Đăng xuất</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row" id="header-main">
          <div class="col-md-10" id="header-left">
            <a href="/DoAnCoSo2/"><i class="fa fa-shopping-basket"></i><span style="color: white; font-size: 30px">SHOP</span></a>
          </div>
          <div class="col-md-2" id="header-right">
            <a href="../cart/cart.php" style="font-size: 15px; color: white"><i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ hàng</a>
          </div>
        </div>
      </div>
      <div id="menunav">
        <div class="container">
          <nav>
            <div class="home pull-left">
              <ul id="menu-main">
                <li>
                  <a href="/DoAnCoSo2/">TRANG CHỦ</a>
                </li>
                <li>
                  <a href="">GIỚI THIỆU</a>
                </li>
                <li>
                  <a href="">TIN TỨC</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <div id="maincontent">
      <div class="container">
        <div class="col-md-3 fixside">
          <div class="box-left box-menu">
            <ul>
              <li class="clearfix">
                <a href="my_profile.php" style="font-size: 13px; text-transform: none"><img src="/DoAnCoSo2/public/frontend/images/avatar.png" class="img-circle" alt="" width="50px"> <?php echo $_SESSION['name'] ?>
                  <p style="margin-left: 50px; margin-top: -15px"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa hồ sơ</p>
                </a>
              </li>
              <li class="clearfix">
                <div>
                  <p class="name" style="width: 100%"><i class="fa fa-user-o" aria-hidden="true" style="color: #0046ab"></i> Tài khoản của tôi</p>
                  <a href="./my_profile.php"><b class="name" style="padding-left: 25px">Hồ sơ</b><br></a>
                  <a href=""><b class="name" style="padding-left: 25px">Đối mật khẩu</b><br></a>
                </div>
                <a href="../order/purchase_order.php">
                  <div>
                    <p class="name" style="width: 100%"><i class="fa fa-credit-card" aria-hidden="true" style="color: #0046ab"></i> Đơn mua</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-9 bor" style="background-color: #fff">
          <div style="padding: 18px; border-bottom: 1px solid #efefef">
            <h4>Đổi mật khẩu</h4>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" action="change_password.php" method="POST" id="changePassForm">
              <div class="form-group" style="text-align: center; position: relative;">
                <label class="col-sm-3 control-label" style="font-size: 13px">Mật khẩu cũ <span style="color: red">*</span></label>
                <div class="col-sm-7" style="display: inline-block; position: relative;">
                  <input type="password" class="form-control" placeholder="********" name="old_password" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự" required>
                  <span class="toggle-password">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </span>
                  <span class="error-message" style="color: red; font-size: 13px"></span>
                </div>
              </div>

              <div class="form-group" style="text-align: center; position: relative;">
                <label class="col-sm-3 control-label" style="font-size: 13px">Mật khẩu mới <span style="color: red">*</span></label>
                <div class="col-sm-7" style="display: inline-block; position: relative;">
                  <input type="password" class="form-control" placeholder="********" name="new_password" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự" required>
                  <span class="toggle-password">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </span>
                  <div class="error-message" style="color: red; font-size: 13px;"></div>
                </div>
              </div>

              <div class="form-group" style="text-align: center; position: relative;">
                <label class="col-sm-3 control-label" style="font-size: 13px">Nhập lại mật khẩu mới <span style="color: red">*</span></label>
                <div class="col-sm-7" style="display: inline-block; position: relative;">
                  <input type="password" class="form-control" placeholder="********" name="confirm_password" style="font-size: 13px" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự" required>
                  <span class="toggle-password">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </span>
                  <div class="error-message" style="color: red; font-size: 13px;"></div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" style="font-size: 13px; margin-left: 11%; background-color: #ee4d2c; border-color: #ee4d2c">Đổi mật khẩu</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-pluid" style="margin-top: 40px; border-top: 10px solid #444">
      <section id="footer-button" style="background-color: #fff">
        <div class="container-pluid">
          <div class="container">
            <div class="col-md-3" id="ft-about">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco </p>
            </div>
            <div class="col-md-3 box-footer">
              <h3 class="tittle-footer">my accout</h3>
              <ul>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Giới thiệu</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Liên hệ </a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Contact </a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> My Account</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Giới thiệu</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3 box-footer">
              <h3 class="tittle-footer">my accout</h3>
              <ul>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Giới thiệu</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Liên hệ </a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Contact </a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> My Account</a>
                </li>
                <li>
                  <i class="fa fa-angle-double-right"></i>
                  <a href=""><i></i> Giới thiệu</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3" id="footer-support">
              <h3 class="tittle-footer"> Liên hệ</h3>
              <ul>
                <li>
                  <p><i class="fa fa-home" style="font-size: 16px;padding-right: 5px;"></i> 470 Trần Đại Nghĩa, Phường Hòa Quý, Quận Ngũ Hành Sơn, TP. Đà Nẵng </p>
                  <p><i class="sp-ic fa fa-mobile" style="font-size: 22px;padding-right: 5px;"></i> 0123 456 789</p>
                  <p><i class="sp-ic fa fa-envelope" style="font-size: 13px;padding-right: 5px;"></i> support@gmail.com</p>
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
  <script>
    document.getElementById('changePassForm').addEventListener('submit', function(event) {
      let isValid = true;
      const inputs = document.querySelectorAll('.form-control');

      // Kiểm tra từng input có rỗng hay không
      inputs.forEach(input => {
        const errorMessage = input.closest('.form-group').querySelector('.error-message');
        if (input.value.trim() === '') {
          errorMessage.textContent = 'Không được để trống!!';
          isValid = false;
        } else {
          errorMessage.textContent = '';
        }
      });

      // Kiểm tra mật khẩu và nhập lại mật khẩu
      const passwordInput = document.querySelector('input[name="new_password"]');
      const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');
      const confirmPasswordErrorMessage = confirmPasswordInput.closest('.form-group').querySelector('.error-message');

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
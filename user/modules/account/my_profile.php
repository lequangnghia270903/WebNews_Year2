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
</head>

<body style="background-color: rgb(245 245 245)">
  <?php $conn = mysqli_connect("localhost", "root", "", "doancoso2") ?>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', address = '$address'  WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script>alert('Cập nhật hồ sơ thành công!');</script>";
    } else {
      // Hiển thị dialog thông báo thất bại
      echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
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
                      <li><a href="">Tài khoản của tôi</a></li>
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
                <a href="" style="font-size: 13px; text-transform: none"><img src="/DoAnCoSo2/public/frontend/images/avatar.png" class="img-circle" alt="" width="50px"> <?php echo $_SESSION['name'] ?>
                  <p style="margin-left: 50px; margin-top: -15px"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa hồ sơ</p>
                </a>
              </li>
              <li class="clearfix">
                <div>
                  <p class="name" style="width: 100%"><i class="fa fa-user-o" aria-hidden="true" style="color: #0046ab"></i> Tài khoản của tôi</p>
                  <a href=""><b class="name" style="padding-left: 25px">Hồ sơ</b><br></a>
                  <a href="./change_password.php"><b class="name" style="padding-left: 25px">Đối mật khẩu</b><br></a>
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
            <h4>Hồ Sơ Của Tôi</h4>
          </div>
          <p id="alert_success_profile" class="alert alert-success" role="alert" style="margin-bottom: 0px; display: none">
            Cập nhật hồ sơ thành công
          </p>
          <div class="panel-body">
            <?php
            $iduser = $_SESSION['id'];
            $sql = "SELECT * FROM users WHERE id = $iduser";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            ?>
            <form class="form-horizontal" action="my_profile.php" method="POST" id="profileFrom">
              <div class="form-group" style="text-align: center">
                <label class="col-sm-3 control-label" style="font-size: 13px">Tên đăng nhập </label>
                <div class="col-sm-7" style="display: inline-block">
                  <input type="text" id="inputUserName" class="form-control" placeholder="Tên đăng nhập" Value="<?php echo $row['name'] ?>" name="name" style="font-size: 13px">
                  <span class="error-message" style="color: red; font-size: 13px"></span>
                </div>
              </div>
              <div class="form-group" style="text-align: center">
                <label class="col-sm-3 control-label" style="font-size: 13px">Số điện thoại</label>
                <div class="col-sm-7" style="display: inline-block">
                  <input type="number" id="inputPhone" class="form-control" placeholder="Số điện thoại" Value="<?php echo $row['phone'] ?>" name="phone" style="font-size: 13px">
                  <span class="error-message" style="color: red; font-size: 13px" id="phoneError"></span>
                </div>
              </div>
              <div class="form-group" style="text-align: center">
                <label class="col-sm-3 control-label" style="font-size: 13px">Email</label>
                <div class="col-sm-7" style="display: inline-block">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email" Value="<?php echo $row['email'] ?>" name="email" style="font-size: 13px">
                  <span class="error-message" style="color: red; font-size: 13px"></span>
                </div>
              </div>
              <div class="form-group" style="text-align: center">
                <label class="col-sm-3 control-label" style="font-size: 13px">Địa chỉ </label>
                <div class="col-sm-7" style="display: inline-block">
                  <input type="text" id="inputAddress" class="form-control" placeholder="Địa chỉ" Value="<?php echo $row['address'] ?>" name="address" style="font-size: 13px">
                  <span class="error-message" style="color: red; font-size: 13px"></span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button id="btn_save" type="submit" class="btn btn-primary" style="font-size: 13px; margin-left: 11%; background-color: #ee4d2c; border-color: #ee4d2c">Lưu</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container-pluid" style="margin-top: 50px; border-top: 10px solid #444">
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
  <script>
    document.getElementById('profileFrom').addEventListener('submit', function(event) {
      let isValid = true;
      const inputs = document.querySelectorAll('.form-control');
      inputs.forEach(input => {
        const errorMessage = input.nextElementSibling;
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

      // Nếu form không hợp lệ thì ngăn việc submit
      if (!isValid) {
        event.preventDefault();
      }
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
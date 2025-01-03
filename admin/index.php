<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Đăng nhập admin</title>
  <link href="../public/admin/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

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

<body style="background-image: url(../public/frontend/images/background.jpg);">
  <?php
  $loginError = false; // Thêm biến để kiểm tra lỗi đăng nhập

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $conn = mysqli_connect('localhost', 'root', '', 'doancoso2');
    $sql = "SELECT * FROM admins WHERE name = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
      $row = mysqli_fetch_array($result);
      $_SESSION['name'] = $row['name'];
      header('location: ./overview.php');
    } else {
      $loginError = true; // Đánh dấu lỗi đăng nhập
    }
  }
  ?>
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Đăng nhập</h3>
                </div>
                <div class="card-body">
                  <form action="index.php" method="POST" id="loginForm" onsubmit="return validateForm()">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="inputEmail" type="text" placeholder="Tên đăng nhập" name="name">
                      <label for="inputEmail">Tên đăng nhập</label>
                      <div id="nameError" class="text-danger" style="display:none;">Vui lòng nhập tên đăng nhập.</div>
                    </div>
                    <div class="form-floating mb-3 position-relative">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Mật khẩu" name="password" minlength="8" title="Mật khẩu phải có ít nhất 8 ký tự">
                      <label for="inputPassword">Mật khẩu</label>
                      <span class="toggle-password">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                      </span>
                      <div id="passwordError" class="text-danger" style="display:none;">Vui lòng nhập mật khẩu.</div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                      <button type="submit" class="btn btn-primary" style="margin: auto;">Đăng nhập</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &#169 2022 - Website bán hàng</div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="../public/admin/js/"></script>
  <script>
    document.querySelectorAll('.toggle-password').forEach(item => {
      item.addEventListener('click', function() {
        let input = this.closest('.form-floating').querySelector('input'); // Lấy trường input mật khẩu trong cùng thẻ .form-floating
        if (input.type === "password") {
          input.type = "text";
          this.innerHTML = '<i class="fa fa-eye-slash" aria-hidden="true"></i>';
        } else {
          input.type = "password";
          this.innerHTML = '<i class="fa fa-eye" aria-hidden="true"></i>';
        }
      });
    });

    function validateForm() {
      var name = document.getElementById('inputEmail').value;
      var password = document.getElementById('inputPassword').value;
      var valid = true;

      // Reset error messages
      document.getElementById('nameError').style.display = 'none';
      document.getElementById('passwordError').style.display = 'none';

      // Validate name
      if (name.trim() === "") {
        document.getElementById('nameError').style.display = 'block';
        valid = false;
      }

      // Validate password
      if (password.trim() === "") {
        document.getElementById('passwordError').style.display = 'block';
        valid = false;
      }

      return valid; // Prevent form submission if invalid
    }

    // Hiển thị thông báo lỗi nếu đăng nhập không thành công
    <?php if ($loginError): ?>
      alert('Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng thử lại.');
    <?php endif; ?>
  </script>
</body>

</html>
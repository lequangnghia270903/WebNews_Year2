<?php require '../../layouts/header.php' ?>
<style>
  label {
    font-weight: 400;
  }

  form {
    border: 1px solid #ee4d2c;
    padding: 10px;
  }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name_receiver = $_POST['name_receiver'];
  $phone_receiver = $_POST['phone_receiver'];
  $address_receiver = $_POST['address_receiver'];
  $payment_method = $_POST['payment_method'];

  $cart = $_SESSION['cart'];
  $total_payment = 0;
  foreach ($cart as $each) {
    $total_payment += $each['so_luong'] * $each['price'];
  }

  $user_id = $_SESSION['id'];
  $status = '0'; //Chờ xử lý

  $them_thong_tin_vao_bang_orders_sql = "INSERT INTO orders(user_id, name_receiver, phone_receiver, address_receiver, payment_method, total_payment, status) VALUES ('$user_id', '$name_receiver', '$phone_receiver', '$address_receiver', '$payment_method', '$total_payment', '$status')";

  if (mysqli_query($conn, $them_thong_tin_vao_bang_orders_sql)) {
    $get_order_id_sql = "SELECT max(id) FROM orders WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $get_order_id_sql);
    $order_id = mysqli_fetch_array($result)['max(id)'];

    foreach ($cart as $idsanpham => $each) {
      $quantity = $each['so_luong'];
      $price = $each['price'];
      $sql = "INSERT INTO order_product(order_id, product_id, quantity, price) VALUES ('$order_id', '$idsanpham', '$quantity', '$price')";
      mysqli_query($conn, $sql);

      $sql = "SELECT number FROM products WHERE id = $idsanpham";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $current_number = $row['number'];
        $remain_number = $current_number - $quantity;
        $sql = "UPDATE products SET number = $remain_number WHERE id = $idsanpham";
        mysqli_query($conn, $sql);
      }
    }

    // Gửi email thông báo
    require '../../../mail.php';
    $email =  $_SESSION['email'];
    $name = $_SESSION['name'];
    $title = "Đặt hàng thành công";
    $content = "Bạn có 1 đơn hàng đã đặt thành công tại Shop";
    sendmail($email, $name, $title, $content);

    mysqli_close($conn);
    unset($_SESSION['cart']);

    // Hiển thị thông báo thành công
    echo "<script>
            alert('Đặt hàng thành công!');
            window.location.href = './purchase_order.php';
          </script>";
  } else {
    // Hiển thị dialog thông báo thất bại
    echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
  }
}
?>
<div class="col-md-9 bor">
  <section class="box-main1">
    <h3 class="title-main"><a href="">Đặt hàng</a> </h3>
    <table class="table table-hover" style="margin-bottom: unset; text-align: center">
      <thead>
        <tr>
          <td>STT</td>
          <td>Ảnh</td>
          <td>Tên sản phẩm</td>
          <td>Số lượng</td>
          <td>Đơn giá</td>
          <td>Thành tiền</td>
        </tr>
      </thead>

      <body>
        <?php $tong_thanh_toan = 0 ?>
        <?php $stt = 1;
        foreach ($_SESSION['cart'] as $idsanpham => $row) { ?>
          <tr>
            <td><?php echo $stt ?></td>
            <td>
              <a href="/DoAnCoSo2/product_details.php?iddanhmuc=<?php echo $row['id_category'] ?>&idsanpham=<?php echo $idsanpham ?>"><img src="../../../public/frontend/images/<?php echo $row['image'] ?>" alt="" height="50px"></a>
            </td>
            <td>
              <a href="product_details.php?iddanhmuc=<?php echo $row['id_category'] ?>&idsanpham=<?php echo $idsanpham ?>">
                <p><?php echo $row['name'] ?></p>
              </a>
            </td>
            <td><?php echo $row['so_luong'] ?></td>
            <td><?php echo number_format($row['price']) ?>đ</td>
            <td>
              <span style="color: #ee4d2d">
                <?php
                $so_tien = $row['price'] * $row['so_luong'];
                $tong_thanh_toan += $so_tien;
                echo number_format($so_tien);
                ?>đ
              </span>
            </td>
          </tr>
        <?php $stt++;
        } ?>
      </body>
    </table>
    <div class="panel-body" style="border-top: 1px solid #ddd">
      <?php
      $iduser = $_SESSION['id'];
      $sql = "SELECT * FROM users WHERE id = $iduser";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      ?>
      <form class="form-horizontal" action="order.php" method="POST" id="oderForm">
        <label class="" style="font-size: 13px">THÔNG TIN KHÁCH KHÀNG</label>
        <div class="form-group" style="text-align: center">
          <label class="col-sm-3 control-label" style="font-size: 13px">Tên người nhận<span style="color: red">*</span></label>
          <div class="col-sm-8" style="display: inline-block">
            <input type="text" class="form-control" placeholder="Họ và tên" value="<?php echo $row['name'] ?>" name="name_receiver" style="font-size: 13px">
            <span class="error-message" style="color: red; font-size: 13px"></span>
          </div>
        </div>
        <div class="form-group" style="text-align: center">
          <label class="col-sm-3 control-label" style="font-size: 13px">Số điện thoại<span style="color: red">*</span></label>
          <div class="col-sm-8" style="display: inline-block">
            <input type="number" class="form-control" placeholder="Số điện thoại liên hệ" value="<?php echo $row['phone'] ?>" name="phone_receiver" style="font-size: 13px" id="phone_receiver">
            <span class="error-message" style="color: red; font-size: 13px" id="phone_error"></span>
          </div>
        </div>
        <div class="form-group" style="text-align: center">
          <label class="col-sm-3 control-label" style="font-size: 13px">Địa chỉ nhận hàng<span style="color: red">*</span></label>
          <div class="col-sm-8" style="display: inline-block">
            <input type="text" class="form-control" placeholder="Địa chỉ nhận hàng" value="<?php echo $row['address'] ?>" name="address_receiver" style="font-size: 13px">
            <span class="error-message" style="color: red; font-size: 13px"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label" style="font-size: 13px">Phương thức thanh toán<span style="color: red">*</span></label>
          <div class="col-sm-3" style="display: inline-block">
            <input id="flexRadioDefault1" class="form-check-input" type="radio" name="payment_method" value="Thanh toán khi nhận hàng" checked="true">
            <label class="form-check-label" for="flexRadioDefault1">Thanh toán khi nhận hàng</label>
          </div>
          <div class="col-sm-4" style="display: inline-block">
            <input id="flexRadioDefault1" class="form-check-input" type="radio" name="payment_method" value="Thanh toán qua ngân hàng">
            <label class="form-check-label" for="flexRadioDefault1">Thanh toán qua ngân hàng</label>
          </div>
        </div>
        <div class="form-group" style="margin-bottom: unset; text-align: center">
          <label class="col-sm-9 control-label" style="font-size: 13px">Tổng thanh toán: <span style="color: #ee4d2d"><?php echo number_format($tong_thanh_toan) ?>đ</span></label>
          <div class="col-sm-2" style="display: inline-block">
            <button type="submit" class="btn btn-primary" style="background-color: #ee4d2c; border-color: #ee4d2c">Đặt hàng</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<script>
  document.getElementById('oderForm').addEventListener('submit', function(event) {
    let isValid = true;
    const inputs = document.querySelectorAll('.form-control');
    const phoneInput = document.getElementById('phone_receiver');
    const phoneErrorMessage = document.getElementById('phone_error');

    inputs.forEach(input => {
      const errorMessage = input.nextElementSibling;
      if (input.value.trim() === '') {
        errorMessage.textContent = 'Trường này không được để trống!';
        isValid = false;
      } else {
        errorMessage.textContent = '';
      }
    });

    // Kiểm tra số điện thoại
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

</script>

<?php require '../../layouts/footer.php' ?>
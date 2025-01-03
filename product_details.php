<?php require './user/layouts/header.php' ?>
<?php
if (isset($_SESSION['id'])) {
  $iduser = $_SESSION['id'];
}

$iddanhmuc = $_GET['iddanhmuc'];
$idsanpham = $_GET['idsanpham'];

?>
<script>
  $(document).on('click', '#btn_send', function(e) {
    var $product_id = "<?php echo $idsanpham ?>"
    var $user_id = "<?php echo $iduser ?>"
    $.ajax({
      url: "./comment.php",
      type: "POST",
      data: {
        content: $('#comment').val(),
        product_id: $product_id,
        user_id: $user_id
      },
      success: function(response) {
        $("#list_comment").append('<p><?php echo $_SESSION['name'] ?>: ' + $('#comment').val() + '</p>')
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown)
      }
    })
  });
</script>
<?php
//Lay san pham theo id san pham
$conn = mysqli_connect("localhost", "root", "", "doancoso2");
$lay_san_pham_theo_id_san_pham_sql = "SELECT * FROM products WHERE id = $idsanpham";
$lay_san_pham_theo_id_san_pham_sql_result = mysqli_query($conn, $lay_san_pham_theo_id_san_pham_sql);
$lay_san_pham_theo_id_san_pham_row = mysqli_fetch_array($lay_san_pham_theo_id_san_pham_sql_result);
//Lay san pham theo id danh muc
$id_category = $_GET['iddanhmuc'];
$lay_san_pham_theo_id_danhmuc_sql = "SELECT * FROM products WHERE id_category = $id_category ORDER BY RAND() LIMIT 4";
$lay_san_pham_theo_id_danhmuc_sql_result = mysqli_query($conn, $lay_san_pham_theo_id_danhmuc_sql);
//Hien thi danh sach binh luan
$danh_sach_binh_luan_sql = "SELECT * FROM comments WHERE product_id = $idsanpham";
$danh_sach_binh_luan_sql_result = mysqli_query($conn, $danh_sach_binh_luan_sql);
?>
<div class="col-md-9 bor" style="padding-bottom: 15px">
  <section class="box-main1">
    <div class="col-md-6 text-center">
      <img src="./public/frontend/images/<?php echo $lay_san_pham_theo_id_san_pham_row['image'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370px" style="padding: 5px">
    </div>
    <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
      <ul id="right">
        <li>
          <h3>Tên: <?php echo $lay_san_pham_theo_id_san_pham_row['name'] ?></h3>
        </li>
        <li>
          <p>Giá: <b><?php echo number_format($lay_san_pham_theo_id_san_pham_row['price']) ?>đ</b></p>
        </li>
        <li>
          <p>Số lượng: <b><?php echo $lay_san_pham_theo_id_san_pham_row['number'] ?></b></p>
        </li>
        <?php if (isset($_SESSION['name'])) { ?>
          <?php if ($lay_san_pham_theo_id_san_pham_row['number'] == 0) { ?>
            <li>
              <a id="btn_add_cart" href="" class="btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
            </li>
            <li id="alert_cart" class="alert alert-success" role="alert" style="margin-left: 8px; margin-bottom: 0px; display: none">
              Đã hết hàng
            </li>
          <?php } else { ?>
            <li>
              <a id="btn_add_cart" href="./user/modules/cart/add_to_cart.php?iddanhmuc=<?php echo $iddanhmuc ?>&idsanpham=<?php echo $idsanpham ?>" class="btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ hàng</a>
            </li>
            <li id="alert_cart" class="alert alert-success" role="alert" style="margin-left: 8px; margin-bottom: 0px; display: none">
              Sản phẩm đã được thêm vào giỏ hàng
            </li>
          <?php } ?>
        <?php } else { ?>
          <li>
            <a href="./user/modules/account/login.php?iddanhmuc=<?php echo $iddanhmuc ?>&idsanpham=<?php echo $idsanpham ?>" class="btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </section>
  <div class="col-md-12" id="tabdetail">
    <div class="row">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm</a></li>
        <li><a data-toggle="tab" href="#menu1">Nội dung bình luận</a></li>
      </ul>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <p><?php echo $lay_san_pham_theo_id_san_pham_row['content'] ?></p>
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3 style="margin-left: 0px; display: inline-flex">Bình luận</h3>
          <br>
          <div id="list_comment">
            <div style="display: flex; margin-bottom: 10px; align-items: center;">
              <textarea name="comment" id="comment" cols="50" rows="2"></textarea>
              <button id="btn_send" type="button" class="btn btn-primary" style="font-size: 13px; border-color: #ee4d2c; margin-left: 10px" onclick="validateAndSubmit()">Gửi</button>
              <span id="errorMessage" style="color: red; font-size: 13px; margin-left: 10px; display: none;">Vui lòng nhập bình luận!</span>
            </div>
            <div style="text-align: left; width: 100%; margin: auto">
              <?php
              while ($row = mysqli_fetch_array($danh_sach_binh_luan_sql_result)) {
                $id =  $row['id'];
                $iduser = $row['user_id'];
                $ten_nguoi_dung_sql = "SELECT * FROM users WHERE id = $iduser";
                $ten_nguoi_dung_sql_result = mysqli_query($conn, $ten_nguoi_dung_sql);
                $user_row = mysqli_fetch_array($ten_nguoi_dung_sql_result);
                $ten_nguoi_binh_luan = $user_row['name'];
                $content = $row['content'];
                echo "<div><span>${ten_nguoi_binh_luan}</span>: <span>${content}</span></div>";
                echo "<br>";
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-md-9 bor" style="margin-top: 20px; padding-top: 10px; padding-bottom: 15px">
  <h4>CÁC SẢN PHẨM KHÁC</h4>
  <div class="showitem">
    <?php foreach ($lay_san_pham_theo_id_danhmuc_sql_result as $row) { ?>
      <div class="col-md-3 item-product bor">
        <a href="product_details.php?iddanhmuc=<?php echo $id_category ?>&idsanpham=<?php echo $row['id'] ?>">
          <img src="./public/frontend/images/<?php echo $row['image'] ?>" class="" width="100%" height="180px">
        </a>
        <div class="info-item">
          <a href="product_details.php?iddanhmuc=<?php echo $id_category ?>&idsanpham=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
          <p><b><?php echo number_format($row['price']) ?>đ</b></p>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<script>
  function validateAndSubmit() {
    var comment = document.getElementById('comment').value.trim();
    var errorMessage = document.getElementById('errorMessage');

    if (comment === "") {
      // Hiển thị thông báo lỗi
      errorMessage.style.display = "inline";
    } else {
      // Ẩn thông báo lỗi nếu có giá trị và gửi form
      errorMessage.style.display = "none";
      document.getElementById('commentForm').submit(); // Thay 'commentForm' bằng ID của form nếu có
    }
  }
</script>
<?php require './user/layouts/footer.php' ?>
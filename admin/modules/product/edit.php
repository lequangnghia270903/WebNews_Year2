<style type="text/css">
  .form-group {
    margin-top: 20px
  }
</style>
<?php $conn = mysqli_connect("localhost", "root", "", "doancoso2") ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $id_category = $_POST['id_category'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $number = $_POST['number'];
  $image_new = $_FILES['image_new'];
  if ($image_new['size'] > 0) {
    $folder = '../../../public/frontend/images/';
    $file_name = basename($image_new['name']);
    $path_file = $folder . $file_name;
    move_uploaded_file($image_new['tmp_name'], $path_file);
  } else {
    $file_name = $_POST['image_old'];
  }
  $content = $_POST['content'];

  $sql = "UPDATE products 
    SET 
    id_category='$id_category', 
    name = '$name', 
    price = $price, 
    number = $number, 
    image = '$file_name', 
    content = '$content' 
    WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>
            alert('Cập nhật sản phẩm thành công!');
            window.location.href = '/DoAnCoSo2/admin/modules/product';
          </script>";
  } else {
    // Hiển thị dialog thông báo thất bại
    echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
  }
}
?>
<?php require '../../layouts/header.php' ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Sửa sản phẩm</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="/DoAnCoSo2/admin/modules/product">Sản phẩm</a></li>
      <li class="breadcrumb-item"><a href="/DoAnCoSo2/admin/modules/product/add.php">Thêm mới</a></li>
      <li class="breadcrumb-item active">Sửa sản phẩm</li>
    </ol>
    <?php
    $idsanpham = $_GET['idsanpham'];
    $sql = "SELECT * FROM products WHERE id = $idsanpham";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>
    <form class="form-horizontal" action="edit.php" method="POST" enctype="multipart/form-data" onsubmit=" return validateForm()">
      <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'] ?>">
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Danh mục</label>
        <div class="col-sm-10" style="display: inline-block">
          <select class="form-control col-sm10" name="id_category">
            <?php
            $sql = "SELECT * FROM categorys";
            $result = mysqli_query($conn, $sql);
            ?>
            <?php foreach ($result as $each) { ?>
              <option value="<?php echo $each['id'] ?>" <?php if ($row['id_category'] == $each['id']) { ?>selected<?php } ?>>
                <?php echo $each['name'] ?>
              </option>
            <?php } ?>
          </select>
        </div>
      </div>

      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Tên sản phẩm</label>
        <div class="col-sm-10" style="display: inline-block">
          <input type="text" id="inputnameProduct" class="form-control" name="name" value="<?php echo $row['name'] ?>">
        </div>
        <div id="nameProductError" class="text-danger" style="display:none;">Vui lòng nhập tên sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Giá</label>
        <div class="col-sm-10" style="display: inline-block">
          <input type="number" id="inputPrice" class="form-control" name="price" value="<?php echo $row['price'] ?>">
        </div>
        <div id="priceError" class="text-danger" style="display:none;">Vui lòng nhập giá sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Số lượng</label>
        <div class="col-sm-10" style="display: inline-block">
          <input type="number" id="inputNumber" class="form-control" name="number" value="<?php echo $row['number'] ?>">
        </div>
        <div id="numberError" class="text-danger" style="display:none;">Vui lòng nhập số lượng sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Đối ảnh mới</label>
        <div class="col-sm-10" style="display: inline-block">
          <input type="file" class="form-control" name="image_new">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" style="padding-left: 30px">Hoặc giữ ảnh cũ</label>
        <div class="col-sm-9" style="display: inline-block">
          <img src="../../../public/frontend/images/<?php echo $row['image'] ?>" height='50px' alt="">
          <input type="hidden" class="form-control" name="image_old" value="<?php echo $row['image'] ?>">
        </div>
      </div>
      <!-- <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Nội dung</label>
        <div class="col-sm-10" style="display: inline-block">
          <input type="text" class="form-control" name="content" value="<?php echo $row['content'] ?>">
        </div>
      </div> -->
      <div class="form-group" style="display: flex; width: 89%; margin-left: 5%;">
        <label class="col-sm-1 control-label">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $row['content'] ?></textarea>
        <script>
          ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
              console.error(error);
            });
        </script>
        <div id="contentError" class="text-danger" style="display:none;">Vui lòng điền nội dung mô tả sản phẩm</div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" style="margin: 2% 0% 0% 15%">Lưu</button>
        </div>
      </div>
    </form>
  </div>
</main>
<script>
  function validateForm() {
    var nameProduct = document.getElementById('inputnameProduct').value;
    var price = document.getElementById('inputPrice').value;
    var number = document.getElementById('inputNumber').value;
    var content = document.getElementById('content').value;
    var valid = true;

    // Reset error messages
    document.getElementById('nameProductError').style.display = 'none';
    document.getElementById('priceError').style.display = 'none';
    document.getElementById('numberError').style.display = 'none';
    document.getElementById('contentError').style.display = 'none';

    // Validate name product
    if (nameProduct.trim() === "") {
      document.getElementById('nameProductError').style.display = 'block';
      valid = false;
    }

    // Validate price
    if (price.trim() === "") {
      document.getElementById('priceError').style.display = 'block';
      valid = false;
    }

    // Validate price
    if (number.trim() === "") {
      document.getElementById('numberError').style.display = 'block';
      valid = false;
    }

    // Validate content (the textarea)
    if (content.trim() === "") {
      document.getElementById('contentError').style.display = 'block';
      valid = false;
    }

    return valid; // Prevent form submission if invalid
  }
</script>
<?php require '../../layouts/footer.php' ?>
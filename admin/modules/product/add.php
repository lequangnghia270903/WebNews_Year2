<style type="text/css">
  .form-group {
    margin-top: 20px
  }
</style>
<?php $conn = mysqli_connect("localhost", "root", "", "doancoso2") ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_category = $_POST['id_category'];
  $tensanpham = $_POST['name'];
  $gia = $_POST['price'];
  $soluong = $_POST['number'];
  $hinhanh = $_FILES['image'];
  $noidung = $_POST['content'];

  $folder = '../../../public/frontend/images/';
  // $file_extension = explode('.', $hinhanh['name'])[1];
  // $file_name = time() . '.' . $file_extension;
  // $path_file = $folder . $file_name;
  $file_name = basename($hinhanh['name']);
  $path_file = $folder . $file_name;

  move_uploaded_file($hinhanh['tmp_name'], $path_file);

  $sql = "INSERT INTO products (id_category, name, price, number, image, content) VALUES ($id_category, '$tensanpham', $gia, $soluong, '$file_name', '$noidung')";
  $kq = mysqli_query($conn, $sql);
  if ($kq) {
    // Hiển thị dialog thông báo thành công
    echo "<script>alert('Thêm sản phẩm thành công!');</script>";
  } else {
    // Hiển thị dialog thông báo thất bại
    echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
  }
}
?>
<?php require '../../layouts/header.php' ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Thêm mới sản phẩm</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="/DoAnCoSo2/admin/modules/product">Sản phẩm</a></li>
      <li class="breadcrumb-item active">Thêm mới</li>
    </ol>
    <form class="form-horizontal" action="add.php" method="POST" enctype="multipart/form-data" id="addForm" onsubmit=" return validateForm()">
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Danh mục</label>
        <div class="col-sm-9" style="display: inline-block">
          <select id="inputCategory" class="form-control col-sm10" name="id_category">
            <option value="">Mời bạn chọn danh mục sản phẩm</option>
            <?php
            $sql = "SELECT * FROM categorys";
            $kq = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($kq))
              echo '<option value = "' . $row['id'] . '">' . $row['name'] . '</option>'
            ?>
          </select>
        </div>
        <div id="categoryError" class="text-danger" style="display:none;">Vui lòng chọn danh mục</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Tên sản phẩm</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="text" id="inputnameProduct" class="form-control" placeholder="Tên sản phẩm" name="name">
        </div>
        <div id="nameProductError" class="text-danger" style="display:none;">Vui lòng nhập tên sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Giá sản phẩm</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="number" id="inputPrice" class="form-control" placeholder="0" name="price">
        </div>
        <div id="priceError" class="text-danger" style="display:none;">Vui lòng nhập giá sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Số lượng</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="number" id="inputNumber" class="form-control" placeholder="0" name="number">
        </div>
        <div id="numberError" class="text-danger" style="display:none;">Vui lòng nhập số lượng sản phẩm</div>
      </div>
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Hình ảnh</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="file" id="inputImage" class="form-control" name="image">
        </div>
        <div id="imageError" class="text-danger" style="display:none;">Vui lòng chọn hình ảnh sản phẩm</div>
      </div>
      <!-- <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Nội dung</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="text" class="form-control" placeholder="Mô tả..." name="content">
        </div>
      </div> -->
      <div class="form-group" style="display: flex; margin-left: 9%;">
        <label class="col-sm-1 control-label">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
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
          <button type="submit" class="btn btn-primary" style="margin-left: 20%">Lưu</button>
        </div>
      </div>
    </form>
  </div>
</main>
<script>
  function validateForm() {
    var category = document.getElementById('inputCategory').value;
    var nameProduct = document.getElementById('inputnameProduct').value;
    var price = document.getElementById('inputPrice').value;
    var number = document.getElementById('inputNumber').value;
    var image = document.getElementById('inputImage').value;
    var content = document.getElementById('content').value;
    var valid = true;

    // Reset error messages
    document.getElementById('categoryError').style.display = 'none';
    document.getElementById('nameProductError').style.display = 'none';
    document.getElementById('priceError').style.display = 'none';
    document.getElementById('numberError').style.display = 'none';
    document.getElementById('imageError').style.display = 'none';
    document.getElementById('contentError').style.display = 'none';

    // Validate name category
    if (category.trim() == "") {
      document.getElementById('categoryError').style.display = 'block';
      valid = false;
    }

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

    // Validate image
    if (image.trim() === "") {
      document.getElementById('imageError').style.display = 'block';
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
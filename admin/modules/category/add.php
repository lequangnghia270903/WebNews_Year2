<?php $conn = mysqli_connect("localhost", "root", "", "doancoso2") ?>
<style type="text/css">
  .form-group {
    margin-top: 20px
  }
</style>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tendanhmuc = $_POST["name"];

  $sql = "INSERT INTO categorys (name) VALUES ('$tendanhmuc')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>alert('Thêm danh mục thành công!');</script>";
  } else {
    // Hiển thị dialog thông báo thất bại
    echo "<script>alert('Có lỗi xảy ra. Vui lòng thử lại!');</script>";
  }
}
?>
<?php require '../../layouts/header.php' ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Thêm mới danh mục</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="/DoAnCoSo2/admin/modules/category">Danh mục</a></li>
      <li class="breadcrumb-item active">Thêm mới</li>
    </ol>
    <form class="form-horizontal" action="add.php" method="POST" enctype="multipart/form-data" id="editForm" onsubmit=" return validateForm()">
      <div class="form-group" style="text-align: center">
        <label class="col-sm-1 control-label">Tên danh mục</label>
        <div class="col-sm-9" style="display: inline-block">
          <input type="text" id="inputCategory" class="form-control" placeholder="Tên danh mục" name="name">
        </div>
        <div id="categoryError" class="text-danger" style="display:none;">Vui lòng nhập tên danh mục</div>
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
    var category = document.getElementById('inputCategory').value;
    var valid = true;

    // Reset error messages
    document.getElementById('categoryError').style.display = 'none';

    // Validate category
    if (category.trim() === "") {
      document.getElementById('categoryError').style.display = 'block';
      valid = false;
    }

    return valid; // Prevent form submission if invalid
  }
</script>
<?php require '../../layouts/footer.php' ?>
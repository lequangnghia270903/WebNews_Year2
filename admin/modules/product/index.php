<?php require '../../layouts/header.php' ?>
<?php
$limit = 6;

$product_sql = "SELECT * FROM products";
$product_sql_result = mysqli_query($conn, $product_sql);

$trang = isset($_GET['trang']) ? $_GET['trang'] : 1;

$so_hang_hoa_sql = "SELECT count(id) as total FROM products";

$so_hang_hoa_sql_result = mysqli_query($conn, $so_hang_hoa_sql);
$row = mysqli_fetch_array($so_hang_hoa_sql_result);

$tongsosanpham = $row["total"];
$tongsotrang = ceil($tongsosanpham / $limit);

$start = ($trang - 1) * $limit;
$so_hang_hoa_tren_mot_trang_result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");
?>
<?php
if (isset($_GET['tim_kiem'])) {
  $tim_kiem = $_GET['tim_kiem'];
  $so_hang_hoa_tren_mot_trang_result = mysqli_query($conn, "SELECT * FROM products WHERE name like '%$tim_kiem%' LIMIT $start, $limit");
}
?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">
      Danh sách sản phẩm
      <a href="add.php" class="btn btn-primary">Thêm mới</a>
    </h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Sản phẩm</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Danh mục</th>
              <th>Tên sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Hình ảnh</th>
              <th>Nội dung</th>
              <th>Ngày tạo</th>
              <th>Ngày cập nhật</th>
              <th>Sửa</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_GET['iddanhmuc'])) {
              $id_category = $_GET['iddanhmuc'];

              $sql = "SELECT * FROM products WHERE id_category = $id_category";
              $result = mysqli_query($conn, $sql);

              $stt = 1;
              foreach ($result as $row) {
                $sql = "SELECT * From categorys WHERE id = $id_category";
                $result = mysqli_query($conn, $sql);
                $each = mysqli_fetch_array($result);
                $name_category = $each['name'];

                $id_product = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
                $number = $row['number'];
                $image = $row['image'];
                $content = $row['content'];
                $created_at = $row['created_at'];
                $updated_at = $row['updated_at'];
                echo "
                    <tr>
                      <td>$stt</td>
                      <td>$name_category</td>
                      <td>$name</td>
                      <td>$price</td>
                      <td>$number</td>
                      <td style='text-align: center'><img src='../../../public/frontend/images/$image' height='50px'></td>
                      <td>$content</td>
                      <td>$created_at</td>
                      <td>$updated_at</td>
                      <td><a href='edit.php?idsanpham=$id_product&tendanhmuc=$name_category'><i class='fa-regular fa-pen-to-square'></i></a></td>
                      <td><a href='delete.php?idsanpham=$id_product'><i class='fa-regular fa-trash-can' style='color: red'></i></a></td>
                    </tr>
                  ";
                $stt++;
              }
            } else {
              $stt = 1;
              foreach ($so_hang_hoa_tren_mot_trang_result as $row) {
                $id_category = $row['id_category'];

                $sql = "SELECT * From categorys WHERE id = $id_category";
                $so_hang_hoa_tren_mot_trang_result = mysqli_query($conn, $sql);
                $each = mysqli_fetch_array($so_hang_hoa_tren_mot_trang_result);
                $name_category = $each['name'];

                $id_product = $row['id'];
                $name = $row['name'];
                $price = $row['price'];
                $number = $row['number'];
                $image = $row['image'];
                $content = $row['content'];
                $created_at = $row['created_at'];
                $updated_at = $row['updated_at'];
                echo "
                    <tr>
                      <td>$stt</td>
                      <td>$name_category</td>
                      <td>$name</td>
                      <td>$price</td>
                      <td>$number</td>
                      <td style='text-align: center'><img src='../../../public/frontend/images/$image' height='50px'></td>
                      <td style='text-align: justify'>$content</td>
                      <td>$created_at</td>
                      <td>$updated_at</td>
                      <td><a href='edit.php?idsanpham=$id_product&tendanhmuc=$name_category'><i class='fa-regular fa-pen-to-square'></i></a></td>
                      <td><a href='delete.php?idsanpham=$id_product' onclick=\"return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');\"><i class='fa-regular fa-trash-can' style='color: red'></i></a></td>
                    </tr>
                  ";
                $stt++;
              }
            }
            ?>
          </tbody>
        </table>
        <nav aria-label="Page navigation example" style="float: right">
          <ul class="pagination">
            <?php
            $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
            for ($i = 1; $i <= $tongsotrang; $i++) {
              if ($trang == $i)
                echo "<li class='page-item'><a class='page-link' href='index.php?trang=${i}'>${i}</a></li>";
              else
                echo "<li class='page-item'><a class='page-link' href='index.php?trang=${i}'>${i}</a></li>";
            }
            ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</main>
<?php require '../../layouts/footer.php' ?>
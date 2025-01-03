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
  <script src="/DoAnCoSo2/public/frontend/js/jquery.min.js"></script>
</head>

<body>
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'doancoso2');
  $category_sql = "SELECT * FROM categorys";
  $category_sql_result = mysqli_query($conn, $category_sql);
  ?>
  <div id="wrapper">
    <div id="header">
      <div id="header-top">
        <div class="container">
          <div class="row clearfix">
            <div class="col-md-6" style="float: right">
              <nav id="header-nav-top">
                <ul class="list-inline pull-right" id="headermenu">
                  <?php if (isset($_SESSION['name'])) { ?>
                    <li>
                      <a href="" style="font-size: 13px"><img src="/DoAnCoSo2/public/frontend/images/avatar.png" class="img-circle" alt="" width="22px"> <?php echo $_SESSION['name'] ?> <i class="fa fa-caret-down"></i></a>
                      <ul id="header-submenu">
                        <li><a href="/DoAnCoSo2/user/modules/account/my_profile.php">Tài khoản của tôi</a></li>
                        <li><a href="/DoAnCoSo2/user/modules/order/purchase_order.php">Đơn mua</a></li>
                        <li><a href="/DoAnCoSo2/user/modules/account/logout.php">Đăng xuất</a></li>
                      </ul>
                    </li>
                  <?php } else { ?>
                    <li>
                      <a href="/DoAnCoSo2/user/modules/account/register.php" style="font-size: 13px; border-right: 1px solid white"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
                    </li>
                    <li>
                      <a href="/DoAnCoSo2/user/modules/account/login.php" style="font-size: 13px"><i class="fa fa-unlock"></i> Đăng nhập</a>
                    </li>
                  <?php } ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row" id="header-main">
          <div class="col-md-2" id="header-left">
            <a href="/DoAnCoSo2/"><i class="fa fa-shopping-basket"></i><span style="color: white; font-size: 30px">SHOP</span></a>
          </div>
          <div class="col-md-8">
            <?php
            // Lấy URL hiện tại
            $current_page = basename($_SERVER['REQUEST_URI'], ".php");
            ?>

            <!-- Chỉ hiển thị thanh tìm kiếm nếu không phải là trang giỏ hàng -->
            <?php if ($current_page !== 'cart' && $current_page !== 'order' && $current_page !== 'purchase_order') { ?>
              <form class="form-inline">
                <div class="form-group">
                  <?php if (isset($_GET['iddanhmuc']) && isset($_GET['name'])) { ?>
                    <input type="hidden" name="iddanhmuc" value="<?php echo $_GET['iddanhmuc'] ?>" class="form-control" style="width: 90%">
                    <input type="hidden" name="name" value="<?php echo $_GET['name'] ?>" class="form-control" style="width: 90%">
                  <?php } ?>

                  <?php if (isset($_GET['iddanhmuc']) && isset($_GET['idsanpham'])) { ?>
                    <input type="hidden" name="iddanhmuc" value="<?php echo $_GET['iddanhmuc'] ?>" class="form-control" style="width: 90%">
                    <input type="hidden" name="idsanpham" value="<?php echo $_GET['idsanpham'] ?>" class="form-control" style="width: 90%">
                  <?php } ?>

                  <input type="search" name="tim_kiem" placeholder="Tìm kiếm" class="form-control" style="width: 90%">
                  <button type="submit" class="btn btn-default">
                    <i class="fa fa-search" style="color: white"></i>
                  </button>
                </div>
              </form>
            <?php } ?>
          </div>

          <!-- Chỉ hiển thị giỏ hàng nếu không phải là trang giỏ hàng -->
          <?php if ($current_page !== 'cart') { ?>
            <?php if (isset($_SESSION['name'])) { ?>
              <div class="col-md-2" id="header-right">
                <a href="/DoAnCoSo2/user/modules/cart/cart.php" style="font-size: 15px; color: white"><i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ hàng</a>
              </div>
            <?php } else { ?>
              <div class="col-md-2" id="header-right">
                <a href="/DoAnCoSo2/user/modules/account/login.php" style="font-size: 15px; color: white"><i class="fa fa-cart-plus" aria-hidden="true"></i> Giỏ hàng</a>
              </div>
            <?php } ?>
          <?php } ?>
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
          <div class="box-left box-menu" style="background-color: #fff">
            <h3 class="box-title"><i class="fa fa-list"></i> Danh mục</h3>
            <ul>
              <?php foreach ($category_sql_result as $row) { ?>
                <?php if (isset($_GET['tim_kiem'])) { ?>
                  <li>
                    <a href="/DoAnCoSo2/category.php?iddanhmuc=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>&tim_kiem=<?php echo $_GET['tim_kiem'] ?> "><?php echo $row['name'] ?></a>
                  </li>
                <?php } else { ?>
                  <li>
                    <a href="/DoAnCoSo2/category.php?iddanhmuc=<?php echo $row['id'] ?>&name=<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a>
                  </li>
                <?php } ?>
              <?php } ?>
            </ul>
          </div>

          <div class="box-left box-menu" style="background-color: #fff">
            <h3 class="box-title"><i class="fa fa-bullhorn" aria-hidden="true"></i> Sản phẩm mới</h3>
            <ul>
              <?php
              $sql = "SELECT * FROM products ORDER BY(created_at) DESC LIMIT 4";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $id_category = $row['id_category'];
                $image = $row['image'];
                $name = $row['name'];
                $price = number_format($row['price']);
                echo "
                    <li class='clearfix'>
                      <a href='/DoAnCoSo2/product_details.php?iddanhmuc=$id_category&idsanpham=$id'>
                        <img src='/DoAnCoSo2/public/frontend/images/${image}' class='img-responsive pull-left' width='80' height='80px'>
                        <div class='info pull-right'>
                          <p class='name'>${name}</p>
                          <b class='price'>${price}đ</b><br>
                        </div>
                      </a>
                    </li>
                  ";
              }
              ?>
            </ul>
          </div>

          <div class="box-left box-menu" style="background-color: #fff">
            <h3 class="box-title"><i class="fa fa-fax" aria-hidden="true"></i> Sản phẩm bán chạy</h3>
            <ul>
              <?php
              $best_sale_sql = "SELECT count(quantity) as quantity, product_id, id, id_category, image, name, products.price 
                                  FROM order_product JOIN products ON order_product.product_id = products.id 
                                  GROUP BY(product_id) ORDER BY(quantity) DESC LIMIT 4";
              $best_sale_sql_result = mysqli_query($conn, $best_sale_sql);
              while ($row = mysqli_fetch_array($best_sale_sql_result)) {
                $id = $row['id'];
                $id_category = $row['id_category'];
                $image = $row['image'];
                $name = $row['name'];
                $price = number_format($row['price']);
                echo "
                    <li class='clearfix'>
                      <a href='/DoAnCoSo2/product_details.php?iddanhmuc=$id_category&idsanpham=$id'>
                        <img src='/DoAnCoSo2/public/frontend/images/$image' class='img-responsive pull-left' width='80' height='80px'>
                        <div class='info pull-right'>
                          <p class='name'>$name</p>
                          <b class='price'>$price đ</b><br>
                        </div>
                      </a>
                    </li>
                  ";
              }
              ?>
          </div>
        </div>
<?php
  session_start();
  $idsanpham = $_GET['idsanpham'];

  unset($_SESSION['cart'][$idsanpham]);

  header('location: cart.php');

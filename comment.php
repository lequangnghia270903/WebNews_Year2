<?php
  $user_id = $_SESSION["id"];
  $product_id = $_POST['product_id'];
  $user_id = $_POST['user_id'];
  $content = $_POST['content'];

  $conn = mysqli_connect("localhost", "root", "", "doancoso2");
  $sql = "INSERT INTO comments (product_id, user_id, content) VALUES ($product_id, $user_id, '$content')";
  $result = mysqli_query($conn, $sql);
?>
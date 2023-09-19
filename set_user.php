<?php
include 'connect.php';

    $order_id = $_GET['id'];
    setcookie(
      "user_id",
      "$order_id",
      time() + (10 * 365 * 24 * 60 * 60)
    );
    echo "<script>
    alert('User Changed.');
    window.location='index.php';
    </script>";
?>
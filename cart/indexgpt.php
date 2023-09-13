<?php
session_start();
include '../connect.php';

// Retrieve products from the database
$sql = "SELECT * FROM produk";
$result = $mysqli->query($sql);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Add item to cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product = mysqli_query($mysqli, "SELECT * FROM produk WHERE id = $product_id");
    // $product = $mysqli->fetch_assoc($product);
    $product = mysqli_fetch_assoc($product);

    // Add item to the cart array
    $_SESSION['cart'][] = $product;
}

// Display products
echo "<h2>Products</h2>";
foreach ($products as $product) {
    echo "<p>{$product['nama_produk']} - \${$product['harga']} <form method='POST' action='index.php'><input type='hidden' name='product_id' value='{$product['id']}'><input type='submit' name='add_to_cart' value='Add to Cart'></form></p>";
}

// Display cart items
echo "<h2>Cart</h2>";
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        echo "<p>{$item['nama_produk']} - \${$item['harga']}</p>";
    }
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

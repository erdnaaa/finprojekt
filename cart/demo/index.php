<?php
    session_start();
    include '../../connect.php';
    $status="";
    if (isset($_POST['id']) && $_POST['id']!=""){
		$id = $_POST['id'];
		$sql = "SELECT * FROM `produk` WHERE `id`='$id'";
		$result = $mysqli -> query($sql);
		$row = mysqli_fetch_assoc($result);
		$name = $row['nama_produk'];
		$id = $row['id'];
		$price = $row['harga'];
		$image = $row['gambar_produk'];
		
		$cartArray = array(
			$id=>array(
			'name'=>$name,
			'id'=>$id,
			'price'=>$price,
			'quantity'=>1,
			'image'=>$image)
		);
    
		if(empty($_SESSION["shopping_cart"])) {
			$_SESSION["shopping_cart"] = $cartArray;
			$status = "<div class='box'>Product is added to your cart!</div>";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($id,$array_keys)) {
				$status = "<div class='box' style='color:red;'>
				Product is already added to your cart!</div>";	
			} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			$status = "<div class='box'>Product is added to your cart!</div>";
			}
		
			}
    }
    ?>
<html>
    <head>
        <title>Demo Simple Shopping Cart using PHP and MySQL - AllPHPTricks.com</title>
        <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    </head>
    <body>
        <div style="width:700px; margin:50 auto;">
            <h2>Demo Simple Shopping Cart using PHP and MySQL</h2>
            <?php
                if(!empty($_SESSION["shopping_cart"])) {
                $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                ?>
            <div class="cart_div">
                <a href="cart.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
            </div>
            <?php
                }
                $sql = "SELECT * FROM `produk`";
                $result = $mysqli -> query($sql);
                while($row = mysqli_fetch_assoc($result)){
                		echo "<div class='product_wrapper'>
                			  <form method='post' action=''>
                			  <input type='hidden' name='id' value=".$row['id']." />
                			  <div class='name'>".$row['nama_produk']."</div>
                		   	  <div class='price'>$".$row['harga']."</div>
                			  <button type='submit' class='buy'>Buy Now</button>
                			  </form>
                		   	  </div>";
                        }
                ?>
            <div style="clear:both;"></div>
            <div class="message_box" style="margin:10px 0px;">
                <?php echo $status; ?>
            </div>
        </div>
    </body>
</html>
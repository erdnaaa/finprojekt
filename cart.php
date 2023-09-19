<?php
    session_start();
    $status="";
    if (!isset($_COOKIE["user_id"])) {
        header("Location: welcome.php");
    }
    if (isset($_POST['action']) && $_POST['action']=="remove"){
		if(!empty($_SESSION["shopping_cart"])) {
			foreach($_SESSION["shopping_cart"] as $key => $value) {
				if($_POST["id"] == $key){
					unset($_SESSION["shopping_cart"][$key]);
					$status = "Product is removed from your cart!";
				}
				if(empty($_SESSION["shopping_cart"]))
				unset($_SESSION["shopping_cart"]);
			}		
		}
    }
    
    if (isset($_POST['action']) && $_POST['action']=="change"){
      foreach($_SESSION["shopping_cart"] as &$value){
        if($value['id'] === $_POST["id"]){
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
      	
    }
    ?>
<html lang="en" data-bs-theme="auto">
    <head>
        <script src="./assets/js/color-modes.js"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Restaurant</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <meta name="theme-color" content="#712cf9">
        <style>
            .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            }
            @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
            }
            .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }
            .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
            }
            .bi {
            vertical-align: -.125em;
            fill: currentColor;
            }
            .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
            }
            .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
            }
            .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
            }
            .bd-mode-toggle {
            z-index: 1500;
            }
            img{
            width: 100px;
            object-fit: fill;
            }
        </style>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            <symbol id="order" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"></path>
            </symbol>
        </svg>
        <header data-bs-theme="dark">
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <strong>Restaurant</strong>
                    </a>
                    <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                        <li>
                            <a href="cart.php" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#cart"></use>
                                </svg>
                                Cart
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                                <svg class="bi d-block mx-auto mb-1" width="24" height="24">
                                    <use xlink:href="#order"></use>
                                </svg>
                                Order History
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div style="width:700px; margin:50 auto;">
                        <?php
                            if(!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                        <?php
                            }
                            ?>
                        <div class="cart">
                            <?php
                                if(isset($_SESSION["shopping_cart"])){
                                    $total_price = 0;
                                ?>	
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>ITEM name</td>
                                        <td>QUANTITY</td>
                                        <td>UNIT PRICE</td>
                                        <td>ITEMS TOTAL</td>
                                    </tr>
                                    <?php		
                                        foreach ($_SESSION["shopping_cart"] as $product){
                                        ?>
                                    <tr>
                                        <td><img src='./gambar/<?php echo $product["image"]; ?>'/></td>
                                        <td>
                                            <p class="card-text"><?php echo $product["name"]; ?><br/></p>
                                            <form method='post' action=''>
                                                <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                                <input type='hidden' name='action' value="remove" />
                                                <button type="submit" class="btn btn-primary btn-sm">Remove Item</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method='post' action=''>
                                                <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
                                                <input type='hidden' name='action' value="change" />
                                                <select name='quantity' class='quantity' onchange="this.form.submit()">
                                                    <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
                                                    <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
                                                    <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
                                                    <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
                                                    <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td><?php echo "Rp".$product["price"]; ?></td>
                                        <td><?php echo "Rp".$product["price"]*$product["quantity"]; ?></td>
                                    </tr>
                                    <?php
                                        $total_price += ($product["price"]*$product["quantity"]);
                                        }
                                        ?>
                                    <tr>
                                        <td colspan="5" align="right">
                                            <strong>TOTAL: <?php echo "Rp".$total_price; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="POST" action="checkout.php">
                                <!-- <input type='hidden' name='id' value="<?php echo $product["id"]; ?>" /> -->
								<input type='hidden' name='total_price' value="<?php echo $total_price; ?>" />
								<input type='hidden' name='qty' value="<?php echo $product["quantity"]; ?>" />
                                <input type='hidden' name='product_name' value="<?php echo $product["name"]; ?>" />
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button type="submit" class="btn btn-primary" type="button">Checkout</button>
                                </div>
                            </form>
                            <?php
                                }else{
                                	echo "<h3>Your cart is empty!</h3>";
                                	}
                                ?>
                        </div>
                    </div>
                </div>
                <?php
                    if (!empty($status)) {
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    		<strong>$status</strong>
                    		<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    	</div>";
                    }
                    ?>
            </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
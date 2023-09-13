<?php
    session_start();
    include 'connect.php';
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
			$status = "Product is added to your cart!";
		}else{
			$array_keys = array_keys($_SESSION["shopping_cart"]);
			if(in_array($id,$array_keys)) {
				$status = "Product is already added to your cart";	
			} else {
			$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
			$status = "Product is added to your cart!";
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
            height: 255px;
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
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#cart"></use></svg>
                            Cart
                        </a>
                        </li>
                        <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#order"></use></svg>
                            Order History
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Restaurant</h1>
                        <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    </div>
                </div>
            </section>
            <div class="album py-5 bg-light">
                <div class="container">
                    <?php
                        if (!empty($status)) {
                        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong><?php echo $status; ?></strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        }
                    ?>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Menu
                                <!-- category goes here -->
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        <?php
                                            $query = "SELECT * FROM produk ORDER BY category";
                                            $result = $mysqli -> query($query);
                                            if ($result->num_rows > 0) {
                                            	while($row = $result->fetch_assoc()) {
                                            		?>
                                                    <div class="col">
                                                        <form method='post' action=''>
                                                            <div class="card shadow-sm">
                                                            <input type='hidden' name='id' value="<?php echo $row['id'];?>" />
                                                                <img src="./gambar/<?php echo $row["gambar_produk"] ?>"/>
                                                                </svg>
                                                                <div class="card-body">
                                                                    <strong><?php echo $row["nama_produk"];?></strong>
                                                                    <p class="card-text"><?php echo $row["deskripsi"];?></p>
                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div class="btn-group">
                                                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                                        </div>
                                                                        <small class="text-body-secondary">Rp. <?php echo $row["harga"];?></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1"><a href="admin.php">Admin Panel</a></p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
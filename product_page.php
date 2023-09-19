<?php
	session_start();
    include('connect.php');
    if (!isset($_SESSION["username"])) {
        header("Location: login_page.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="./assets/dashboard.css" rel="stylesheet">
        <!-- jadi biru -->
	<style>
		@media (min-width: 768px) {
		.bd-placeholder-img-lg {
		font-size: 3.5rem;
		}
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
	</style>
</head>

	<body>
  		<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
            <symbol id="door-closed" viewBox="0 0 16 16">
                <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
            </symbol>
            <symbol id="file-earmark" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
            </symbol>
            <symbol id="graph-up" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
            </symbol>
            <symbol id="house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
            </symbol>
            <symbol id="people" viewBox="0 0 16 16">
                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
            </symbol>
        </svg>
  		<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Restaurant</a>
        </header>
		<div class="container-fluid">
			<div class="row">
			<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
							<div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
								<div class="offcanvas-header">
									<h5 class="offcanvas-title" id="sidebarMenuLabel">Restaurant</h5>
									<button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
								</div>
								<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="admin.php">
												<svg class="bi">
													<use xlink:href="#house-fill"/>
												</svg>
												Dashboard
											</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2" href="#">
												<svg class="bi">
													<use xlink:href="#file-earmark"/>
												</svg>
												Orders
											</a>
										</li> -->
										<li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2" href="product_page.php">
												<svg class="bi">
													<use xlink:href="#cart"/>
												</svg>
												Products
											</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2" href="#">
												<svg class="bi">
													<use xlink:href="#people"/>
												</svg>
												Customers
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2" href="#">
												<svg class="bi">
													<use xlink:href="#graph-up"/>
												</svg>
												Reports
											</a>
										</li> -->
									</ul>
									<hr class="my-3">
									<ul class="nav flex-column mb-auto">
										<li class="nav-item">
											<a class="nav-link d-flex align-items-center gap-2" href="logout.php">
												<svg class="bi">
													<use xlink:href="#door-closed"/>
												</svg>
												Sign out
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
				<h2>
					Menu
				</h2>
				<a class="btn btn-primary" href="add_page.php" role="button">Add Product</a>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Deskripsi</th>
							<!-- <th>Kategori</th> -->
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
				<tbody>
					<?php
						$query = "SELECT * FROM produk ORDER BY id ASC";
						$result = $mysqli -> query($query);
						if(!$result){
							die ("Query Error: ".mysqli_errno($mysqli)." - ".mysqli_error($mysqli));
						}
							$no = 1;
						while($row = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td>
							<?php echo $no; ?>
						</td>
						<td>
							<?php echo $row['nama_produk']; ?>
						</td>
						<td>
							<?php echo substr($row['deskripsi'], 0, 20); ?>...
						</td>
						<!-- <td>
							<?php echo $row['category']; ?>
						</td> -->
						<td>Rp 
							<?php echo number_format($row['harga'],0,',','.'); ?>
						</td>
						<td>
							<a href="edit_page.php?id=<?php echo $row['id']; ?>">Edit</a> |
							<a href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
						</td>
					</tr>
					<?php
						$no++;
					}
					?>
				</tbody>
				</table>
					
				</div>
				</main>
			</div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
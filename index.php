<?php
include 'connect.php';
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
        </style>
    </head>
    <body>
        <header data-bs-theme="dark">
            <div class="navbar navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                        <strong>Restaurant</strong>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
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
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                category goes here
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
									<?php
										$query = "SELECT * FROM produk";
										$result = $mysqli -> query($query);
										if ($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
                                                // echo '<script type="text/javascript">alert("' . $row["nama_produk"] . '")</script>'
												//filter category
												// if ($row["category"] == 'food') {
												//     //debug
												//     echo '<script type="text/javascript">alert("' . $row["nama_produk"] . '")</script>';
												// }
												?>
											<div class="col">
                                            <div class="card shadow-sm">
                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                <?php '<script type="text/javascript">alert("' . $row["nama_produk"] . '")</script>';?>
                                                    <!-- <title>
                                                        /*<?php echo $row["nama_produk"];?>*/
                                                    </title> -->
                                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                                </svg>
                                                <div class="card-body">
													<strong><?php echo $row["nama_produk"];?></strong>
                                                    <p class="card-text"><?php echo $row["deskripsi"];?></p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                        </div>
                                                        <small class="text-body-secondary"> price disini, buy/cart di view/edit sebelah</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?php
										}
									}
									?>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <title>Placeholder</title>
                                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                                </svg>
                                                <div class="card-body">
													<strong>Title</strong>
                                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                                        </div>
                                                        <small class="text-body-secondary">9 mins</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                <p class="mb-1">text</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
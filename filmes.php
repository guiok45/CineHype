<?php
include 'db/db.php';

  $sql = "SELECT DISTINCT * FROM filmes";
  $result = mysqli_query($conn,$sql);
  $total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>CineHype</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="icomoon/icomoon.css">
	<link rel="stylesheet" type="text/css" href="css/vendor.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

	<div id="header-wrap">

		<div class="top-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="social-links">
							<ul>
								<li>
									<a href="#"><i class="icon icon-facebook"></i></a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="right-element">
							<a href="login/login.php" class="user-account for-buy"><i
									class="icon icon-user"></i><span></span></a>
							<div class="action-menu">
								<div class="search-bar">
									
									<a href="#" class="search-button search-toggle" data-selector="#header-wrap">
										<i class="icon icon-search"></i>
									</a>
									<form role="search" method="get" class="search-box">
										<input class="search-field text search-input" placeholder="Pesquisar"
											type="search">
									</form>
								</div>
							</div>

						</div><!--top-right-->
					</div>

				</div>
			</div>
		</div><!--top-content-->

		<header id="header">
			<div class="container-fluid">
				<div class="row">

					<div class="col-md-2">
						<div class="main-logo">
							<a href="index.php"><img src="images/main-logo2.png" alt="logo"></a>
						</div>

					</div>

					<div class="col-md-10">

						<nav id="navbar">
							<div class="main-menu stellarnav">
								<ul class="menu-list">
									<li class="menu-item "><a href="index.php">Home</a></li>
									<li class="menu-item has-sub">
										<a href="#pages" class="nav-link">Páginas</a>

										<ul>
											<li><a href="sobreNos.php">Sobre nós</a></li>
											<li><a href="contactos.html">Contactos</a></li>
											<li class="active"><a href="filmes.php">Filmes</a></li>
										</ul>

									</li>
									<li class="menu-item"><a href="novidades.php">Novidades</a></li>
								</ul>

								<div class="hamburger">
									<span class="bar"></span>
									<span class="bar"></span>
									<span class="bar"></span>
								</div>

							</div>
						</nav>

					</div>

				</div>
			</div>
		</header>

	</div><!--header-wrap-->

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Filmes de Qualidade</span>
						</div>
						<h2 class="section-title">Filmes</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">

					<?php
                      // se o número de resultados for maior que zero, mostra os dados
                      if($total > 0) {
                        // inicia o loop que vai mostrar todos os dados
                         while($filme = $result->fetch_assoc()){
                    ?>

							<div class="col-md-3">
								<div class="product-item">

									<a href="filme.php?id=<?= $filme['id']; ?>">
									<figure class="product-style">
										<img src="admin/assets/imgFilme/<?=$filme['foto']?>" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Reservar</button>
									</figure>
									<figcaption>
										<h3><?=$filme['nome']?></h3>
									</figcaption>
									</a>
								</div>
							</div>
					<?php
							
                        };
                      }
                    ?>
						</div><!--ft-books-slider-->
					</div><!--grid-->

				</div><!--inner-content-->
			</div>

			<div class="row">
				<div class="col-md-12">

					<div class="btn-wrap align-right">
						<a href="#" class="btn-accent-arrow">Ver todos <i
								class="icon icon-ns-arrow-right"></i></a>
					</div>

				</div>
			</div>
		</div>
	</section>
	
	<div id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="copyright">
						<div class="row">

							<div class="col-md-6">
								<p>© 2022 All rights reserved. Free HTML Template by <a
										href="https://www.templatesjungle.com/" target="_blank">TemplatesJungle</a></p>
							</div>

							<div class="col-md-6">
								<div class="social-links align-right">
									<ul>
										<li>
											<a href="#"><i class="icon icon-facebook"></i></a>
										</li>
									</ul>
								</div>
							</div>

						</div>
					</div><!--grid-->

				</div><!--footer-bottom-content-->
			</div>
		</div>
	</div>

	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>

</body>

</html>
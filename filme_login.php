<?php
include 'db/db.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login/login.php");
    exit();
}else{
  $id = intval($_GET['id']);
  $sql = "SELECT * FROM filmes WHERE id = $id";
  $result = mysqli_query($conn,$sql);
  $filme = mysqli_fetch_assoc($result);
}
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
							<a href="login/logout.php" class="user-account for-buy"><i
									class="icon icon-user"></i><span>Olá <?=$_SESSION['nome']?></span></a>
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
							<a href="index_login.php"><img src="images/main-logo2.png" alt="logo"></a>
						</div>

					</div>

					<div class="col-md-10">

						<nav id="navbar">
							<div class="main-menu stellarnav">
								<ul class="menu-list">
									<li class="menu-item "><a href="index_login.php">Home</a></li>
									<li class="menu-item has-sub">
										<a href="#pages" class="nav-link">Páginas</a>

										<ul>
											<li><a href="index_login.php">Sobre nós</a></li>
											<li><a href="index.html">Contactos</a></li>
											<li><a href="index.html">Filmes</a></li>
										</ul>

									</li>
									<li class="menu-item"><a href="novidades_login.php">Novidades</a></li>
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

		<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">

					<div class="row">

						<div class="col-md-6">
							<figure>
								<img src="admin/assets/imgFilme/<?=$filme['foto']?>" alt="book">
							</figure>
						</div>

						<div class="col-md-6">
							<div class="product-entry">
								<h2 class="section-title divider"><?php echo $filme['nome']; ?></h2>

								<div class="products-content">
									<p><?php echo $filme['descricao']; ?></p>
									<div class="btn-wrap">
										<form action="adicionarReserva.php?id=<?= $filme['id']; ?>"  method="POST">
											<input hidden type="text" name="id_filme" value="<?=$filme['id']?>" class="btn-accent-arrow" />
											<input hidden type="text" name="id_utilizador" value="<?= $_SESSION['idUtilizador'] ?>" class="btn-accent-arrow" />
											<input type="date" href="#" class="date" name="dataReserva" class="btn-accent-arrow"/>
											<input type="submit" class="btn-accent-arrow" value="reservar"/><i
													class="icon icon-ns-arrow-right"></i></input>
										</form>
									</div>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

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
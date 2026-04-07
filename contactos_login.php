<?php
include 'db/db.php';
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login/login.php");
    exit();
}else{
  $sql1 = "SELECT DISTINCT * FROM filmes LIMIT 3";
  $result1 = mysqli_query($conn,$sql1);
  $total = mysqli_num_rows($result1);

  $sql2 = "SELECT DISTINCT * FROM filmes ORDER BY id DESC LIMIT 4";
  $result2 = mysqli_query($conn,$sql2);

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
							<a href="login/login.php" class="user-account for-buy"><i
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
											<li><a href="sobreNos_login.php">Sobre nós</a></li>
											<li class="active"><a href="contactos_login.php">Contactos</a></li>
											<li ><a href="filmes_login.php">Filmes</a></li>
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
	<footer id="footer">
		<div class="container">
			<div class="row">

				<div class="col-md-4">

					<div class="footer-item">
						<div class="company-brand">
							<img src="images/main-logo2.png" alt="logo" class="footer-logo">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8044.6158493278335!2d-7.513037211849039!3d39.81412134172638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3d5ea6bb2280e1%3A0x1c460157bc4b46c8!2sEscola%20Superior%20de%20Tecnologia%20-%20Instituto%20Polit%C3%A9cnico%20de%20Castelo%20Branco!5e1!3m2!1spt-PT!2spt!4v1768495313456!5m2!1spt-PT!2spt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>						</div>
					</div>

				</div>

				<div class="col-md-2">

				</div>
				<div class="col-md-2">

					<div class="footer-menu">
						<h5>Contactos </h5>
						<ul class="menu-list">
							<li class="menu-item">
								<p>Telefone: +351 123456789
									Email:Cinehype@mail.com
								</p>
							</li>
						</ul>
					</div>

				</div>
			</div>
			<!-- / row -->

		</div>
	</footer>
	
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
<?php include "bdd.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="Pour nous contacter">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="icon" href="img/favicon.png" />
	<script src="https://code.jquery.com/jquery-3.3.1.js"
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
	crossorigin="anonymous"></script>
	<title>Page d'administration</title>
</head>
<body>
	<header class='container'>
		<div class='logo'>
			<a href="dashboard.php"><img src="img/logo.jpg" class="logo" alt="logo"></a>
		</div>
		<button class="hamburger">&#9776;</button>
		<div class="menu">
			<nav>
				<ul>
					<li> <a href="dashboard.php"><i class="fas fa-home"></i></a></li>
					<li> <a href="soins.php" >Soins</a></li>
					<li><a href="categories.php">Catégories</a></li>
					<li><a href="livreor.php">Livre d'or</a></li>
					<li><a href="commandes.php">Commandes</a></li>
				</ul>
			</nav>
		</div> 
				<picture>
					<source media="(max-width: 500px)" srcset="img/banner-mobile.jpg">
						<source media="(max-width: 1023px)" srcset="img/banner-tablette.jpg">
							<img src='img/banner-desktop.jpg' alt='Bannière' class='banniere' >
						</picture>
					</header>
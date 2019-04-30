<?php include "bdd.php";

$query= $bdd -> prepare("SELECT Nom, ID FROM Categories WHERE Statut=1"); // fonction prepare , permet de sécuriser les données contre injection SQL
$query ->execute();
$nav_soins = $query ->fetchAll(); ?>




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
	<title>Me contacter</title>
</head>
<body>
	<header class='container'>
		<div class='logo'>
			<a href="index.php"><img src="img/logo.jpg" class="logo" alt="logo"></a>
		</div>
		<button class="hamburger">&#9776;</button>
		<div class="menu">
			<nav>
				<ul>
					<li> <a href="index.php"><i class="fas fa-home"></i></a></li>
					<li> <a href="apropos.php" >Qui suis-je ?</a></li>
					<li class='soins'>Soins <i class="fas fa-angle-down"></i>
					<div class='sousmenu'>
							<?php foreach($nav_soins as $cat) :?>
								<ul>
								<li><a href="soins.php?id=<?=$cat['ID']?>"><?= $cat['Nom'] ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<li class='test'>Tarifs <i class="fas fa-angle-down"></i>
						<div class="sousmenu1">
							<ul>
								<li><a href='boutique.php'>Boutique</a></li>
								<li><a href='tarifs.php' >Tarifs des soins et modelages</a></li>
							</ul>
						</div>
						<li class="test1">Livre d'or <i class="fas fa-angle-down"></i>
							<div class="sousmenu2">
								<ul>
									<li><a href='avis-clients.php'  >Avis Client</a></li>
									<li><a href='ecrire-avis.php'>Signer le livre d'or</a></li>
								</ul>
							</div>
							<li><a href="contact.php">Contact</a></li>
							<li><a href="login.php"><?php if(!isset($_SESSION['connected'])) :?> Se connecter</a></li>
							<?php else:?> Mon compte </a></li>
										<?php endif; ?>
							<li><a href="panier.php"><i class="fas fa-shopping-basket"></i></a></li>
						</ul>
					</nav>
				</div> 
				<picture>
					<source media="(max-width: 500px)" srcset="img/banner-mobile.jpg">
						<source media="(max-width: 1023px)" srcset="img/banner-tablette.jpg">
							<img src='img/banner-desktop.jpg' alt='Bannière' class='banniere' >
						</picture>
					</header>
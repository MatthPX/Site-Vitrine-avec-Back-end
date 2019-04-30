<?php 
session_start(); 
$login = htmlspecialchars($_POST['login']); // htmlspecialchars à mettre sur tous les inputs pour contrer la faille de sécurité XSS
$mdp = htmlspecialchars($_POST['mdp']);

if(isset($_POST['mdp']) AND ( $mdp == 'admin') AND ($login == 'admin')){

	$_SESSION['admin']= true;
	$_SESSION['Log'] = $_POST['login'];
}

header('Location:dashboard.php');


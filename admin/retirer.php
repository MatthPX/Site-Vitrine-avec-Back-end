<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$query= $bdd -> prepare("UPDATE Livre_or SET Statut=0  WHERE ID=? "); 
$query ->execute(array($id));






header('Location:livreor.php');
}
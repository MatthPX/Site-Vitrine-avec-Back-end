<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$query= $bdd -> prepare("DELETE FROM Livre_or WHERE ID=? "); 
$query ->execute(array($id));
$result = $query ->fetch(); 





header('Location:dashboard.php');
}
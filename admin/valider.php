<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$query= $bdd -> prepare("UPDATE Livre_or SET Statut=1  WHERE ID=? "); 
$query ->execute(array($id));
$result = $query ->fetch(); 





header('Location:livreor.php');
}
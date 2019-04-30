<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$query= $bdd -> prepare("SELECT ID, Nom, Description,Photo,Prix,id_cat,Durée,Publié,Promu,Nouveau FROM Soins WHERE ID=? "); 
$query ->execute(array($id));
$result = $query ->fetch(); 





include 'templates/modifier.phtml';
}

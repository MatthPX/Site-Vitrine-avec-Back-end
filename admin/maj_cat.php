<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$publish = $_POST['publish'];
$titre = $_POST['produit'];

// REQUETE SQL

$query= $bdd -> prepare("UPDATE Categories SET Nom = ?, Statut = ? WHERE id=?"); 
$query -> execute(array($titre, $publish, $id));


header('Location: categories.php');
}
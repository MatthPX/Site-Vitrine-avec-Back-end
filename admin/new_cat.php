<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
// insérer valeur formulaire dans variable
$titre = $_POST['produit'];
$publish = $_POST['publish'];

// REQUETE SQL

$query= $bdd -> prepare("INSERT INTO Categories(Nom,Statut) VALUES (?,?)"); 
$query -> execute(array($titre,  $publish));


header('Location:categories.php');
}
<?php session_start();
if(!isset($_SESSION['admin'])){
		header('Location: index.html'); }
			else{
include "bdd.php";


$query= $bdd -> prepare("SELECT ID, Date, Titre, Commentaire, Note, Nom FROM Livre_or WHERE Statut = 0"); 
$query ->execute();
$moderation_avis = $query ->fetchAll(); 

function etoiles($nb_etoiles){
	for($i=1; $i <= $nb_etoiles; $i ++){
	 echo "<i class='fas fa-star'></i>";
	}
}

include 'templates/dashboard.phtml'; }
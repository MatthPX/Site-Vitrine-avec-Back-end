<?php session_start();
include 'bdd.php';
if(!isset($_SESSION['admin'])){
		header('Location: admin.html'); }
			else{
$query= $bdd -> prepare("SELECT ID, Date, Titre, Commentaire, Note, Nom,Email, Statut  FROM Livre_or "); 
$query ->execute();
$all_avis = $query ->fetchAll(); 

function etoiles($nb_etoiles){
	for($i=1; $i <= $nb_etoiles; $i ++){
	 echo "<i class='fas fa-star'></i>";
	}
}

function statut($nb_statut){
	if($nb_statut == 1){
		echo "Online";
	}
	else{
		echo "Masqué";
	}
}
include 'templates/livreor.phtml';}
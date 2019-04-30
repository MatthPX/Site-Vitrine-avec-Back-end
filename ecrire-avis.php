<?php session_start();
include 'bdd.php';

if(isset($_POST['email'])){

	$add_titre= $_POST['titre'];
	$add_nom= $_POST['nom'];
	$add_mail= $_POST['email'];
	$add_note= $_POST['option1'];
	$add_avis= $_POST['avis'];
	$date = date("Y-m-d");
	$statut = 0 ;

	$query= $bdd -> prepare("INSERT INTO Livre_or(Titre, Note, Date, Commentaire, Nom, Email, Statut) VALUES (?,?,?,?,?,?,?)"); 
	$query -> execute(array($add_titre,$add_note,$date,$add_avis,$add_nom,$add_mail,$statut));
	 var_dump($query->errorInfo());
	//header('Location:ecrire-avis.php');
}




include 'templates/ecrire-avis.phtml';
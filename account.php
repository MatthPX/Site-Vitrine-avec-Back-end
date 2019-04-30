<?php include "bdd.php";

session_start();

$nom = $_POST['nom'];
$prenom= $_POST['prenom'];
$adresse= $_POST['adresse'];
$cp= $_POST['cp'];
$ville= $_POST['ville'];
$phone= $_POST['phone'];
$mail= $_POST['mail'];
$pw_test = $_POST['pw'];
$pw_repeat_test= $_POST['pw_repeat'];

if($pw_test == $pw_repeat_test){
	$pw = password_hash($pw_test, PASSWORD_DEFAULT);
}
else{
	header('Location:login.php');
}
// REQUETE SQL

$query= $bdd -> prepare("INSERT INTO user (Nom,Prenom,Adresse,CP,Ville,Tel,Mail,Password) VALUES (?,?,?,?,?,?,?,?)"); 
$query -> execute(array($nom,$prenom,$adresse,$cp,$ville,$phone,$mail,$pw));


header('Location:login.php');

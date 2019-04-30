<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
// insérer valeur formulaire dans variable
$titre = $_POST['produit'];
$description = $_POST['desc'];
$image = $_FILES['img']['name'];
$prix = $_POST['prix'];
$duree = $_POST['duree'];
$categorie = $_POST['categorie'];
$nom = "../img/soins/".$_FILES['img']['name'];
$resultat = move_uploaded_file($_FILES['img']['tmp_name'],$nom);
$publish = $_POST['publish'];
$promu = $_POST['promu'];
// REQUETE SQL

$query= $bdd -> prepare("INSERT INTO Soins(Nom, Description, Photo, Prix, id_cat, Durée, Publié,Promu,Nouveau) VALUES (?,?,?,?,?,?,?,?,1)"); 
$query -> execute(array($titre, $description, $image, $prix, $categorie, $duree, $publish,$promu));
echo var_dump($query ->errorInfo());

header('Location:soins.php');
}
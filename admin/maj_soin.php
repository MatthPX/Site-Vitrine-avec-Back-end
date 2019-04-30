<?php include "bdd.php";
session_start(); 
if(!isset($_SESSION['admin'])){ // CONDITION POUR EVITER LES HACKERS ( verif session connecté)

	header('Location: admin.html'); }
	else{
$id = $_GET['id'];
$photo =  $_GET['img'];
$titre = $_POST['produit'];
$description = $_POST['desc'];

$prix = $_POST['prix'];
$duree = $_POST['duree'];
$categorie = $_POST['categorie'];

if($_FILES['img']['name']==''){
$image = $photo;
}
else{	
$image = $_FILES['img']['name'];	
$nom = "../img/soins/".$_FILES['img']['name'];
$resultat = move_uploaded_file($_FILES['img']['tmp_name'],$nom);
}


$publish = $_POST['publish'];
$promu = $_POST['promu'];
// REQUETE SQL

$query= $bdd -> prepare("UPDATE Soins SET Nom = ?, Description = ?, Photo = ?, Prix = ?, id_cat = ?, Durée = ?, Publié = ?,Promu = ?,Nouveau = 1 WHERE id=?"); 
$query -> execute(array($titre, $description, $image, $prix, $categorie, $duree, $publish,$promu,$id));
echo var_dump($query ->errorInfo());

header('Location: soins.php');
}
<?php 
include "bdd.php";
session_start();
$panier= json_decode($_POST['panier'],true);
$idClient = $_SESSION['Id'];
	$TotalCommande = 0;
$date=date("Y-m-d H:i:s");

//Ajout de la commande total sur table Commande avec ID client 
foreach ($panier as  $commande ){
	$TotalCommande = $TotalCommande+ ($commande['price'] * $commande['qte']);
	echo var_dump($commande);

}

$query= $bdd -> prepare("INSERT INTO Commande(ID_client,prix_total,Date) VALUES (?,?,?) "); 
$query ->execute(array($idClient,$TotalCommande,$date));

// ON doit chercher l'id commande , et non insere dans le table line_commande une ligne pour chaque ID_soins 


$id_commande = $bdd -> lastInsertId();



foreach($panier as $commande){
$id_soins = $commande ['id'];
$qtt = $commande['qte'];
$prix_unitaire = $commande['price'];


$query_details =  $bdd -> prepare("INSERT INTO ligne_commande(ID_commande,ID_soins,Quantité,Prix_Unitaire) VALUES (?,?,?,?) "); 
$query_details ->execute(array($id_commande,$id_soins,$qtt,$prix_unitaire));
}
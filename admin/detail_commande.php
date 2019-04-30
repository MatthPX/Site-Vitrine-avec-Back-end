<?php session_start();
if(!isset($_SESSION['admin'])){
		header('Location: admin.html'); }
			else{
include "bdd.php";
}
$id = $_POST['id'];
$query= $bdd -> prepare("SELECT l.Quantité AS Qtt, l.Prix_Unitaire, s.Nom FROM ligne_commande AS l LEFT JOIN Soins AS s ON l.ID_soins = s.ID  WHERE l.ID_commande=?"); // fonction prepare , permet de sécuriser les données contre injection SQL
$query ->execute(array($id));
$result = $query ->fetchAll(); 

echo json_encode($result); // 
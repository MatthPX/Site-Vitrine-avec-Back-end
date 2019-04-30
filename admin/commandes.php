<?php session_start();
if(!isset($_SESSION['admin'])){
		header('Location: admin.html'); }
			else{
include "bdd.php";


$query= $bdd -> prepare("SELECT c.ID AS Id_commande, c.Date, c.prix_total, c.ID_client, u.Nom, u.Prenom, u.Adresse, u.CP,u.Ville, u.ID, u.Mail FROM Commande AS c LEFT JOIN user AS u ON c.ID_client = u.ID "); 
$query ->execute();
$all_command = $query ->fetchAll(); 


include 'templates/commandes.phtml'; }
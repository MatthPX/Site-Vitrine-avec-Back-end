<?php session_start();
if(!isset($_SESSION['admin'])){
		header('Location: admin.html'); }
			else{
include "bdd.php";

$query= $bdd -> prepare("SELECT ID, Nom, Statut FROM Categories ORDER BY ID "); 
$query ->execute();
$categories_promues = $query ->fetchAll(); 



include 'templates/categories.phtml'; }
<?php session_start();
include 'bdd.php';

$query= $bdd -> prepare("SELECT ID, Nom, Description, Prix FROM Soins ORDER BY ID "); 
$query ->execute();
$soins_promus = $query ->fetchAll(); 



include 'templates/soins.phtml';
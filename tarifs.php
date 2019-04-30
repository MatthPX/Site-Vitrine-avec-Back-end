<?php 
include "bdd.php";
session_start();
$query= $bdd -> prepare("SELECT Nom, Prix, Durée  FROM Soins "); 

$query ->execute(array());

$tarifs_soins = $query ->fetchAll(); 

include 'templates/tarifs.phtml';
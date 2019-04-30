<?php 
include "bdd.php";
session_start();
$query= $bdd -> prepare("SELECT Id,Nom, Photo, Prix FROM Soins WHERE Nouveau = 1"); // fonction prepare , permet de sécuriser les données contre injection SQL
$query ->execute();
$soins_boutique = $query ->fetchAll(); 











include 'templates/boutique.phtml';
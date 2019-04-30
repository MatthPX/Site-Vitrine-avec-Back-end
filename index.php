<?php 
include "bdd.php";
session_start();
$query= $bdd -> prepare("SELECT Nom, Description, Photo, photo_mobile, photo_tablette FROM Soins WHERE Promu=1"); 

$query ->execute(array());

$index_soins = $query ->fetchAll(); 



$query= $bdd -> prepare("SELECT Nom, ID FROM Categories WHERE Statut=1"); // fonction prepare , permet de sécuriser les données contre injection SQL
$query ->execute();
$nav_soins = $query ->fetchAll(); 

include 'templates/index.phtml';?>
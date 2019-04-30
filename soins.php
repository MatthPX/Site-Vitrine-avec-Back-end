<?php 
include "bdd.php";
session_start();
$id = $_GET['id'];
//if($id==1){
$query= $bdd -> prepare("SELECT s.Nom, s.Description, s.Photo FROM Soins AS s LEFT JOIN Categories AS c ON c.ID = s.id_cat WHERE c.ID=?"); // Selection des noms ,descriptions et photos des soins en fonction de l'id clické

$query ->execute(array($id));

$types_soins = $query ->fetchAll(); 

include 'templates/soins.phtml';


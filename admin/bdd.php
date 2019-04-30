<?php // code standard à copier coller à chaque utilisation d'une bdd , on créer un fichier bdd , qu'on include sur les pages nécessaires
try{ // Essayer qqchose 
	$bdd= new PDO('mysql:host=localhost;dbname=Soins et Sens;
	charset=utf8','pmatth','091290'); // login : root - pw : 
}
catch (Exception $e){ // si on arrive pas à se connecter :
	die("Erreur".$e -> getMessage());
}
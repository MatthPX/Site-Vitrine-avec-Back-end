<?php // code standard à copier coller à chaque utilisation d'une bdd , on créer un fichier bdd , qu'on include sur les pages nécessaires
try{ 
	$bdd= new PDO('mysql:host=localhost;dbname=Soins et Sens;
	charset=utf8','pmatth','091290'); // login : root - pw : 
}
catch (Exception $e){ 
	die("Erreur".$e -> getMessage());
}

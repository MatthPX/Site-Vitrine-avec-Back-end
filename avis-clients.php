<?php  session_start();
include "bdd.php";
$query= $bdd -> prepare("SELECT Titre, Note, Date, Commentaire, Nom  FROM Livre_or WHERE Statut=1 "); 

$query ->execute(array());

$avis_clients = $query ->fetchAll(); 


function dateAvis($date_avis){
	$now = date("Y-m-d");

	$diff = strtotime($now) - strtotime($date_avis);
	    $retour = array();
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
// condition pour tester et aficher soit les jours , le il y a x mois , ou x année 
if($tmp<31){
	$tmp = "$tmp Jours";
	return $tmp ;
}
else if($tmp<365) {
	$tmp = $tmp / 30;
	$tmp = floor($tmp);
	$tmp = "$tmp Mois";
	return $tmp;
}
else{
	$tmp = $tmp / 365;
	$tmp= floor($tmp);
	$tmp = "$tmp An(s)";
	return $tmp;
}
}

function etoiles($nb_etoiles){
	for($i=0; $i <= $nb_etoiles; $i ++){
	 echo "<i class='fas fa-star'></i>";
	}
}

include 'templates/avis-clients.phtml';
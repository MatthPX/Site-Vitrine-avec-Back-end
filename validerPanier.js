'use strict';






function onClick(){

	var panier = localStorage.getItem("panier");
	$.post('validerCommande.php',"panier="+panier,validerCommande);
	
}


function validerCommande(reponse){
$('#panier-detail').empty();
$('#panier-detail').html("<p>Votre commande a été prise en charge . Merci de votre confiance.</p>");
window.localStorage.clear();
}

$(function(){
	$("#btnPanier").on("click",onClick);
	
 });
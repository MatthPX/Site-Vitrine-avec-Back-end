'use strict';

var index;
var envies;
var listeEnvie = []; // La liste d'envies
var cartItems = []; // Le panier
var btnViderListe;
var btnViderPanier;

/*
CODE DE LA LISTE D'ENVIES
*/

function ajout_liste()
{
  let article;
	console.log('ajout_liste');
  //console.log(this);
  article = this.title;
  console.log(article);
	index = listeEnvie.indexOf(article);

	// On ajoute le produit s'il n'est pas dans la liste
	if(index == -1)
	{
		// Ajoute le produit spécifié à la liste d'envies.
		listeEnvie.push(article);
		//console.log(listeEnvie);
    localStorage.setItem("liste",JSON.stringify(listeEnvie));
    //console.log('Ajout storage : '+localStorage.liste);
		afficher_liste();
	}
}

function afficher_liste()
{
  console.log('Afficher la liste');
  if (typeof localStorage != 'undefined' && ('liste' in localStorage) ) {
    // Récupération des produits dans web storage
    listeEnvie = JSON.parse(localStorage.getItem("liste"));
  }
  let html = '';
	let imax = listeEnvie.length;
	//console.log('En entrée, la liste contient ' + listeEnvie.length + ' produit(s).');
	//console.log(listeEnvie);
  if (imax == 0) {
    html = '<p class="status">La liste est vide</p>';
    btnViderListe.style.display = "none";
  }
  else {
    html += '<ol class="liste">';
    for (let i = 0; i < imax; i++) {
      html += '<li>'+listeEnvie[i]+'</li>';
    }
    html += '</ol>';
    html += '<p class="status">'+imax + ' produit(s)</p>';
    btnViderListe.style.display = "block";
  }
	document.getElementById("liste").innerHTML = html;
}

function vider_liste()
{
  console.log('Vider la liste');
 	// Recréer une liste vide
 	listeEnvie = new Array();
 	document.querySelector("#liste .status").textContent = 'Liste vidée';
  // Effacer les données du local storage
  localStorage.removeItem("liste");
 	afficher_liste();
}

/*
CODE DU PANIER
*/

function ajout_panier()
{
   console.log(cartItems);
  event.preventDefault();
	console.log('ajout_panier');
  //console.log(this);
  let id = $(this).data('id');
  let name = $(this).data('name');
  let price = $(this).data('price');
  let qte = parseInt($(this).prev().val());
  console.log('Produit ajouté id = '+id+', nom = '+name+', prix = '+price+', qte = '+qte);
  index = cartItems.findIndex(x => x.id === id);
  console.log('index = '+index);
  console.log(cartItems);
  if (index == -1) {
    // On ajoute l'article au panier
    cartItems.push({
        id: id,
        name: name,
        price: price,
        qte: qte
      });
  }
  else {
    // Mettre à jour la quantité
    cartItems[index].qte = parseInt(cartItems[index].qte) + qte;
  }
  localStorage.setItem("panier",JSON.stringify(cartItems));
  afficher_panier();
}

function afficher_panier()
{
  console.log('Afficher le panier');
  console.log('En entrée : '+localStorage.panier);
  let cartItemsCount = 0;
  let cartTotal = 0;
  if (typeof localStorage != 'undefined' && ('panier' in localStorage) ) {
    // Récupération des produits dans web storage
    cartItems = JSON.parse(localStorage.getItem("panier"));
  }
  let html = '';
	let imax = cartItems.length;
  if (imax == 0) {
    html = '<p class="status">Votre panier est vide</p>';
  }
  else {
    for (let i = 0; i < cartItems.length; i++) {
      console.log(cartItems[i].qte)
      cartItemsCount = cartItemsCount + cartItems[i].qte;
     
      cartTotal = cartTotal + (cartItems[i].qte * cartItems[i].price);
    }
    html += '<p class="montant">Montant total : <strong>'+cartTotal+' €</strong></p>';
    html += '<p class="status">'+cartItemsCount+' article(s)</p>';
    html += '<p><a href="panier.php">Voir le panier</a></p>';
  }
  document.getElementById('panier-resume').innerHTML = html;
  console.log(cartItems);
}

function detail_panier()
{
  console.log('Afficher le détail du panier');
  let cartItemsCount = 0;
  let cartTotal = 0;
  if (typeof localStorage != 'undefined' && ('panier' in localStorage) ) {
    // Récupération des produits dans web storage
    cartItems = JSON.parse(localStorage.getItem("panier"));
  }
  let html = '';
	let imax = cartItems.length;
  let btnPanier = document.getElementById('btnPanier');
  if (imax == 0) {
    html = '<p class="status">Votre panier est vide</p>';
    btnPanier.style.display = "none";
  }
  else {
    html += '<table>';
    html += '<tr><th>Article</th><th>Prix unitaire</th><th>Qte</th><th>Sous-total</th><th>Action</th></tr>';
    for (let i = 0; i < cartItems.length; i++) {
      cartItemsCount = cartItemsCount + cartItems[i].qte;
      cartTotal = cartTotal + (cartItems[i].qte * cartItems[i].price);
      html += '<tr>';
      html += '<td>'+cartItems[i].name+'</td>';
      html += '<td class="align-right">'+cartItems[i].price+'€ </td>';
      html += '<td>'+cartItems[i].qte+'</td>';
      html += '<td class="align-right">'+(cartItems[i].qte*cartItems[i].price)+'€ </td>';
      html += '<td class="align-center"><span data-id="'+cartItems[i].id+'"><i class="far fa-times-circle"></i></span></td>';
      html += '</tr>';
    }
    html += '</table>';
    html += '<p class="montant">Montant total : <strong>'+cartTotal+' €</strong></p>';
    html += '<p class="status">'+cartItemsCount+' article(s)</p>';
    btnPanier.style.display = "block";
  }
  html += '<p><a href="boutique.php">Retour à la boutique</a></p>';
  document.getElementById('panier-detail').innerHTML = html;
}

function vider_panier()
{
  console.log('Vider le panier');
 	// Recréer une liste vide
 	cartItems = new Array();
 	document.querySelector("#panier-detail .status").textContent = 'Liste vidée';
  // Effacer les données du local storage
  localStorage.removeItem("panier");
 	detail_panier();
}
/***********************************************************************************/
/* ******************************** CODE PRINCIPAL *********************************/
/***********************************************************************************/

$(function()
{
  btnViderListe = document.getElementById('btnViderListe');
  //console.log(btnViderListe);
  if (btnViderListe !== null) {
    btnViderListe.addEventListener('click', vider_liste);
    //console.log('En entrée : '+localStorage.liste);
    afficher_liste();
  }

  // Sélectionner les éléments a de classe envie
  envies = document.querySelectorAll("#boutique a.envie");
  if (envies !== null) {
    //console.log(envies.length);
    // Ajouter un écouteur d'événement sur chaque élément
    for (let i = 0; i < envies.length; i++) {
      envies[i].addEventListener('click', ajout_liste);
    }
  }

  btnViderPanier = document.getElementById('btnViderPanier');
  if (btnViderPanier !== null) {
    btnViderPanier.addEventListener('click', vider_panier);
    //console.log('En entrée : '+localStorage.panier);
    detail_panier();
  }

  // Ajouter un écouteur d'événement sur chaque bouton d'ajout au panier
  var cartBtn = $(".add_to_cart");
  console.log('cartBtn '+cartBtn);
    // Ajouter un écouteur d'événement sur chaque élément
   
      cartBtn.on('click', ajout_panier);
  
 var panierResume = document.getElementById('panier-resume');    
  if (panierResume !== null) {
    
    //console.log('En entrée : '+localStorage.panier);
    afficher_panier();
  }

});

'use.strict';
// variables
let timer;
let state={};
state.index=0;
var carrousel = [{url : 'img/slides/soins-et-sens.jpg',titre:'Bien-être et relaxation à Lille',description:'Praticienne en massage bien-être, réflexologie et soins énergétiques, je vous fais voyager dans le pays du bien-être',bouton:'Découvrez mes prestations'},
{url : 'img/slides/relaxation.jpg',titre:'Massage bien-être et réflexologie plantaire',description:'Je vous propose des massage bien-être pour le corps, les pieds, le dos ainsi que le visage.',bouton:'En savoir plus'},
{url : 'img/slides/massage.jpg',titre:'Vous souhaitez prendre un rendez-vous ?',description:'Je vous reçois au cabinet et me déplace en entreprise ou à domicile',bouton:'Contactez-moi'},]
let data;
let tableau=[];
//functions menu BURGER ////////////////////////////////////
function burger() {
if (window.matchMedia("(max-width: 1023px)").matches) {

$( ".menu" ).hide();
$(".sousmenu").hide();
$(".sousmenu1").hide();
$(".sousmenu1").hide();

}
// functions pour cacher les sous-menus lors de 1024px 
else{
	$(".menu").show();
	$(".sousmenu").hide();
	$(".sousmenu1").hide();
	$(".sousmenu2").hide();

};
}

// Menu nav fixe 
$(function(){
// On recupere la position du bloc par rapport au haut du site
var position_top_raccourci = $(".menu").offset().top;

//Au scroll dans la fenetre on déclenche la fonction
$(window).scroll(function () {

//si on a defile de plus de 150px du haut vers le bas
if ($(this).scrollTop() > position_top_raccourci) {

//on ajoute la classe "fixNavigation" a <div id="navigation">
$('.menu').addClass("fixMenu"); 
} else {

//sinon on retire la classe "fixNavigation" a <div id="navigation">
$('.menu').removeClass("fixMenu");
}
});
});

// function bouton TOP
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}


function topFunction() {
  document.documentElement.scrollTop = 0; 
} 

//FONCTION CARROUSEL //
function display(){
	state.index ++;
	if (state.index==carrousel.length){
		state.index=0;}
	$('figure img').attr('src', carrousel[state.index].url);
	$('figure h2').text(carrousel[state.index].titre);
	$('figure p').text(carrousel[state.index].description);
	$('button.slide').text(carrousel[state.index].bouton);
}
function next(){
	state.index ++;
	if (state.index==carrousel.length){
		state.index=0;}
	$('figure img').attr('src', carrousel[state.index].url);
	$('figure h2').text(carrousel[state.index].titre);
	$('figure p').text(carrousel[state.index].description);
	$(' button.slide').text(carrousel[state.index].bouton);
}
function previous(){
	state.index --;
	if (state.index==-1){
		state.index=2;}
	$('figure img').attr('src', carrousel[state.index].url);
	$('figure h2').text(carrousel[state.index].titre);
	$('figure p').text(carrousel[state.index].description);
	$(' button.slide').text(carrousel[state.index].bouton);
}
function stop(){
	clearInterval(timer);
}
function play(){
	setInterval(display,5000);
}

//  Les cheques cadeaux // 


// gestionnaire d'evenement //
$('.right').on('click',next);
$('.left').on('click',previous);
timer = setInterval(display,5000);


$('figure').on('mouseenter',stop());
$(".stopCarroussel").on('mouseleave', play());



//Evenements BURGER
burger();
$(window).resize(function(){
		burger();
	});

$( ".hamburger" ).click(function() {
$( ".menu" ).slideToggle( "slow");
});
$(".test1").click(function(){
    $(".sousmenu2").slideToggle("slow");
})
$(".soins").click(function(){
    $(".sousmenu").slideToggle("slow");
})
$(".test").click(function(){
    $(".sousmenu1").slideToggle("slow");
});

'use.strict'
let btnClick=0;

function onclick(){
	let id = $(this).data('id');
	if(btnClick!=id){
		$.post("detail_commande.php","id="+id,display);
		console.log(id);
		$('.detail').remove();
		$('.ligneDetail').remove();
		$(this).parent().after('<tr class="detail"></tr>');
		btnClick=id;
	}
	else{
		$('.detail').remove();
		$('.ligneDetail').remove();
			btnClick=0;
	}


}

function display(reponse){

	reponse=JSON.parse(reponse);
			console.log(reponse);
			var index = 0
			while(index < reponse.length)
			{
				qtt = reponse[index]['Qtt'];
				PU = reponse[index]['Prix_Unitaire'];
				nom = reponse[index]['Nom'];
			$('.detail').after('<tr class="ligneDetail"><td colspan="1"> Nom :</td> '+'<td colspan="2"> '+nom + 
				'</td><td colspan="2"> Prix Unitaire : </td>'+ '<td colspan="1">'+PU+
				'</td><td colspan="2"> Quantité : </td>' +'<td colspan="1">'+ qtt +'</td>');
		//	$('.detail').after('<td> Nom : '+ nom +'Prix Unitaire : '+ PU+'Quantité : ' + qtt +'</td>')
			//$('.detail ').append('<td>Prix Unitaire : '+ PU+'</td>');
			//$('.detail ').append('<td>Quantité : ' +qtt+'</td>');
			//$('.detail').html('</tr>')
		index ++;
}
		
	
	/*	for(let index=0; index<reponse.length;index++){
				qtt = reponse[index]['Qtt'];
				PU = reponse[index]['Prix_Unitaire'];
				nom = reponse[index]['Nom'];


		$('#display>tr').append('<td>'+reponse['nbre_encheres']);
		$('#display>tr').append('<td>'+reponse['montant_max']);
		if(reponse['montant_max']>= reponse['Prix_reserve']){
		$('#display>tr').append('<td> OK ');}

*/
	
}

$('.details').on("click",onclick);

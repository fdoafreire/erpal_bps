(function ($) {
	/*
  parseFloat(jQuery('.field_total .field-item').text().replace(/ /g,'')) + 20;
  jQuery('table.field-collection-view-final tbody').append('<tr><td>soy un totoal</td></tr>');
	*/
  $(document).ready(function(){
		var cantidad = 0;
		var cantfila = new Array();
		var contador = 0;
    $('.field_ref_cantidad .field-item').each(function(){
			cantidad = cantidad + parseFloat($(this).text().replace(/ /g,''));
			cantfila[contador] = parseFloat($(this).text().replace(/ /g,''));
			contador++;
    });
		var unitario = new Array();
		var contador = 0;
    $('.field_valor_unitario .field-item').each(function(){
			unitario[contador] = parseFloat($(this).text().replace(/ /g,''));
			$(this).text(parseFloat($(this).text().replace(/ /g,'')));
			contador++;
    });
    var sub = 0;
    var subtotal = new Array();
    cantfila.forEach(function(valor,indice) {
			subtotal[indice] = parseFloat(valor) * parseFloat(unitario[indice]);
			sub = sub + parseFloat(valor) * parseFloat(unitario[indice]);;
			
		});
		var contador = 0;
    $('.field_subtotal .empty_field').each(function(){
			$(this).text(subtotal[contador]);
			contador++;
    });

		var iva = 0;
		var valoriva = new Array();
		var contador = 0;
    $('.field_valor_iva .field-item').each(function(){
			iva = iva + parseFloat($(this).text().replace(/ /g,''));
			valoriva[contador] = parseFloat($(this).text().replace(/ /g,''));
			$(this).text(parseFloat($(this).text().replace(/ /g,'')));
			contador++;
    });

		var total = 0;
		var valortotal = new Array();
		var contador = 0;
    $('.field_total .field-item').each(function(){
			total = total + parseFloat($(this).text().replace(/ /g,''));
			valortotal[contador] = parseFloat($(this).text().replace(/ /g,''));
			$(this).text(parseFloat($(this).text().replace(/ /g,'')));
			contador++;
    });

		var totales = '<tr>'+
										'<td>Totales</td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
										'<td></td>'+
									'</tr>'+
									'<tr>'+
										'<td></td>'+
										'<td></td>'+
										'<td>'+cantidad+'</td>'+
										'<td></td>'+
										'<td>'+sub+'</td>'+
										'<td></td>'+
										'<td></td>'+
										'<td>'+iva+'</td>'+
										'<td>'+total+'</td>'+
									'</tr>';									
		$('table.field-collection-view-final tbody').append(totales);
  });

}(jQuery));

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
										'<td>'+subtotal+'</td>'+
										'<td>'+iva+'</td>'+
										'<td>'+total+'</td>'+
									'</tr>';
									
		$('table.field-collection-view-final tbody').append(totales);
    
    var subtotal_cot = 0;
    var total_cantidad = 0;
    var total_dcto = 0;
    var total_iva = 0;
    var total_cotizacion = 0;
    $('.cantidad').each(function(){
			var id_cant = $(this).attr('id');
			var id_valor = id_cant.replace('ref-cantidad', 'valor-unitario');
			var id_dscto = id_cant.replace('ref-cantidad', 'descuento');
			var id_iva = id_cant.replace('ref-cantidad', 'porcentaje-impuesto');
			var id_vlriva = id_cant.replace('ref-cantidad', 'valor-iva');
			var id_total = id_cant.replace('ref-cantidad', 'total');
			var cant  = parseFloat($('#' + id_cant).val());
			var valor = parseFloat($('#' + id_valor).val());
			var dscto = parseFloat($('#' + id_dscto).val());						
			var iva   = parseFloat($('#' + id_iva).val());

			var subtotal = (cant * valor) - ((cant * valor * dscto) / 100);
			var descuento = (cant * valor * dscto) / 100;
			var valor_iva = (subtotal * iva) / 100;
			var total = subtotal + valor_iva;
			
			if (subtotal >0){
				total_cantidad = parseFloat(total_cantidad) + parseFloat(cant);
				subtotal_cot = parseFloat(subtotal_cot) + parseFloat(subtotal);
				total_dcto = parseFloat(total_dcto) + parseFloat(descuento);
				total_iva = parseFloat(total_iva) + parseFloat(valor_iva);
				total_cotizacion = parseFloat(total_cotizacion) + parseFloat(total);
			}
		});
		$('#edit-subtotal').val(subtotal_cot);	
		$('#edit-descuentos').val(total_dcto);	
		$('#edit-total-iva').val(total_iva);	
		$('#edit-total-cotizacion--2').val(total_cotizacion);	  
  });

}(jQuery));

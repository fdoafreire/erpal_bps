(function ($) {
  $(document).ready(function(){
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
  $(document).on('change','.valor_unitario, .cantidad, .porcentaje_impuesto, .descuento', {} ,function(e){
    if ($(e.currentTarget).hasClass('cantidad')){
      var id_cant = $(e.currentTarget).attr('id');
      var id_valor = id_cant.replace('ref-cantidad', 'valor-unitario');
      var id_dscto = id_cant.replace('ref-cantidad', 'descuento');
      var id_iva = id_cant.replace('ref-cantidad', 'porcentaje-impuesto');
      var id_vlriva = id_cant.replace('ref-cantidad', 'valor-iva');
      var id_total = id_cant.replace('ref-cantidad', 'total');
    } else if ($(e.currentTarget).hasClass('valor_unitario')){
      var id_valor = $(e.currentTarget).attr('id');
      var id_cant = id_valor.replace('valor-unitario','ref-cantidad');
      var id_dscto = id_valor.replace('valor-unitario', 'descuento');
      var id_iva = id_valor.replace('valor-unitario', 'porcentaje-impuesto');
      var id_vlriva = id_valor.replace('valor-unitario', 'valor-iva');
      var id_total = id_valor.replace('valor-unitario', 'total');
    } else if ($(e.currentTarget).hasClass('porcentaje_impuesto')){
      var id_iva = $(e.currentTarget).attr('id');
      var id_valor = id_iva.replace('porcentaje-impuesto', 'valor-unitario');
      var id_cant = id_iva.replace('porcentaje-impuesto','ref-cantidad');
      var id_dscto = id_iva.replace('porcentaje-impuesto', 'descuento');
      var id_vlriva = id_iva.replace('porcentaje-impuesto', 'valor-iva');
      var id_total = id_iva.replace('porcentaje-impuesto', 'total');
    } else if ($(e.currentTarget).hasClass('descuento')){
      var id_dscto = $(e.currentTarget).attr('id');
      var id_valor = id_dscto.replace('descuento', 'valor-unitario');
      var id_cant = id_dscto.replace('descuento','ref-cantidad');
      var id_iva = id_dscto.replace('descuento', 'porcentaje-impuesto');
      var id_vlriva = id_dscto.replace('descuento', 'valor-iva');
      var id_total = id_dscto.replace('descuento', 'total');
    } 
    var cant  = parseFloat($('#' + id_cant).val());
    var valor = parseFloat($('#' + id_valor).val());
    var dscto = parseFloat($('#' + id_dscto).val());
    var iva   = parseFloat($('#' + id_iva).val());
    var subtotal = '';
    var valor_iva = '';
    var total = '';

    if (cant > 0 && valor > 0){
      if (dscto == undefined || dscto== '' || isNaN(dscto)){
        dscto = 0;
      }
      if (iva == undefined || iva== '' || isNaN(dscto)){
        iva = 0;
      }
      var subtotal = cant * valor - ((cant * valor * dscto) / 100);
      var valor_iva = (subtotal * iva) / 100;
      valor_iva = valor_iva.toFixed(2);
      var total = subtotal + valor_iva;
    }
    
    $('#' + id_vlriva).val(valor_iva); 
    $('#' + id_total).val(total); 
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
			valor_iva = valor_iva.toFixed(2);
			var total = subtotal + valor_iva;

			total_cantidad = parseFloat(total_cantidad) + parseFloat(cant);
			subtotal_cot = parseFloat(subtotal_cot) + parseFloat(subtotal);
			total_dcto = parseFloat(total_dcto) + parseFloat(descuento);
			total_iva = parseFloat(total_iva) + parseFloat(valor_iva);
			total_cotizacion = parseFloat(total_cotizacion) + parseFloat(total);
		});
		if (subtotal_cot > 0){
			$('#edit-subtotal').val(subtotal_cot);	
			$('#edit-descuentos').val(total_dcto);	
			$('#edit-total-iva').val(total_iva);	
			$('#edit-total-cotizacion--2').val(total_cotizacion);	
		}
  });
/* Funcion que solo permite ingresar valores numericos */
  $(document).on('keypress','.valor_unitario, .cantidad, .descuento, .porcentaje_impuesto',{}, function(evento){
    var nav = window.Event ? true : false;
    var valor = nav ? evento.which : evento.keycode;
    return (valor <= 13 || (valor >= 48 && valor <=57) || valor == 46 || valor==45); 
  });

  $(document).on('keydown.autocomplete','.ee-autocomplete', {} ,function(e){
    var type              = $(e.currentTarget).attr('data-type');
    var select_function   = $(e.currentTarget).attr('data-select');
    var filters           = $(e.currentTarget).attr('data-filter');
    var id_element        = $(e.currentTarget).attr('data-id-element');     
    if (filters === undefined || filters === null){
        var aditional_filters = '';
    }
    else {
      var aditional_filters = '?filters='+filters;
    }
    $(e.currentTarget).autocomplete({
      delay: 500,
      minLength: 3,
      source: function(request, response) {
        $.getJSON("/bps/autocompletar/"+type+"/"+request.term+aditional_filters,
        function(data) {
          var array = data.error ? [] : $.map(data, function(t) {
            return {
              label: t.description,
              id: t.id              
            };
          });
          response(array);
        });
      },
       select: function( event, ui ){
           if (typeof window[select_function] === 'function'){
                formok = window[select_function](event,ui,id_element,ui.item.id);
                e.preventDefault();
           } 
      },
    });  
  });
}(jQuery));

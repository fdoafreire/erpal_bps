(function ($) {
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
      var total = subtotal + valor_iva;
    }
    
    $('#' + id_vlriva).val(valor_iva); 
    $('#' + id_total).val(total); 
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

        var total_cantidad = parseFloat(total_cantidad) + parseFloat(cant);
        var total_dcto = parseFloat(total_dcto) + parseFloat(descuento);
        var total_iva = parseFloat(total_iva) + parseFloat(valor_iva);
        var total_cotizacion = parseFloat(total_cotizacion) + parseFloat(total);
		alert(cant+' '+valor+' '+dscto+' '+subtotal+' '+descuento+' '+valor_iva+' '+total);
	});
		alert(total_cantidad+' '+total_dcto+' '+total_iva+' '+total_cotizacion);
  });
/* Funcion que solo permite ingresar valores numericos */
  $(document).on('keypress','.valor_unitario, .cantidad, .descuento, .porcentaje_impuesto',{}, function(evento){
    var nav = window.Event ? true : false;
    var valor = nav ? evento.which : evento.keycode;
    return (valor <= 13 || (valor >= 48 && valor <=57) || valor == 46 || valor==45); 
  });

  /*Drupal.behaviors.bps_core = {
    attach: function (context, settings) {
      $(".cantidad").change(function() {
       	 alert($(this).attr('id'));
      });
    }
  };*/
}(jQuery));

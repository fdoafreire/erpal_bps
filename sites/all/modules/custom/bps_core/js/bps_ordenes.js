(function ($) {

  $(document).ready(function(){
		//Ocultos en ordenes de trabajo o servicio
		$('#node_ordenes_form_group_datos_el').hide();
		$('#node_ordenes_form_group_ord_datos_tecnicos').hide();
		$('#node_ordenes_form_group_medicion_entrada').hide();
		$('#node_ordenes_form_group_medicion_salida').hide();
		$('#node_ordenes_form_group_ord_par_serv').hide();
  });
  $(document).on('change','.tipo_orden', {} ,function(e){
		if ($("select[name='field_ord_tipo[und]':selected").val()=="1"){
			alert("Tipo servicio 1");
		} else if ($("select[name='field_ord_tipo[und]':selected").val()=="2"){
			alert("Tipo servicio 2");
		} else {
			alert("Tipo servicio N/A");
		}
	});

   Drupal.behaviors.ordenes = {
      attach: function (context, settings) {
        $('#edit-field-ord-cliente-und-0-target-id').keyup(function(){
            var texto = $(this).val();
            var regExp = /\((.*)\)/;
            var nid = 0;
            $('#edit-field-ord-sucursal-item').find('option').remove().end().append('<option value="0" selected="selected">- Seleccionar -</option>');
            if (texto.match(regExp)) {
              nid = texto.match(regExp).pop();
            }
            if (nid != 0) {
                $.getJSON('/bps/ajax/sucursales/' + nid, function(data){
                    $.each(data, function(index,item) {
                       $('#edit-field-ord-sucursal-item').append("<option value=" + index + ">" + item + "</option>"); 
                    });
                });
            }
        });
      }
    };
})(jQuery);

(function ($) {

  $(document).ready(function(){
		//Ocultos en ordenes de trabajo o servicio
		var tipo = $("select[name='field_ord_tipo[und]'").val();
		if (tipo =="1"){
			$('#node_ordenes_form_group_datos_el').hide()
			$('#node_ordenes_form_group_ord_datos_tecnicos').hide();
			$('#node_ordenes_form_group_medicion_entrada').hide();
			$('#node_ordenes_form_group_medicion_salida').hide();
			$('#node_ordenes_form_group_ord_par_serv').show();
		} else if (tipo=="2"){
			$('#node_ordenes_form_group_datos_el').show()
			$('#node_ordenes_form_group_ord_datos_tecnicos').show();
			$('#node_ordenes_form_group_medicion_entrada').show();
			$('#node_ordenes_form_group_medicion_salida').show();
			$('#node_ordenes_form_group_ord_par_serv').hide();
		} else {
			$('#node_ordenes_form_group_datos_el').hide()
			$('#node_ordenes_form_group_ord_datos_tecnicos').hide();
			$('#node_ordenes_form_group_medicion_entrada').hide();
			$('#node_ordenes_form_group_medicion_salida').hide();
			$('#node_ordenes_form_group_ord_par_serv').hide();
		}
  });
  $(document).on('change','.tipo_orden', {} ,function(e){
		var id_tipo = $(e.currentTarget).attr('id');
		var tipo = $("#"+id_tipo+" option:selected").val();
		if (tipo =="1"){
			$('#node_ordenes_form_group_datos_el').hide()
			$('#node_ordenes_form_group_ord_datos_tecnicos').hide();
			$('#node_ordenes_form_group_medicion_entrada').hide();
			$('#node_ordenes_form_group_medicion_salida').hide();
			$('#node_ordenes_form_group_ord_par_serv').show();
		} else if (tipo=="2"){
			$('#node_ordenes_form_group_datos_el').show()
			$('#node_ordenes_form_group_ord_datos_tecnicos').show();
			$('#node_ordenes_form_group_medicion_entrada').show();
			$('#node_ordenes_form_group_medicion_salida').show();
			$('#node_ordenes_form_group_ord_par_serv').hide();
		} else {
			$('#node_ordenes_form_group_datos_el').hide()
			$('#node_ordenes_form_group_ord_datos_tecnicos').hide();
			$('#node_ordenes_form_group_medicion_entrada').hide();
			$('#node_ordenes_form_group_medicion_salida').hide();
			$('#node_ordenes_form_group_ord_par_serv').hide();
		}
	});
	
	populate_sucursal = function( event, ui,id_element,id_selected ) {
		$("#" + id_element).find('option').remove().end().append('<option value="0" selected="selected">- Seleccionar -</option>');
		$.getJSON('/bps/ajax/sucursales/' + id_selected, function(data){
			$.each(data, function(index,item) {
			   $("#" + id_element).append("<option value=" + index + ">" + item + "</option>"); 
			});
		});
	};

})(jQuery);

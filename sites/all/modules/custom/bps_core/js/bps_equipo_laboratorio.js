(function ($) {

  populate_ordenes = function( event, ui,id_element,id_selected ) {
    $('#field_el_cliente_id').val(id_selected);
    $("#" + id_element).find('option').remove().end().append('<option value="0" selected="selected">- Seleccionar -</option>');   
    $.getJSON('/bps/ajax/ordenes/' + id_selected, function(data){
      $.each(data, function(index,item) {
         $("#" + id_element).append("<option value=" + index + ">" + item + "</option>"); 
      });
    });
  };

})(jQuery);

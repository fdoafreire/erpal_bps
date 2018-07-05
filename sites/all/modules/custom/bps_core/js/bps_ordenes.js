(function ($) {

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
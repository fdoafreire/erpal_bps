(function ($) {

   Drupal.behaviors.ordenes = {
      attach: function (context, settings) {
        $('#edit-field-ord-cliente-und-0-target-id').keyup(function(){
            var texto = $(this).val();
            var regExp = /\((.*)\)/;
            var nid = 0;
            if (texto.match(regExp)) {
              nid = texto.match(regExp).pop();
            }

            if (nid != 0) {
                $.getJSON('/guessMarkers/ajax/jornadas/' + competicion, function(data){
                    $.each(data, function(index,item) {
                        console.log(item);
                       //$('#field_ord_sucursal_item').append("<option value=" + item.jornada + ">Jornada " + item.jornada + "</option>"); 
                    });
                });
            }
        });
      }
    };


})(jQuery);
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
                $.getJSON('/bps/ajax/sucursales/' + nid, function(data){
                    console.log(data);
                    $.each(data, function(index,item) {
                       console.log(index + '--' + item);
                       $('#field_ord_sucursal_item').append("<option value=" + index + ">" + item + "</option>"); 
                    });
                });
            }
        });
      }
    };


})(jQuery);
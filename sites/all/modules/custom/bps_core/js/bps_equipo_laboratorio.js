(function ($) {
   Drupal.behaviors.equipo_laboratorio = {
      attach: function (context, settings) {
        $('#edit-field-el-cliente-und-0-target-id').keyup(function(){
            var texto = $(this).val();
            var regExp = /\((.*)\)/;
            var nid = 0;
            $('#edit-field-orden').find('option').remove().end().append('<option value="0" selected="selected">- Seleccionar -</option>');
            if (texto.match(regExp)) {
              nid = texto.match(regExp).pop();
            }
            if (nid != 0) {
                $.getJSON('/bps/ajax/ordenes/' + nid, function(data){
                    $.each(data, function(index,item) {
                       $('#edit-field-orden').append("<option value=" + index + ">" + item + "</option>"); 
                    });
                });
            }
        });
      }
    };
})(jQuery);

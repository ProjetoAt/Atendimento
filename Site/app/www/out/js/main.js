$(document).ready(function() {
    function criaMascaras() {
        var telefoneConfig = {onKeyPress: function(tel, event, currentField, options){
            var masks = ['(00) 0000-00000', '(00) 0-0000-0000'];
            mask = (currentField.cleanVal().length > 10) ? masks[1] : masks[0];
            $('.js-telefone').mask(mask, telefoneConfig);
        }};

        $('.js-cpf').mask('000.000.000-05');
        $('.js-telefone').mask('000.000.000-05', telefoneConfig);
    }

    criaMascaras();

});

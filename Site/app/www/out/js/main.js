$(document).ready(function() {
    function criaMascaras() {
        var telefoneConfig = {onKeyPress: function(tel, event, currentField, options){
            var masks = ['(00) 0000-00000', '(00) 0-0000-0000'];
            mask = (currentField.cleanVal().length > 10) ? masks[1] : masks[0];
            $('.js-telefone').mask(mask, telefoneConfig);
        }};

        $('.js-cpf').mask('000.000.000-00');
        $('.js-telefone').mask('000.000.000-00', telefoneConfig);
    }

    function validaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
    
        // Elimina CNPJs invalidos conhecidos
        if (strCPF == "00000000000" || 
            strCPF == "11111111111" || 
            strCPF == "22222222222" || 
            strCPF == "33333333333" || 
            strCPF == "44444444444" || 
            strCPF == "55555555555" || 
            strCPF == "66666666666" || 
            strCPF == "77777777777" || 
            strCPF == "88888888888" || 
            strCPF == "99999999999") {
            
            return false;
        }
    
        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
        
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }

    criaMascaras();

    $('.js-cpf').focusout(function() {
        if ( validaCPF($(this).cleanVal()) ) {
            $(this).removeClass('panel-data__input-text--error');
        } else {
            $(this).addClass('panel-data__input-text--error');
        }
    });

});

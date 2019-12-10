$(document).ready(function() {
    $('#botao').click(function(){
        //se o input do couver for diferente de N OU S ou o input do serviço for diferente de N OU S = erro
        // se nao for diferente vai ser igual, é uma verificação de campos.
        if($('#couver').val() != "N" && $('#couver').val() != "S" || $('#servico').val() != "N" && $('#servico').val() != "S"){
            alert('ERRO');
        } else {
            $('form#myForm').submit();
        }
    });
});

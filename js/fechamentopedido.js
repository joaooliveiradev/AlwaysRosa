$(document).ready(function () {
    $("#forma1").val(0);
    $("#forma2").val(0);
    $("#forma3").val(0);
    $("#fecharpedidoForm").hide();
    $("#box").hide();
    $("#input1").show();
    $("#botao1").show();
    $("#box2").hide();
    $("#box3").hide();
    $("#fechar").hide();
   

    $("#btnforma1").click(function () {
        $("#botao1").hide();
        $("#box2").show();
        $("#forma2").val(0);
    });

    $("#btnforma2").click(function () {
        
    if($('#box3').is(':visible')) {
        $("#box2").show();
        $("#forma2").val(0);
    } else {
        $("#botao2").hide();
        $("#box3").show();
        $("#forma3").val(0);
    }

    });

    $("#calcular").click(function () {
        //pegando os valores dos formularios via js e fazendo o calculo para mostrar o troco
        let clienteMesa = $('#clientemesa').val()
        let totalDaConta = parseFloat($('#totaldaConta').val());
        let troco = parseFloat($('#forma1').val()) + parseFloat($('#forma2').val()) + parseFloat($('#forma3').val());
        let totalTroco = totalDaConta - troco;
        let porPessoa = totalDaConta / clienteMesa;
        $('#troco').val(totalTroco.toFixed(2));
        $('#ppessoa').val(porPessoa.toFixed(2));
        $("#box").show();
        $("#fechar").show();
    });
});

$(document).ready(function () {
    $('select').formSelect();
});

function deletar2(){
    $("#box2").hide();
    $("#botao1").show();
    
}
function deletar3(){
    $("#box3").hide();
    $("#botao2").show();
}

$("#fechar").click(function() {
    //pegando os dados dos 3 formularios e seus respectivos valores e da comanda
    let selectForma1 = $('select[name=selectForma1]').val();
    let selectForma2 = $('select[name=selectForma2]').val();
    let selectForma3 = $('select[name=selectForma3]').val();
    let inputValue1 = $('#forma1').val();
    let inputValue2 = $('#forma2').val();
    let inputValue3 = $('#forma3').val();
    //ajax
    $.ajax({
        type: "POST",
        url: '../php/caixa/fecharpedido.php',
        data: {
          selectForma1: selectForma1,
          selectForma2: selectForma2,
          selectForma3: selectForma3,
          inputValue1: inputValue1,
          inputValue2: inputValue2,
          inputValue3: inputValue3
        },
        success: function(result){
            window.location.href="../caixa/index.php"
        },
      });

});
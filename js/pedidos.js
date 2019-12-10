$(document).ready(function () {
  $('#btnmais').hide();
  let inputComanda = document.querySelector('#inputComanda');
  document.querySelector('button#btnVerificarComanda').addEventListener('click', verificar);
  function verificar() {
    if (inputComanda.value <= 0 || inputComanda == "") {
      alert('Digite uma comanda válida');
    } else {
      //ajax pra mandar pegar o valor do input e mandar para o php para fazer o select;
      $.ajax({
        type: "POST",
        url: '../php/pedidos/select_pedido.php',
        data: {
          idpedido: inputComanda.value,
        },
        success: function (data) {
          if (data !== "erro") {

            $("#btnmais").show();
            $('#table > tbody').html(data);
          } else {
            $("#btnmais").hide();
            $('#table > tbody').html("");
          }
        },
      });

    }
  }

});
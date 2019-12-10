$(document).ready(function () {
  $("#box2").hide();
  $("#boxbutton").click(function () {
    $("#box").hide();
    $("#box2").show();
    let selectValue = $('select[name=selectCategoria]').val();
    $.ajax({
      type: "POST",
      url: '../php/produtos/select_produto.php',
      data: {
        idcategoria: selectValue,

      },
      success: function (data) {
        $('#selectProduto').html(data);
      },
    });
  });
  $("#voltar").click(function () {
    $("#box2").hide();
    $("#box").show();
  });

});
M.textareaAutoResize($('#textarea1'));


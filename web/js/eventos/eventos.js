$(document).ready(function(){
  /*$('.eventos-item-autor').each(function(){
    var item_altura = $(this).height();
    $(this).css('margin-top', '-' + (item_altura * 2.4 ) + 'px');
  });*/

  var urlPaginador = $('#data-contenedor').data('cargar-datos') ;

  var data_send = {page:1, sincePage:1};

  $('#data-contenedor').trigger("cargar", ["onload", data_send, urlPaginador]);

  $("#data-contenedor").on("cambio-pagina", function(){
    $('.eventos-item-autor').each(function(){
      var item_altura = $(this).height();
      $(this).css('margin-top', '-' + (item_altura * 2.4 ) + 'px');
    });
  });



});
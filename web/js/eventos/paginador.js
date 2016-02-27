$(document).ready(function(){
  
  var elemen_last_page = $('.next').prev().find('a');
  var last_page = elemen_last_page.data('page');
  
  if (last_page == 1) {
    elemen_last_page.parent('.npage').next().removeClass('npage');
  }
  
  $('#data-contenedor').on('click', '#paginador-contenedor a', function(e){
    e.preventDefault();
  });
  
  $('#data-contenedor').on('click', 'ul.pagination > li.npage > a', function(e){
    
      e.preventDefault();

      $('#data-contenedor').trigger('cargar', ["paginar", $(this)]);
  });

  $('#data-contenedor').on('cargar', function(e, param1, param2, param3) {

    switch(param1) {
      case "paginar":
        var that = param2;

        var actualPage = $('ul.pagination > li.active > a').data('page');
        var page = $(that).data('page');
        var urlPaginador = $(that).data('paginador');
        var direction = $(that).data('direction');
        var sincePage = $(that).data('sincepage');

        if (direction === 'right') {
          page = actualPage + 1;
        } else if (direction === 'left') {
          page = actualPage - 1;
        }

        var data_send = {page:page, sincePage:sincePage};

        break;

      case "buscar":

        var urlPaginador = param3;
        var data_send = param2;

        break;

      case "onload":

        var data_send = param2;
        var urlPaginador = param3;

        break;

      default:
        break;
    }

    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#data-table').height() + 28;
    $('#data-table').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
    //console.log(heightLoader - (heightImg/2));

    $.ajax({
      type: "POST",
      url: urlPaginador,
      data: data_send,
      success: function(data) {
        $("#data-contenedor").html(data).fadeIn(1000);
        $('ul.pagination > li.active').removeClass('npage');
        $('ul.pagination > li.disabled').removeClass('npage');
        $('ul.pagination > li > a').click(function(e){
          e.preventDefault();
        });
        $( "#data-contenedor" ).trigger( "cambio-pagina" );
      },
      error: function(){
        console.log('error');
      },
      timeout: 10000
    });

  });

});

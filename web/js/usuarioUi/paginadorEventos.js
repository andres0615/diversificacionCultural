$(document).ready(function(){

  var elemen_last_page = $('.next').prev().find('a');
  var last_page = elemen_last_page.data('page');

  if (last_page == 1) {
    elemen_last_page.parent('.npage').next().removeClass('npage');
  }

  $('#perfil-frame').on('click', '#paginador-contenedor a', function(e){
    e.preventDefault();
  });

  $('#perfil-frame').on('click', 'ul.pagination > li.npage > a', function(e){
    e.preventDefault();

    //var data_send = {page:1, sincePage:1};

    $('#perfil-frame').trigger("cargarEventos", ["paginar",$(this)]);

  });

  $('#perfil-frame').on("cargarEventos", function(e, param1, param2, param3){

    switch(param1) {
      case "onload":
          var data_send = param2;
          var urlPaginador = param3;
        break;

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
    }

    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#perfil-frame').height() + 28;
    $('#data-contenedor').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});

    /*var actualPage = $('ul.pagination > li.active > a').data('page');
    var page = $(this).data('page');
    var urlPaginador = $(this).data('paginador');
    var direction = $(this).data('direction');
    var sincePage = $(this).data('sincepage');

    if (direction === 'right') {
      page = actualPage + 1;
    } else if (direction === 'left') {
      page = actualPage - 1;
    }*/

    $.ajax({
      type: "POST",
      url: urlPaginador,
      data: data_send,
      success: function(data) {
        $("#perfil-frame").html(data).fadeIn(1000);
        $('ul.pagination > li.active').removeClass('npage');
        $('ul.pagination > li.disabled').removeClass('npage');
        $('ul.pagination > li > a').click(function(e){
          e.preventDefault();
        });
      },
      error: function(){
        console.log('error');
      },
      timeout: 10000
    });
  });

});
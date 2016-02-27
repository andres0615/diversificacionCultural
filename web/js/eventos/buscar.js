$(document).ready(function(){
  $('#panel-buscar').on('click', function(e){
    e.preventDefault();

    var button = $(this);

    $('#panel-buscar-evento-ui').toggle({
      easing : "swing",
      duration : 400,
      complete: function (){
        var text = "";

        var panel_visible = $(this).css('display');

        text += '<span class="glyphicon glyphicon-search" ></span> ';

        if(panel_visible == "none") {
          text += "Buscar +";
        } else {
          text += "Buscar -";
        }

        button.html(text);

      }
    });

  });

  $('#filtrar').on('click', function(e) {
    e.preventDefault();

    var urlPaginador = $(this).attr('href');

    var eventoNombre = $('#evento-nombre').val();
    var eventoFechaInicial = $('#evento-fechainicial').val();
    var eventoFechaFinal = $('#evento-fechafinal').val();
    var campoEventoUsuario = $('#evento-usuario').data('input-id');
    var campoEventoCategoria = $('#evento-categoria').data('input-id');
    var eventoUsuario = $('#' + campoEventoUsuario).val();
    var eventoCategoria = $('#' + campoEventoCategoria).val();

    var filterArray = {};

    filterArray['eventoNombre'] = eventoNombre;
    filterArray['eventoFechaInicial'] = eventoFechaInicial;
    filterArray['eventoFechaFinal'] = eventoFechaFinal;
    filterArray['eventoUsuario'] = eventoUsuario;
    filterArray['eventoCategoria'] = eventoCategoria;

    /*console.log(filterArray);

    var filter = {};

    filter['filter'] = filterArray;*/

    var filter = filterArray;

    var data_send = {page:1, sincePage:1, filter: filter};

    $('#data-contenedor').trigger('cargar', ["buscar", data_send, urlPaginador]);
  });

});
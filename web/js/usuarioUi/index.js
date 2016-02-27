$(document).ready(function(){
  
  $('.usuario-opciones > a > li').hover(function(){
//    $(this).addClass('usuario-opciones-li-hover');      
        
        $(this).stop(true,true).animate({
          "background-color": "rgba(191,191,191,0.5)"},
          500, 
          function() {

          }
        );

  },
  function(){
//    $(this).removeClass('usuario-opciones-li-hover');

        $(this).stop().animate({
          "background-color" : "rgba(191,191,191,0)"},
          500, 
          function() {

          }
        );
  });
  
  $('.usuario-opciones > a').click(function(e){
    
    e.preventDefault();
    
    var tipo_frame = $(this).data('frame');
    var url = $(this).data('url');

    switch(tipo_frame) {
      case 2:
        var data_send = {page:1, sincePage:1};
        var urlPaginador = $(this).data('url') ;

        $('#perfil-frame').trigger("cargarEventos", ["onload", data_send, urlPaginador]);

        break;

      case 1:
      case 3:
          var dataObject = {};
          dataObject['tipo_frame'] = tipo_frame;

          $.ajax({
            type: "POST",
            url: url,
            data: dataObject,
            success: function(data) {

              //console.log(data);

              $('#perfil-frame').html(data);

              $( "#perfil-frame" ).trigger( "cambio-frame" );
            }
          });
        break;
    }
    
  });

  var tipo_frame = $('#ui-opcion1').data('frame');
  var url = $('#ui-opcion1').data('url');

  var dataObject = {};
  dataObject['tipo_frame'] = tipo_frame;

  $.ajax({
    type: "POST",
    url: url,
    data: dataObject,
    success: function(data) {
      $('#perfil-frame').html(data);
      $( "#perfil-frame" ).trigger( "cambio-frame" );
    }
  });
  
});
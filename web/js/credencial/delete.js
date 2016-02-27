$(document).ready(function(){  
  
  function showSuccessToast() {
        $().toastmessage('showSuccessToast', "Success Dialog which is fading away ...");
    }
    function showStickySuccessToast(mesage) {
        $().toastmessage('showToast', {
            text     : mesage,
            sticky   : true,
            position : 'top-right',
            type     : 'success',
            closeText: '',
            close    : function () {
                console.log("toast is closed ...");
            }
        });

    }
  
  function showStickyErrorToast(mesage) {
      $('#mensaje').toastmessage('showToast', {
          text     : mesage,
          sticky   : true,
          position : '',
          type     : 'error',
          closeText: '',
          close    : function () {
              console.log("toast is closed ...");
          }
      });
  }
  
  function resetRegistros(mesage) {
    
      var heightImg = $('#loaderGif > img').height();
      var heightLoader = $('#data-table').height() + 28;
      $('#data-table').hide();
      $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
      $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
      console.log(heightLoader - (heightImg/2));

      var urlPaginador = $('ul.pagination > li.active > a').data('paginador');
      var page = $('ul.pagination > li.active > a').text();
      var sincePage = $('ul.pagination > li > a').eq(1).text();

      $.ajax({
          type: "POST",
          url: urlPaginador,
          data: {page:page, sincePage:sincePage},
          success: function(data) {
            $("#data-table-contenedor").html(data).fadeIn(1000);
            $('ul.pagination > li.active').removeClass('npage');
            $('ul.pagination > li.disabled').removeClass('npage');
            $('ul.pagination > li > a').click(function(e){
              e.preventDefault();              
            });

            javascript:showStickySuccessToast(mesage);

          },
          error: function(){
            console.log('error');
          },
          timeout: 10000
      }); 

  }
  
  function eliminarCredencial(url, inputNameId, credencial_id) {
    
    var dataObject = {};
    dataObject[inputNameId] = credencial_id;
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataObject,
        success: function(data) {  
              
              var myarr = data.split("¬");
              var mesage = myarr[0];          
              
              if (typeof(myarr[1]) != "undefined") {
                var flag = "true";
              } else {
                var flag = "false";
              }
              
              if (flag === "true") {
                //javascript:showStickySuccessToast(mesage);
                javascript:resetRegistros(mesage);
              } else {
                javascript:showStickyErrorToast(mesage);
              }
        }
    });
  }

  var boton_actual = null;
  var dialog_abierto = false;
  
  function abrir_dialog() {
    $( "#dialog" ).dialog("open");
  };

  $('#data-table-contenedor').on('click', '.credencial-delete', function(e){
    e.preventDefault();
    dialog_abierto = true;
    boton_actual = $(this);
    abrir_dialog();
  });

  $( "#dialog" ).dialog({
    modal: true,
    autoOpen: false,
    buttons: {
      "Si": function() {
        if(dialog_abierto) {
          $( this ).dialog( "close" );
          if(typeof boton_actual === 'object') {
            var url = boton_actual.attr('href');
            var user_id = boton_actual.data('id');
            var inputNameId = boton_actual.data('name');
            javascript:eliminarCredencial(url, inputNameId, user_id);
          }
        }
      },
      Cancel: function() {
        if (dialog_abierto) {
          $(this).dialog("close");
        }
      }
    }
  });
  
});
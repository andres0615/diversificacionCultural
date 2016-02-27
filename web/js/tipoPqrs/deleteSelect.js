$(document).ready(function(){  
  
  function showStickySuccessToast(mesage) {
      $('#mensaje').toastmessage('showToast', {
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
  
  function eliminarTiposPqrs(url, ids) {

    var dataObject = {};
    dataObject['chk'] = ids;
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataObject,
        success: function(data) {
              console.log(data);     
              
              var myarr = data.split("¬");
              var mesage = myarr[0];
              
              
              if (typeof(myarr[1]) != "undefined") {
                var flag = "true";
              } else {
                var flag = "false";
              }
              
              console.log(flag);
              
              if (flag === "true") {                
                javascript:resetRegistros(mesage);
              } else {
                javascript:showStickyErrorToast(mesage);
              }
        }
    });
  }

  var boton_actual2 = null;
  var ids = new Array();
  var dialog_abierto2 = false;
  
  function abrir_dialog() {
    $( "#dialog2" ).dialog("open");
  };


  $('#delete-select').click(function(e){
    
    e.preventDefault();

    ids = [];

    dialog_abierto2 = true;
    boton_actual2 = $(this);
    
    $(".item-tipoPqrs-chk:checked").each(function(){
      ids.push($(this).val());
    });  
    
    abrir_dialog();
  });

  $( "#dialog2" ).dialog({
    modal: true,
    autoOpen: false,
    buttons: {
      "Si": function() {
        if(dialog_abierto2) {
          $( this ).dialog( "close" );
          if(typeof boton_actual2 === 'object') {
            var url = boton_actual2.attr('href');
            javascript:eliminarTiposPqrs(url, ids);
          }
        }
      },
      Cancel: function() {
        if (dialog_abierto2) {
          $(this).dialog("close");
        }
      }
    }
  });
  
});
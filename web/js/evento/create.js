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
  
  $('#submit-evento-form').click(function(){
    
    var url = $("#evento-form").attr('action');
    
    var inputNameEventoNombre = $('#evento_nombre').attr('name');
    var inputNameEventoDescripcion = $('#evento_descripcion').attr('name');
    var inputNameEventoFechaInicial = $('#evento_fecha_inicial').attr('name');
    var inputNameEventoFechaFinal = $('#evento_fecha_final').attr('name');
    var inputNameEventoLatitud = $('#evento_latitud').attr('name');
    var inputNameEventoLongitud = $('#evento_longitud').attr('name');
    var inputNameEventoDireccion = $('#evento_direccion').attr('name');
    var inputNameEventoCosto = $('#evento_costo').attr('name');
    var inputNameEventoUsuarioId = $('#evento_usuario_id').attr('name');
    var inputNameEventoCategoriaId = $('#evento_categoria_id').attr('name');
    var inputNameEventoFechaInicialPublicacion = $('#evento_fecha_inicial_publicacion').attr('name');
    var inputNameEventoFechaFinalPublicacion = $('#evento_fecha_final_publicacion').attr('name');
    var inputNameEventoImagen = $('#evento_imagen').prop('name');
    
    var evento_nombre = $('#evento_nombre').val();
    var evento_descripcion = $('#evento_descripcion').val();
    var evento_fecha_inicial = $('#evento_fecha_inicial').val();
    var evento_fecha_final = $('#evento_fecha_final').val();
    var evento_latitud = $('#evento_latitud').val();
    var evento_longitud = $('#evento_longitud').val();
    var evento_direccion = $('#evento_direccion').val();
    var evento_costo = $('#evento_costo').val();
    var evento_usuario_id = $('#evento_usuario_id').val();
    var evento_categoria_id = $('#evento_categoria_id').val();
    var evento_fecha_inicial_publicacion = $('#evento_fecha_inicial_publicacion').val();
    var evento_fecha_final_publicacion = $('#evento_fecha_final_publicacion').val();
    var evento_imagen = $('#evento_imagen')[0].files;
    
    var dataObject = {};
    dataObject[inputNameEventoNombre] = evento_nombre;
    dataObject[inputNameEventoDescripcion] = evento_descripcion;
    dataObject[inputNameEventoFechaInicial] = evento_fecha_inicial;
    dataObject[inputNameEventoFechaFinal] = evento_fecha_final;
    dataObject[inputNameEventoLatitud] = evento_latitud;
    dataObject[inputNameEventoLongitud] = evento_longitud;
    dataObject[inputNameEventoDireccion] = evento_direccion;
    dataObject[inputNameEventoCosto] = evento_costo;
    dataObject[inputNameEventoUsuarioId] =  evento_usuario_id;
    dataObject[inputNameEventoCategoriaId] = evento_categoria_id;
    dataObject[inputNameEventoFechaInicialPublicacion] = evento_fecha_inicial_publicacion;
    dataObject[inputNameEventoFechaFinalPublicacion] = evento_fecha_final_publicacion;

    var dataForm = new FormData();
    jQuery.each(dataObject, function(i, value) {
      dataForm.append(i, value);
    });

    jQuery.each(evento_imagen, function(i, value) {
      dataForm.append(inputNameEventoImagen, value);
    });
    
    $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        cache: false,
        contentType: false,
        processData: false,
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
                javascript:showStickySuccessToast(mesage);
              } else {
                javascript:showStickyErrorToast(mesage);
              }
        }
    });
  });
});
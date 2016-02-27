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
  
  $('#submit-patrocinador-form').click(function(){
    
    var url = $("#patrocinador-form").attr('action');
    
    var inputNameId = $('#patrocinador_id').attr('name');
    var inputNamePatrocinadorName = $('#patrocinador_name').attr('name'); 
    var inputNamePatrocinadorTelefono = $('#patrocinador_telefono').attr('name');
    var inputNamePatrocinadorCorreo = $('#patrocinador_correo').attr('name');
    var inputNamePatrocinadorDireccion = $('#patrocinador_direccion').attr('name');
    
    var patrocinador_id = $('#patrocinador_id').val(); 
    var patrocinador_name = $('#patrocinador_name').val();  
    var patrocinador_telefono = $('#patrocinador_telefono').val();     
    var patrocinador_correo = $('#patrocinador_correo').val();     
    var patrocinador_direccion = $('#patrocinador_direccion').val();
    
    var dataObject = {};
    dataObject[inputNamePatrocinadorName] = patrocinador_name;
    dataObject[inputNameId] = patrocinador_id;
    dataObject[inputNamePatrocinadorTelefono] = patrocinador_telefono;
    dataObject[inputNamePatrocinadorCorreo] = patrocinador_correo;
    dataObject[inputNamePatrocinadorDireccion] = patrocinador_direccion;
    
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
                javascript:showStickySuccessToast(mesage);
                console.log('hola');
              } else {
                javascript:showStickyErrorToast(mesage);
              }
        }
    });
  });
});
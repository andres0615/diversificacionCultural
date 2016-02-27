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
  
  $('#submit-organizacion-form').click(function(){
    
    var url = $("#organizacion-form").attr('action');
    
    var inputNameId = $('#organizacion_id').attr('name');
    var inputNameOrganizacionName = $('#organizacion_name').attr('name');
    var inputNameOrganizacionDireccion = $('#organizacion_direccion').attr('name');
    var inputNameOrganizacionTelefono = $('#organizacion_telefono').attr('name');
    var inputNameOrganizacionFax = $('#organizacion_fax').attr('name');
    var inputNameOrganizacionCorreo = $('#organizacion_correo').attr('name');
    var inputNameOrganizacionPaginaWeb = $('#organizacion_pagina_web').attr('name');
    
    var organizacion_id = $('#organizacion_id').val(); 
    var organizacion_name = $('#organizacion_name').val();     
    var organizacion_direccion = $('#organizacion_direccion').val();     
    var organizacion_telefono = $('#organizacion_telefono').val();     
    var organizacion_fax = $('#organizacion_fax').val();     
    var organizacion_correo = $('#organizacion_correo').val();     
    var organizacion_pagina_web = $('#organizacion_pagina_web').val();     
    
    var dataObject = {};
    
    dataObject[inputNameId] = organizacion_id;
    dataObject[inputNameOrganizacionName] = organizacion_name;
    dataObject[inputNameOrganizacionDireccion] = organizacion_direccion;
    dataObject[inputNameOrganizacionTelefono] = organizacion_telefono;
    dataObject[inputNameOrganizacionFax] = organizacion_fax;
    dataObject[inputNameOrganizacionCorreo] = organizacion_correo;
    dataObject[inputNameOrganizacionPaginaWeb] = organizacion_pagina_web;
    
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
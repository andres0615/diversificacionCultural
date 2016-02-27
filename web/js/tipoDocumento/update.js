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
  
  $('#submit-tipoDocumento-form').click(function(){
    
    var url = $("#tipoDocumento-form").attr('action');
    
    var inputNameId = $('#tipoDocumento_id').attr('name');
    var inputNameTipoDocumentoName = $('#tipoDocumento_name').attr('name'); 
    
    var tipoDocumento_id = $('#tipoDocumento_id').val(); 
    var tipoDocumento_name = $('#tipoDocumento_name').val();    
    
    var dataObject = {};
    dataObject[inputNameTipoDocumentoName] = tipoDocumento_name;
    dataObject[inputNameId] = tipoDocumento_id;
    
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
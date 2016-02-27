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
  
  $('#submit-localidad-form').click(function(){
    
    var url = $("#localidad-form").attr('action');
    
    var inputNameLocalidadName = $('#localidad_name').attr('name');
    var inputNameLocalidadId = $('#localidad_localidad_id').attr('name');
    
    var localidad_name = $('#localidad_name').val();    
    var localidad_localidad_id = $('#localidad_localidad_id').val();   
    
    var dataObject = {};
    dataObject[inputNameLocalidadName] = localidad_name;
    dataObject[inputNameLocalidadId] = localidad_localidad_id;
    
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
                javascript:showStickySuccessToast(mesage);
              } else {
                javascript:showStickyErrorToast(mesage);
              }
        }
    });
  });
});
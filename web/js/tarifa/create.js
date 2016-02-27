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
  
  $('#submit-tarifa-form').click(function(){
    
    var url = $("#tarifa-form").attr('action');
    
    var inputNameTarifaDescripcion = $('#tarifa_descripcion').attr('name');
    var inputNameTarifaValor = $('#tarifa_valor').attr('name');
    var inputNameTarifaActived = $('input[name=tarifa_actived]:checked', '#tarifa-form').data('name');
    
    var tarifa_descripcion = $('#tarifa_descripcion').val();     
    var tarifa_valor = $('#tarifa_valor').val();
    var tarifa_actived = $('input[name=tarifa_actived]:checked', '#tarifa-form').val();
    
    var dataObject = {};
    dataObject[inputNameTarifaDescripcion] = tarifa_descripcion;
    dataObject[inputNameTarifaValor] = tarifa_valor;
    dataObject[inputNameTarifaActived] = tarifa_actived;
    
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
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
  
  $('#submit-estadoPqrs-form').click(function(){
    
    var url = $("#estadoPqrs-form").attr('action');
    
    var inputNameEstadoPqrsName = $('#estadoPqrs_name').attr('name');
    var inputNameEstadoPqrsActived = $('input[name=estadoPqrs_actived]:checked', '#estadoPqrs-form').data('name');
    
    var estadoPqrs_name = $('#estadoPqrs_name').val();     
    var estadoPqrs_actived = $('input[name=estadoPqrs_actived]:checked', '#estadoPqrs-form').val();
    
    var dataObject = {};
    dataObject[inputNameEstadoPqrsName] = estadoPqrs_name;
    dataObject[inputNameEstadoPqrsActived] = estadoPqrs_actived;
    
    
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
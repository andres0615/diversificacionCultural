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
  
  $('#submit-tipoPqrs-form').click(function(){
    
    var url = $("#tipoPqrs-form").attr('action');
    
    var inputNameTipoPqrsName = $('#tipoPqrs_name').attr('name');
    var inputNameTipoPqrsActived = $('input[name=tipoPqrs_actived]:checked', '#tipoPqrs-form').data('name');
    
    var tipoPqrs_name = $('#tipoPqrs_name').val();     
    var tipoPqrs_actived = $('input[name=tipoPqrs_actived]:checked', '#tipoPqrs-form').val();
    
    var dataObject = {};
    dataObject[inputNameTipoPqrsName] = tipoPqrs_name;
    dataObject[inputNameTipoPqrsActived] = tipoPqrs_actived;
    
    
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
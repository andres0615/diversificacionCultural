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
    
    var inputNameId = $('#tipoPqrs_id').attr('name');
    var inputNameTipoPqrsName = $('#tipoPqrs_name').attr('name');
    var inputNameTipoPqrsActived = $('input[name=tipoPqrs_actived]:checked', '#tipoPqrs-form').data('name');  
    
    var tipoPqrs_id = $('#tipoPqrs_id').val(); 
    var tipoPqrs_name = $('#tipoPqrs_name').val();     
    var tipoPqrs_actived = $('input[name=tipoPqrs_actived]:checked', '#tipoPqrs-form').val();
    
    var dataObject = {};
    dataObject[inputNameTipoPqrsName] = tipoPqrs_name;
    dataObject[inputNameTipoPqrsActived] = tipoPqrs_actived;
    dataObject[inputNameId] = tipoPqrs_id;
    
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
$(document).ready(function(){  
  
  function showErrorToast() {
      $().toastmessage('showErrorToast', "Error Dialog which is fading away ...");
  }
  
  function showStickyErrorToast(mensaje) {
      $('#mensaje').toastmessage('showToast', {
          text     : mensaje,
          sticky   : true,
          position : '',
          type     : 'error',
          closeText: '',
          close    : function () {
              console.log("toast is closed ...");
          }
      });
  }
  
  $('#submit_login').click(function(){
    
    var url = $("#login-form").attr('action');
    
    var username = $('#user_name').val();
    
    var userpassword = $('#user_password').val();
    
//    console.log(url);
//    console.log(username);
//    console.log(userpassword);
    
    $.ajax({
        type: "POST",
        url: url,
        data: {user_name: username, user_password: userpassword},
        success: function(data) {
//            $('#content').fadeIn(1000).html(data);
              console.log(data);
              var myarr = data.split("¬");
              var logued = myarr[0];
              
              if (logued === "true") {
                console.log(myarr[1]);
                window.location = myarr[1];
              } else {
                console.log(myarr[0]);
                javascript:showStickyErrorToast(myarr[1]);
              }
        }
    });
  });
});
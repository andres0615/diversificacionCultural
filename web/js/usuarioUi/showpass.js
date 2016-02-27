$(document).ready(function(){
  $('#perfil-frame').on("cambio-frame", function(){

    $('#show-password').on("click", function(){
      if( $('#show-password').prop('checked') == true ) {
        $('.usuario-ui-pass').attr('type', 'text');
        //$('#user_confirm_password').attr('type', 'text');
      } else {
        $('.usuario-ui-pass').attr('type', 'password');
        //$('#user_confirm_password').attr('type', 'password');
      }
    });
  });
});
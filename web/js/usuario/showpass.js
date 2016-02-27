$(document).ready(function(){
  $('#show-password').click(function(){
    if( $('#show-password').prop('checked') == true ) {
      $('.usuario-ui-pass').attr('type', 'text');
      //$('#user_confirm_password').attr('type', 'text');
    } else {
      $('.usuario-ui-pass').attr('type', 'password');
      //$('#user_confirm_password').attr('type', 'password');
    }        
  });
});
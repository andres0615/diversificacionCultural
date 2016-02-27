$(document).ready(function(){
  $('#show-password').click(function(){
    if( $('#show-password').prop('checked') == true ) {
      $('#user_password').attr('type', 'text');
      $('#user_confirm_password').attr('type', 'text');
    } else {
      $('#user_password').attr('type', 'password');
      $('#user_confirm_password').attr('type', 'password');
    }        
  });
});
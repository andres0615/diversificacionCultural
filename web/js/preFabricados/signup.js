$(document).ready(function(){
  $('#show-password').click(function(){
    if( $('#show-password').prop('checked') == true ) {
      $('.password-input').attr('type', 'text');
    } else {
      $('.password-input').attr('type', 'password');
    }
  });
});
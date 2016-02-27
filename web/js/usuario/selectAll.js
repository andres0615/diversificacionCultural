$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
//    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-user-chk').attr('checked', true);
    } else {
      $('.item-user-chk').attr('checked', false);
    }   
    
  });
});
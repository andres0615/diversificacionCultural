$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-localidad-chk').attr('checked', true);
    } else {
      $('.item-localidad-chk').attr('checked', false);
    }   
    
  });
});
$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-organizacion-chk').attr('checked', true);
    } else {
      $('.item-organizacion-chk').attr('checked', false);
    }   
    
  });
});
$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-tipoPqrs-chk').attr('checked', true);
    } else {
      $('.item-tipoPqrs-chk').attr('checked', false);
    }   
    
  });
});
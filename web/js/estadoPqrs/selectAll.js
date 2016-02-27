$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-estadoPqrs-chk').attr('checked', true);
    } else {
      $('.item-estadoPqrs-chk').attr('checked', false);
    }   
    
  });
});
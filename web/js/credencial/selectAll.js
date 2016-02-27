$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-credencial-chk').attr('checked', true);
    } else {
      $('.item-credencial-chk').attr('checked', false);
    }   
    
  });
});
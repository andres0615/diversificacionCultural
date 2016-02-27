$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-patrocinador-chk').attr('checked', true);
    } else {
      $('.item-patrocinador-chk').attr('checked', false);
    }   
    
  });
});
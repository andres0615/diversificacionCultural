$(document).ready(function(){
  
  $('#data-table-contenedor').on('click', '#chkAll', function(){   
    
    console.log($('#chkAll').prop('checked'));
    
    if ($('#chkAll').prop('checked') == true) {
      $('.item-tipoDocumento-chk').attr('checked', true);
    } else {
      $('.item-tipoDocumento-chk').attr('checked', false);
    }   
    
  });
});
function abrir_dialog() {
$( "#dialog" ).dialog({
      modal: true,
      buttons: {
          "Si": function() {
              $( this ).dialog( "close" );
              console.log('si');
          },
          Cancel: function() {
              $( this ).dialog( "close" );
              console.log('no');
          }
      }
  });
};

$(document).ready(function(){
    $('.user-delete').click(function(e){
      e.preventDefault();
      abrir_dialog();
    });
});
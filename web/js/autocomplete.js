$(document).ready(function(){ 
  
  function getAutocompleteData(input) {
    

    var datos = null;
    
    var table_source = input.data('source');
    var id_column = input.data('id');
    var visible_column = input.data('column');
    var url = input.data('url');
    var column_value = input[0].value;
    
    var data = {
      table: table_source, 
      id : id_column, 
      column : visible_column,
      columnvalue : column_value
    };
    
    $.ajax({
      type: "POST",
      url: url,
      dataType: 'html',
      data: {data : data},
      async: false,
      success: function(data) {
        
        console.log(data);
        
          datos = jQuery.parseJSON(data);   
              
      },
      error: function(){
        console.log('error');
      },
      timeout: 10000
      }); 
      
      return datos;  
    
  }
  
  function productoFoco(event, ui)
  {
      var producto = ui.item.value;

      // no quiero que jquery despliegue el texto del control porque 
      // no puede manejar objetos, asi que escribimos los datos 
      // nosotros y cancelamos el evento
      // (intenta comentando este codigo para ver a que me refiero)
      $(".tags").val(producto.descripcion1);
      event.preventDefault();
  }
  
  $('.tags').autocomplete({    
    source: function(term, suggest) {
      
      var elemen = $($(this)[0].bindings[0]);  
      
      var suggestions = getAutocompleteData(elemen);
      
      suggest(suggestions);
    },
    minLength: 1,
    select: function(event, ui) {
      var producto = ui.item.value;

      var descripcion = producto.descripcion1;
      
      var elemen = $(this);
      
      var elemen_id_value = elemen.data('input-id');
      
      $("#" + elemen_id_value).val(descripcion);
      elemen.val(ui.item.label);
      event.preventDefault();
      
      var img = elemen.next().next();
      var img_def = elemen.next().next().next().next();

      var table = elemen.data('source');
      
      $(img).attr('id', table + '-img');
      
      $(img).css('display', 'block');
      $(img_def).css('display', 'none');
      
    }
    
    /*,
    focus: productoFoco*/
  });
  
  $('.autocomplete-img').click(function(){
    var img = $(this);
    var input = img.prev().prev();
    var input_id = img.next();
    var img_def = img.next().next();

    img.css('display', 'none');
    input.val('');
    input_id.val('');
    img_def.css('display', 'block');
    
  });
  
});
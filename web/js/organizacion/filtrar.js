$(document).ready(function(){
  
  $('#filtrar').click(function(e){
    
    e.preventDefault();
    
    var url = $('#filtrar').attr('href');
    
    var organizacionNombre = $('#organizacion-nombre').val();
    var organizacionFechaInicial = $('#organizacion-fechainicial').val();
    var organizacionFechaFinal = $('#organizacion-fechafinal').val();

    var filterArray = {};
    
    filterArray['organizacionNombre'] = organizacionNombre;
    filterArray['organizacionFechaInicial'] = organizacionFechaInicial;
    filterArray['organizacionFechaFinal'] = organizacionFechaFinal;
    
    

    var filter = {};
    
    filter['filter'] = filterArray;
    
    
    console.log(filter);
    
    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#data-table').height() + 28;
    $('#data-table').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
    
    $.ajax({
          type: "POST",
          url: url,
          data: filter,              
          success: function(data) {
            $("#data-table-contenedor").html(data).fadeIn(1000);
            $('ul.pagination > li.active').removeClass('npage');
            $('ul.pagination > li.disabled').removeClass('npage');
            $('ul.pagination > li > a').click(function(e){
              e.preventDefault();              
            });
          },
          error: function(){
            console.log('error');
          },
          timeout: 10000
      });     
    
  }); 
});
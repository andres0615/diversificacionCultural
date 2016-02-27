$(document).ready(function(){
  
  $('#filtrar').click(function(e){
    
    e.preventDefault();
    
    var url = $('#filtrar').attr('href');
    
    var usuarioNombre = $('#usuario-nombre').val();
    var usuarioFechaInicial = $('#usuario-fechainicial').val();
    var usuarioFechaFinal = $('#usuario-fechafinal').val();
    
  //console.log(usuarioNombre);
    
//    var filterArray = new Array();
    
//    filterArray['usuarioNombre'] = usuarioNombre;
//    filterArray['usuarioFechaInicial'] = usuarioFechaInicial;
//    filterArray['usuarioFechaFinal'] = usuarioFechaFinal;
    
    //console.log(filterArray['usuarioNombre']);
    //console.log(filterArray);
    
//    console.log(filterArray);
    
//    var filter = JSON.stringify(filterArray);

    var filterArray = {};
    
    filterArray['usuarioNombre'] = usuarioNombre;
    filterArray['usuarioFechaInicial'] = usuarioFechaInicial;
    filterArray['usuarioFechaFinal'] = usuarioFechaFinal;
    
    

    var filter = {};
//    filter['filter'] = filterArray;
    
    filter['filter'] = filterArray;
    
    
    console.log(filter);
    
    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#data-table').height() + 28;
    $('#data-table').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
//    console.log(heightLoader - (heightImg/2));  
    
//    console.log(filter['usuarioNombre']);
    
    //console.log(filter);
    
    $.ajax({
          type: "POST",
          url: url,
          data: filter,              
          success: function(data) {
//              $('#content').fadeIn(1000).html(data);
//              $(document).html(data);
//            console.log(data);
//            $('#box-cont').fadeIn('1000', function(){
//              $(this).html(data);
//            });
//            $('#box-cont').fadeIn('1000').html(data);
//            console.log(data);

            //alert(data);
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
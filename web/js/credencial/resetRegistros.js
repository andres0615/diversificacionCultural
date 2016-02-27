function resetRegistros(mesage) {
  
  $(document).ready(function(){
    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#data-table').height() + 28;
    $('#data-table').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
    console.log(heightLoader - (heightImg/2));

    var urlPaginador = $('ul.pagination > li.active > a').data('paginador');
    var page = $('ul.pagination > li.active > a').text();
    var sincePage = $('ul.pagination > li > a').eq(1).text();

    $.ajax({
        type: "POST",
        url: urlPaginador,
        data: {page:page, sincePage:sincePage},
        success: function(data) {
          $("#data-table-contenedor").html(data).fadeIn(1000);
          $('ul.pagination > li.active').removeClass('npage');
          $('ul.pagination > li.disabled').removeClass('npage');
          $('ul.pagination > li > a').click(function(e){
            e.preventDefault();              
          });
          
          javascript:showStickySuccessToast(mesage);
          
        },
        error: function(){
          console.log('error');
        },
        timeout: 10000
    }); 
    
  });
  
}
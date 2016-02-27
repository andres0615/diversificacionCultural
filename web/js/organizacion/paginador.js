$(document).ready(function(){
  
  var elemen_last_page = $('.next').prev().find('a');
  var last_page = elemen_last_page.data('page');
  
  if (last_page == 1) {
    elemen_last_page.parent('.npage').next().removeClass('npage');
  }
  
  $('#data-table-contenedor').on('click', '#paginador-contenedor a', function(e){
    e.preventDefault();
  });
  
  $('#data-table-contenedor').on('click', 'ul.pagination > li.npage > a', function(e){
    
      e.preventDefault();
        var heightImg = $('#loaderGif > img').height();
        var heightLoader = $('#data-table').height() + 28;
        $('#data-table').hide();
        $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
        $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
        console.log(heightLoader - (heightImg/2));        

      var actualPage = $('ul.pagination > li.active > a').data('page');
      var page = $(this).data('page');
      var urlPaginador = $(this).data('paginador');
      var direction = $(this).data('direction');
      var sincePage = $(this).data('sincepage');
     
      if (direction === 'right') {
        page = actualPage + 1;
      } else if (direction === 'left') {
        page = actualPage - 1;
      }      


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
          },
          error: function(){
            console.log('error');
          },
          timeout: 10000
      });      
  });  
});

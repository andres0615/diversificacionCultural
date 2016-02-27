$(document).ready(function(){
  
  $('#delete-filters').click(function(e){
    
    e.preventDefault();
    
    var url = $('#delete-filters').attr('href');
    
    var heightImg = $('#loaderGif > img').height();
    var heightLoader = $('#data-table').height() + 28;
    $('#data-table').hide();
    $('#loaderGif').css({'height' : heightLoader, 'display' : 'block', 'position' : 'relative'});        
    $('#loaderGif > img').css({'position' : 'absolute', 'top' : (heightLoader/2) - (heightImg/2)});
    
      $.ajax({
        type: "POST",
        url: url,
        data: {borrarFiltros : true},              
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
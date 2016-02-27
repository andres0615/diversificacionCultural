$(document).ready(function(){

  function showStickySuccessToast(mesage) {
    $('#mensaje').toastmessage('showToast', {
      text     : mesage,
      sticky   : true,
      position : 'top-right',
      type     : 'success',
      closeText: '',
      close    : function () {
        console.log("toast is closed ...");
      }
    });

  }

  function showStickyErrorToast(mesage) {
    $('#mensaje').toastmessage('showToast', {
      text     : mesage,
      sticky   : true,
      position : '',
      type     : 'error',
      closeText: '',
      close    : function () {
        console.log("toast is closed ...");
      }
    });
  }

  $('#next-step1').click(function(e){
    e.preventDefault();

    var url = $(this).prop('href');

    var dataObject = {};
    dataObject['php-version'] = $('#php-version').text();
    dataObject['php-version-required'] = $('#php-version-required').text();
    dataObject["step"] = 2;
    dataObject["url"] = $(this).prop('href');

    $.ajax({
      type: "POST",
      url: url,
      data: dataObject,
      success: function(data) {

        var arr = data.split("¬");

        if(arr[0] == "true") {

          var dataRedirect = {};
          dataRedirect["step"] = 3;

          $(document).redirectPost(url, dataRedirect);

        } else if (arr[0] == "false") {
          javascript:showStickyErrorToast(arr[1]);
        }

      }
    });

  });

  $('#next-step2').click(function(e){
    e.preventDefault();

    var url = $('#step2-form').prop('action');

    var dataObject = {};

    dataObject["step"] = 4;

    dataObject[$('#bd_host').attr('name')] = $('#bd_host').val();
    dataObject[$('#bd_driver').attr('name')] = $('#bd_driver').val();
    dataObject[$('#bd_port').attr('name')] = $('#bd_port').val();
    dataObject[$('#bd_name').attr('name')] = $('#bd_name').val();
    dataObject[$('#bd_user').attr('name')] = $('#bd_user').val();
    dataObject[$('#bd_backup').attr('name')] = $('#bd_backup').val();
    dataObject[$('#bd_password').attr('name')] = $('#bd_password').val();
    dataObject[$('#bd_backup').attr('name')] = $('#bd_backup')[0].files;

    var dataForm = new FormData();
    jQuery.each(dataObject, function(i, value) {
      dataForm.append(i, value);
    });

    jQuery.each( $('#bd_backup')[0].files, function(i, value) {
      dataForm.append($('#bd_backup').attr('name'), value);
    });

    //console.log(dataForm);

    $.ajax({
      type : "POST",
      url: url,
      data: dataForm,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        //console.log(data);

        var arr = data.split("¬");

        if(arr[0] == "true") {

          var dataRedirect = {};
          dataRedirect["step"] = 5;

          javascript:showStickySuccessToast(arr[1]);

          setTimeout(function(){
            $(document).redirectPost(url, dataRedirect);
          }, 2000);

          //$(document).redirectPost(url, dataRedirect);

        } else if (arr[0] == "false") {
          javascript:showStickyErrorToast(arr[1]);
        }

      }
    });

  });

  $("#next-step3").click(function(e){
    e.preventDefault();

    var url = $('#step3-form').prop('action');

    var dataObject = {};

    dataObject["step"] = 6;
    dataObject["usuario_genero"] = "";

    var dataForm = new FormData();

    jQuery.each( dataObject, function(i, value) {
      dataForm.append(i, value);
    });

    jQuery.each( $('#step3-form').serializeArray(), function(i, val) {
      dataForm.append(val.name, val.value);
    });

    $.ajax({
      type : "POST",
      url: url,
      data: dataForm,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        //console.log(data);

        var arr = data.split("¬");

        if(arr[0] == "true") {

          var dataRedirect = {};
          dataRedirect["step"] = 7;

          javascript:showStickySuccessToast(arr[1]);

          setTimeout(function(){
            $(document).redirectPost(url, dataRedirect);
          }, 2000);

        } else if (arr[0] == "false") {
          javascript:showStickyErrorToast(arr[1]);
        }

      }
    });

  });

  $("#next-step4").click(function(e){
    e.preventDefault();

    var url = $('#step4-form').prop('action');

    var dataObject = {};

    dataObject["step"] = 8;

    var dataForm = new FormData();
    jQuery.each( $('#step4-form').serializeArray(), function(i, val) {
      dataForm.append(val.name, val.value);
    });

    jQuery.each( dataObject, function(i, value) {
      dataForm.append(i, value);
    });

    $.ajax({
      type : "POST",
      url: url,
      data: dataForm,
      cache: false,
      contentType: false,
      processData: false,
      success: function(data) {
        //console.log(data);

        var arr = data.split("¬");

        if(arr[0] == "true") {

          /*var dataRedirect = {};
          dataRedirect["step"] = 7;*/

          javascript:showStickySuccessToast(arr[1]);

          //$(document).redirectPost(url, dataRedirect);

          $(document).redirection(url);

        } else if (arr[0] == "false") {
          javascript:showStickyErrorToast(arr[1]);
        }

      }
    });

  });

  $('#show-password-step3').click(function(){
    if ($(this).prop('checked') == true) {
      $('#usuario_password').attr('type', 'text');
    } else {
      $('#usuario_password').attr('type', 'password');
    }

  });

  $('#show-password-step2').click(function(){
    if ($(this).prop('checked') == true) {
      $('#bd_password').attr('type', 'text');
    } else {
      $('#bd_password').attr('type', 'password');
    }

  });

  $.fn.redirectPost = function(url, args) {
    var form = '';
    $.each( args, function( key, value ) {
      form += '<input type="hidden" name="'+key+'" value="'+value+'">';
    });
    $('<form action="'+url+'" method="POST">'+form+'</form>').css('display', 'none').appendTo('body').submit();
  }

  $.fn.redirection = function(url) {
    setTimeout(function(){
      window.location = url;
    }, 2000);
  }

});
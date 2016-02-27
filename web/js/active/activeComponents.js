$(document).ready(function(){
  $('.fileinput').fileinput({
    showUpload: false
  });

  /*$("#evento-imagen").uploadFile({
    url:$(this).parents("form:first").prop("action"),
    fileName:"evento-imagen",
    autoSubmit: false,
    returnTYpe: "json",
    showProgress: false,
    showCancel: false,
    onSuccess: function(files,data,xhr,pd) {
      console.log(data);
    }
  });*/

});
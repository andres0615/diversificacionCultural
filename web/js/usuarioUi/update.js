$(document).ready(function(){
  /*$('#show-password').click(function(){
    if( $('#show-password').prop('checked') == true ) {
      $('#user_password').attr('type', 'text');
      $('#user_confirm_password').attr('type', 'text');
    } else {
      $('#user_password').attr('type', 'password');
      $('#user_confirm_password').attr('type', 'password');
    }
  });*/

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

  $('#perfil-frame').on("cambio-frame", function(){
    $('#submit-user-ui-form').on( "click" , function(){

      var url = $("#user-ui-form").attr('action');

      var inputNameDatoUserFirstName = $('#user_first_name').attr('name');
      var inputNameDatoUserLastName = $('#user_last_name').attr('name');
      var inputNameDatoUserEmail = $('#user_email').attr('name');
      var inputNameDatoUserGenero = $('input[name=user_genero]:checked', '#user-ui-form').data('name');
      var inputNameDatoUserFechaNacimiento = $('#user_fecha_nacimiento').attr('name');
      var inputNameDatoUserLocalidadId = $('#dato_usuario_localidad_id').attr('name');
      var inputNameDatoUserTipoDocumentoId = $('#datoUsuario_tipoDocumento_id').attr('name');
      var inputNameDatoUserOrganizacionId = $('#datoUsuario_organizacion_id').attr('name');

      var inputNameUserId = $('#user_id').attr('name');
      var inputNameUserName = $('#user_name').attr('name');
      var inputNamePassword = $('#user_password').attr('name');
      var inputNameConfirmPassword = $('#user_confirm_password').attr('name');

      var dato_user_first_name = $('#user_first_name').val();
      var dato_user_last_name = $('#user_last_name').val();
      var dato_user_email = $('#user_email').val();
      var dato_user_genero = $('input[name=user_genero]:checked', '#user-ui-form').val();
      var dato_user_fecha_nacimiento = $('#user_fecha_nacimiento').val();
      var dato_usuario_localidad_id = $('#dato_usuario_localidad_id').val();
      var datoUsuario_tipoDocumento_id = $('#datoUsuario_tipoDocumento_id').val();
      var datoUsuario_organziacion_id = $('#datoUsuario_organizacion_id').val();

      var user_id = $('#user_id').val();
      var user_name = $('#user_name').val();
      var user_password = $('#user_password').val();
      var user_confirm_password = $('#user_confirm_password').val();

      var dataObject = {};

      dataObject[inputNameDatoUserFirstName] = dato_user_first_name;
      dataObject[inputNameDatoUserLastName] = dato_user_last_name;
      dataObject[inputNameDatoUserEmail] = dato_user_email;
      dataObject[inputNameDatoUserGenero] = dato_user_genero;
      dataObject[inputNameDatoUserFechaNacimiento] = dato_user_fecha_nacimiento;
      dataObject[inputNameDatoUserLocalidadId] = dato_usuario_localidad_id;
      dataObject[inputNameDatoUserTipoDocumentoId] = datoUsuario_tipoDocumento_id;
      dataObject[inputNameDatoUserOrganizacionId] = datoUsuario_organziacion_id;

      dataObject[inputNameUserId] = user_id;
      dataObject[inputNameUserName] = user_name;
      dataObject[inputNamePassword] = user_password;
      dataObject[inputNameConfirmPassword] = user_confirm_password;

      $.ajax({
        type: "POST",
        url: url,
        data: dataObject,
        success: function(data) {

          var myarr = data.split("¬");
          var mesage = myarr[0];


          if (typeof(myarr[1]) != "undefined") {
            var flag = "true";
          } else {
            var flag = "false";
          }

          if (flag === "true") {
            javascript:showStickySuccessToast(mesage);
            console.log('hola');
          } else {
            javascript:showStickyErrorToast(mesage);
          }
        }
      });
    });
  });

});
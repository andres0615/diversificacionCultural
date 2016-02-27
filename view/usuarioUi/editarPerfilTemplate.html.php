<?php use mvc\routing\routingClass as routing; ?>
<div class="usuario-item2">
  <form action="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'update') ?>" method="POST" id="user-ui-form">
    <input type="hidden" id="user_id" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID,true) ?>" value="<?php echo $usuario_id; ?>" />
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <h4 class="title1" ><?php echo $nombre_ui; ?></h4>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
      Nombres:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" id="user_first_name" class="form-control" value="<?php echo $nombre; ?>" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" >
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
      Apellidos:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" id="user_last_name" class="form-control" value="<?php echo $apellido; ?>" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" >
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
      Correo:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" id="user_email" class="form-control" id="usr" value="<?php echo $correo; ?>" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" >
      </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
      Login:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" class="form-control" id="user_name" value="<?php echo $nombre_usuario; ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" disabled >
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
      Genero:
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
      <div class="dato-usuarioui" >Masculino</div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6" style="text-align:center;" >
      <input type="radio" name="user_genero" data-name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" <?php echo ($genero === false)? 'checked="true"' : '' ?> />
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
      <div class="dato-usuarioui" >Femenino</div>
    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6" style="text-align:center;" >
      <input type="radio" name="user_genero" data-name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" <?php echo ($genero === true)? 'checked="true"' : '' ?> />
    </div>
    <div class="col-lg-2 col-md- col-sm-6 col-xs-6" >
      Nacimiento:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" >
      <div class="form-group">
        <input type="text" id="user_fecha_nacimiento" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" value="<?php echo $fecha_nacimiento; ?>" class="form-control datepicker1" />
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
      Ubicacion:
    </div>
    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" class="tags2 form-control" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="localidad" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="dato_usuario_localidad_id" value="<?php echo $localidad_nombre; ?>" />
        <input type="hidden" id="dato_usuario_localidad_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>" value="<?php echo $localidad_id; ?>" />
        <div style="width: 100%; position: absolute;" >
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/list-input.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'none' : 'block' ; ?>;" class="autocomplete-img-def" title="Campo de autobusqueda"  />
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'block' : 'none' ; ?>; " class="autocomplete-img2"  />
        </div>
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
      Tipo de documento:
    </div>
    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" class="tags2 form-control" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" placeholder="Tipo de documento" class="login" data-id="ID" data-column="NOMBRE" data-source="tipoDocumento" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="datoUsuario_tipoDocumento_id" value="<?php echo $tipo_documento_nombre; ?>" />
        <input type="hidden" id="datoUsuario_tipoDocumento_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" value="<?php echo $tipo_documento_id; ?>" />
        <div style="width: 100%; position: absolute;" >
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/list-input.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($tipo_documento_id)) > 0)? 'none' : 'block' ; ?>;" class="autocomplete-img-def" title="Campo de autobusqueda"  />
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($tipo_documento_id)) > 0)? 'block' : 'none' ; ?>; " class="autocomplete-img2"  />
        </div>
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
      Organización:
    </div>
    <div class="col-lg-9 col-md-8 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="text" class="tags2 form-control" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" placeholder="Organizacion" class="login" data-id="ID" data-column="NOMBRE" data-source="organizacion" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="datoUsuario_organizacion_id" value="<?php echo $organizacion_nombre; ?>" />
        <input type="hidden" id="datoUsuario_organizacion_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" value="<?php echo $organizacion_id; ?>" />
        <div style="width: 100%; position: absolute;" >
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/list-input.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($organizacion_id)) > 0)? 'none' : 'block' ; ?>;" class="autocomplete-img-def" title="Campo de autobusqueda"  />
          <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 1.8em; position: relative; top: -1.95em; left: -2.4em; float:right; display: <?php echo (strlen(trim($organizacion_id)) > 0)? 'block' : 'none' ; ?>; " class="autocomplete-img2"  />
        </div>
      </div>
    </div>
  </div>
  <div class="row usuario-item3">
    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
      Contraseña:
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="password" id="user_password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" placeholder="Contraseña" class="form-control usuario-ui-pass"/>
      </div>
    </div>
    <div class="col-lg-1 col-md-6 col-sm-6 col-xs-6">
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
      <div class="form-group">
        <input type="password" id="user_confirm_password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" placeholder="Confirmar contraseña" class="form-control usuario-ui-pass"/>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">

    </div>
    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
      <input id="show-password" name="Field" type="checkbox" class="field login-checkbox" style="display: inline-block" />
    </div>
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
      <label class="choice" for="Field" style="display: inline-block; font-size: 1em;">Mostrar contraseña.</label>
    </div>
  </div>
  </form>
  <div class="row">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">

    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
      <button class="button btn btn-info" style="width: 100%;" id="submit-user-ui-form" >Actualizar</button>
    </div>
  </div>
</div>
<br />
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="mensaje" style="position:relative;margin: 0 auto; text-align: center;" >

    </div>
  </div>
</div>
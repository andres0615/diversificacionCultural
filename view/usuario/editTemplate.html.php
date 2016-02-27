<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing;?>

<?php $usuarioNombre = 'nombre' ?>
<?php $usuarioApellido = 'apellido' ?>
<?php $usuarioCorreo = 'correo' ?>
<?php $usuarioGenero = 'genero' ?>
<?php $usuarioFechaNacimiento = 'fecha_nacimiento' ?>
<?php $usuarioLocalidadId = 'localidad_id' ?>
<?php $usuarioLocalidadNombre = 'localidad_nombre' ?>
<?php $usuarioTipoDocumentoId = 'tipo_documento_id' ?>
<?php $usuarioTipoDocumentoNombre = 'tipo_documento_nombre' ?>
<?php $usuarioOrganizacionId = 'organizacion_id' ?>
<?php $usuarioOrganizacionNombre = 'organizacion_nombre' ?>

<?php $usu = usuarioTableClass::USER ?>
<?php $id = usuarioTableClass::ID ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">          
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">          
          <div class="account-container register ">

            <div class="content clearfix">

                <div class="login-fields">
                  
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                      <h1>Editar Usuario</h1>	
                    </div>
                  </div>
                  
                  <form action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'update') ; ?>" method="POST" id="user-form">
                  
                  <div class="row">
                    
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                    <!--  <p>Create your free account:</p>-->

                    <input type="hidden" id="user_id" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID,true) ?>" value="<?php echo $objUsuario[0]->$id ?>" />

                    <div class="field">
                      <p style="font-size: 1.2em" >Nombres :</p>                    
                      <input type="text" id="user_first_name" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true) ?>" placeholder="Nombres" class="login" value="<?php echo $objDatosUsuario->$usuarioNombre ?>" />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Apellidos :</p>                    
                      <input type="text" id="user_last_name" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true) ?>" placeholder="Apellidos" class="login" value="<?php echo $objDatosUsuario->$usuarioApellido ?>" />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Correo :</p>                    
                      <input type="text" id="user_email" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true) ?>" placeholder="Correo electronico" class="login" value="<?php echo $objDatosUsuario->$usuarioCorreo ?>" />
                    </div> <!-- /field -->

                    <div class="field input-radio-div">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <p style="font-size: 1.2em" >Genero :</p>
                        </div>
                      </div>
                      
                      <div class="row inputs">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <label class="radio inline" >
                            Masculino
                          </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="radio" name="user_genero" data-name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" value="f" <?php echo ($objDatosUsuario->$usuarioGenero === false)? 'checked="true"' : '' ?> >
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <label class="radio inline" >
                            Femenino
                           </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="radio" name="user_genero" data-name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true) ?>" value="t" <?php echo ($objDatosUsuario->$usuarioGenero === true)? 'checked="true"' : '' ?> >
                        </div>
                      </div>
                    </div> <!-- /field -->

                    <div class="field admin-item1">
                      <p style="font-size: 1.2em" >Fecha de nacimiento :</p>                    
                      <input type="text" id="user_fecha_nacimiento" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true) ?>" placeholder="Fecha de nacimiento" class="login datepicker1" value="<?php echo $objDatosUsuario->$usuarioFechaNacimiento ?>" />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Localidad:</p>
                      <input type="text" class="tags" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true); ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="localidad" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete'); ?>" data-input-id="dato_usuario_localidad_id" value="<?php echo $objDatosUsuario->$usuarioLocalidadNombre; ?>" />
                      <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png'); ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: <?php echo (strlen(trim($objDatosUsuario->$usuarioLocalidadId)) > 0) ? 'block' : 'none' ?>;" class="autocomplete-img"  />
                      <input type="hidden" id="dato_usuario_localidad_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true) ?>" value="<?php echo $objDatosUsuario->$usuarioLocalidadId ?>"/>
                    </div> <!-- /field -->
                  
                  </div>
                    
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                  
                    <div class="field">
                      <p style="font-size: 1.2em" >Tipo documento:</p>
                      <input type="text" class="tags" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="tipoDocumento" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="datoUsuario_tipoDocumento_id" value="<?php echo $objDatosUsuario->$usuarioTipoDocumentoNombre ?>" />
                      <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: <?php echo (strlen(trim($objDatosUsuario->$usuarioTipoDocumentoId)) > 0) ? 'block' : 'none' ?>;" class="autocomplete-img"  />
                      <input type="hidden" id="datoUsuario_tipoDocumento_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true) ?>" value="<?php echo $objDatosUsuario->$usuarioTipoDocumentoId ?>" />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Organización:</p>
                      <input type="text" class="tags" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="organizacion" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="datoUsuario_organizacion_id" value="<?php echo $objDatosUsuario->$usuarioOrganizacionNombre ?>" />
                      <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: <?php echo (strlen(trim($objDatosUsuario->$usuarioOrganizacionId)) > 0) ? 'block' : 'none' ?>;" class="autocomplete-img"  />
                      <input type="hidden" id="datoUsuario_organizacion_id" name="<?php echo datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true) ?>" value="<?php echo $objDatosUsuario->$usuarioOrganizacionId ?>" />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Usuario:</p>
                      <label for="firstname">Usuario:</label>
                      <input type="text" id="user_name" value="<?php echo $objUsuario[0]->$usu ?>" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" placeholder="Nombre de usuario" class="login" disabled />
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Contraseña:</p>
                      <label for="password">Password:</label>
                      <input type="password" id="user_password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" placeholder="Contraseña" class="login"/>
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Confirmar Contraseña:</p>
                      <label for="confirm_password">Confirm Password:</label>
                      <input type="password" id="user_confirm_password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" placeholder="Confirmar Contraseña" class="login"/>
                    </div> <!-- /field -->
                    
                    <div class="login-actions">

                      <span class="login-checkbox admin-item1">
                        <input id="show-password" name="Field" type="checkbox" class="field login-checkbox" style="display: inline-block" />
                        <label class="choice" for="Field" style="display: inline-block; font-size: 1em;">Mostrar contraseña.</label>
                      </span>



                      <!--<button class="button btn btn-primary btn-large" id="" >Register</button>-->
                      <!--<input type="submit" class="button btn btn-primary btn-large" value="Register" />-->

                    </div> <!-- .actions -->
                    
                  </div>

                </div> <!-- /login-fields -->

              </form>
                  
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="admin-item1" style="text-align: right;" >
                    <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('admin', 'admin') ?>" >Volver</a>
                    <button class="button btn btn-success" id="submit-user-form" >Actualizar</button>
                  </div>
                </div>
              </div>    
              <br />              
              </div>              
              
            </div> <!-- /content -->

          </div> <!-- /account-container -->
          
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="mensaje" style="position:relative;/*width: 50%*/;margin: 0 auto; text-align: center;" >

              </div>
            </div>
          </div>
          
        </div>
        </div>
      </div>
    </div>        
    </div>    
  </div>
<?php view::includePartial('partials/footer.html') ?>
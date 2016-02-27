<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>

<?php $nombre = eventoTableClass::NOMBRE; ?>
<?php $id = eventoTableClass::ID; ?>

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
                        <h1>Crear Evento</h1>
                      </div>
                    </div>

                    <form action="<?php echo routing::getInstance()->getUrlWeb('eventos', 'createEventoUi') ?>" method="POST" id="evento-form" enctype="multipart/form-data" >

                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                          <div class="field">
                            <p style="font-size: 1.2em" >Nombre :</p>
                            <input type="text" id="evento_nombre" name="<?php echo eventoTableClass::getNameField(eventoTableClass::NOMBRE, true) ?>" placeholder="Nombres" class="login" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Descripción:</p>
                            <textarea id="evento_descripcion" name="<?php echo eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true) ?>" class="login" style="width: 100%; max-width: 100%; min-height: 4em; font-size: 1.4em; color: #8e8d8d;" placeholder="Descripcion del evento" maxlength="1024" ></textarea>
                          </div> <!-- /field -->

                          <div class="field admin-item1">
                            <p style="font-size: 1.2em" >Fecha inicial del evento :</p>
                            <input type="text" id="evento_fecha_inicial" name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true) ?>" placeholder="Fecha de inicio del evento" class="login datepicker1" />
                          </div> <!-- /field -->

                          <div class="field admin-item1">
                            <p style="font-size: 1.2em" >Fecha final del evento :</p>
                            <input type="text" id="evento_fecha_final" name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true) ?>" placeholder="Fecha de finalizacion del evento" class="login datepicker1" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Lugar latitud  :</p>
                            <input type="text" id="evento_latitud" name="<?php echo eventoTableClass::getNameField(eventoTableClass::LUGAR_LATITUD, true) ?>" placeholder="latitud" class="login" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Lugar longitud  :</p>
                            <input type="text" id="evento_longitud" name="<?php echo eventoTableClass::getNameField(eventoTableClass::LUGAR_LONGITUD, true) ?>" placeholder="longitud" class="login" />
                          </div> <!-- /field -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                          <div class="field">
                            <p style="font-size: 1.2em" >Direccion  :</p>
                            <input type="text" id="evento_direccion" name="<?php echo eventoTableClass::getNameField(eventoTableClass::DIRECCION, true) ?>" placeholder="Direccion del evento" class="login" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Costo :</p>
                            <input type="text" id="evento_costo" name="<?php echo eventoTableClass::getNameField(eventoTableClass::COSTO, true) ?>" placeholder="Costo delevento" class="login" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Usuario:</p>
                            <input type="text" class="tags" name="<?php echo eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, true) ?>" placeholder="Usuario publicador del evento" class="login" data-id="ID" data-column="USER" data-source="usuario" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="evento_usuario_id"/>
                            <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: none;" class="autocomplete-img"  />
                            <input type="hidden" id="evento_usuario_id" name="<?php echo eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, true) ?>" />
                          </div> <!-- /field -->

                          <div class="field">
                            <p style="font-size: 1.2em" >Categoria:</p>
                            <input type="text" class="tags" name="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>" placeholder="Categoria del evento" class="login" data-id="ID" data-column="NOMBRE" data-source="categoria" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="evento_categoria_id"/>
                            <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: none;" class="autocomplete-img"  />
                            <input type="hidden" id="evento_categoria_id" name="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true) ?>" />
                          </div> <!-- /field -->

                          <div class="field admin-item1">
                            <p style="font-size: 1.2em" >Fecha inicial de publicacion del evento:</p>
                            <input type="text" id="evento_fecha_inicial_publicacion" name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true) ?>" placeholder="Fecha de inicio de publicacion del evento" class="login datepicker1" />
                          </div> <!-- /field -->

                          <div class="field admin-item1">
                            <p style="font-size: 1.2em" >Fecha final de publicacion del evento:</p>
                            <input type="text" id="evento_fecha_final_publicacion" name="<?php echo eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true) ?>" placeholder="Fecha del termino de la publicacion del evento" class="login datepicker1" />
                          </div> <!-- /field -->

                          <div class="field admin-item1">
                            <p style="font-size: 1.2em" >Imagen:</p>
                            <input type="file" name="<?php echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>" placeholder="Imagen" class="login fileinput" id="evento_imagen" />
                            <!-- <div id="evento_imagen" data-name="<?php //echo eventoTableClass::getNameField(eventoTableClass::IMAGEN, true) ?>" >Upload</div> -->
                          </div> <!-- /field -->
                        </div>
                      </div>

                    </form>

                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="admin-item1" style="text-align: right;" >
                          <button class="button btn btn-success" id="submit-evento-form3" >Registrar</button>
                        </div>
                      </div>
                    </div>

                  </div> <!-- /login-fields -->

                </div> <!-- /content -->

              </div> <!-- /account-container -->

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <div id="mensaje" style="position:relative;/*width: 50%;*/margin: 0 auto; text-align: center;" >

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
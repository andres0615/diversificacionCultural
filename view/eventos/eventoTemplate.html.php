<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>
<?php use mvc\config\configClass as config; ?>

<?php $userName = usuarioTableClass::USER; ?>
<?php $categoriaName = categoriaTableClass::NOMBRE; ?>
<?php $eventoId = eventoTableClass::ID; ?>
<?php $eventoNombre = eventoTableClass::NOMBRE; ?>
<?php $eventoDescripcion = eventoTableClass::DESCRIPCION; ?>
<?php $eventoFechaInicial = eventoTableClass::FECHA_INICIAL_EVENTO; ?>
<?php $eventoFechaFinal = eventoTableClass::FECHA_FINAL_EVENTO; ?>
<?php $eventoLugarLatitud = eventoTableClass::LUGAR_LATITUD; ?>
<?php $eventoLugarLongitud = eventoTableClass::LUGAR_LONGITUD; ?>
<?php $eventoDireccion = eventoTableClass::DIRECCION; ?>
<?php $eventoCosto = eventoTableClass::COSTO; ?>
<?php $eventoUsuarioId = eventoTableClass::USUARIO_ID; ?>
<?php $eventoCategoriaId = eventoTableClass::CATEGORIA_ID; ?>
<?php $eventoFechaInicialPublicacion = eventoTableClass::FECHA_INICIAL_PUBLICACION; ?>
<?php $eventoFechaFinalPublicacion = eventoTableClass::FECHA_FINAL_PUBLICACION; ?>
<?php $eventoImagen = eventoTableClass::IMAGEN; ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" > 
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
          <div class="evento-detalle-item" >
            <div class="evento-detalle-item-title" >
              <h4><?php echo strtoupper($objEvento[0]->$eventoNombre) ;?></h4>
            </div>
            <div class="evento-img" >
              <img src="<?php echo routing::getInstance()->getUrlImg(config::getUploadEventImgFolder() . $objEvento[0]->$eventoImagen); ?>" alt="" height="" width="">
            </div>
            <div class="evento-detalle-item-description" >
              <p>
                <?php echo $objEvento[0]->$eventoDescripcion; ?>
              </p>                
            </div>
            <div class="row mapa-datos">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 datos">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 evento-datos-realizacion" >
                  <div class="item1">
                    <div class="etiqueta">
                      Fecha de realización:
                    </div>
                    <div class="dato">
                      <div class="fecha">
                        <div class="year">
                          <?php echo $year1; ?>
                        </div>
                        <div class="date">
                          <?php echo $mesNombre1 . " / " . $dia1; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="item2">
                    <div class="etiqueta">
                      Lugar de realización:
                    </div>
                    <div class="dato">
                      <p>
                        <?php echo $objEvento[0]->$eventoDireccion; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 widgets1" >
                  <ul class="tt-wrapper">
                    <li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
                    <li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
                    <li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mapa">
                
              </div>
            </div> 
          </div>
          <div class="evento-comentarios-item" >
            <div class="evento-comentarios-item-title" >
              <h4>Comentarios: </h4>
            </div>
            <!-- <div class="comentario-input" >
              <textarea name="evento-comentario" placeholder="Escribe tu comentario ..." maxlength="1024" ></textarea>
            </div> -->
            <div class="form-group">
              <textarea name="" id="" maxlength="1024" rows="4" class="form-control" style="max-width: 100%;" ></textarea>
            </div>
            <input type="submit" class="cbutton5" value="Comentar" >
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
          <div class="evento-organizador" >
            <div class="evento-organizador-title">
              <h4>Organizador</h4>
            </div>
            <hr class="item-side-hr-red" />
            <div class="evento-organizador-datos">
              <div class="row label-dato-item-side">
                <div class="<?php echo (strlen($organizador->nombre) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-4'; ?> col-sm-12 col-xs-12 etiqueta" >
                  <p>Nombre: </p>
                </div>
                <div class="<?php echo (strlen($organizador->nombre) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12 dato" >
                  <p><?php echo $organizador->nombre; ?></p>
                </div>
              </div>
              <?php if(strlen(trim($organizador->direccion)) > 0) : ?>
              <div class="row label-dato-item-side">
                <div class="<?php echo (strlen($organizador->direccion) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-4'; ?> col-sm-12 col-xs-12 etiqueta" >
                  <p>Direccion: </p>
                </div>
                <div class="<?php echo (strlen($organizador->direccion) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12 dato" >
                  <p><?php echo $organizador->direccion; ?></p>
                </div>
              </div>
              <?php endif; ?>
              <?php if(strlen(trim($organizador->telefono)) > 0) : ?>
              <div class="row label-dato-item-side">
                <div class="<?php echo (strlen($organizador->telefono) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-4'; ?> col-sm-12 col-xs-12 etiqueta" >
                  <p>Telefono: </p>
                </div>
                <div class="<?php echo (strlen($organizador->telefono) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12 dato" >
                  <p><?php echo $organizador->telefono; ?></p>
                </div>
              </div>
              <?php endif; ?>
              <div class="row label-dato-item-side">
                <div class="<?php echo (strlen($organizador->correo) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-4'; ?> col-sm-12 col-xs-12 etiqueta" >
                  <p>Correo: </p>
                </div>
                <div class="<?php echo (strlen($organizador->correo) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12 dato" >
                  <p><?php echo $organizador->correo; ?></p>
                </div>
              </div>
              <?php if(strlen(trim($organizador->pagina_web)) > 0) : ?>
              <div class="row label-dato-item-side">
                <div class="<?php echo (strlen($organizador->pagina_web) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-4 col-md-4'; ?> col-sm-12 col-xs-12 etiqueta" >
                  <p>Pagina web: </p>
                </div>
                <div class="<?php echo (strlen($organizador->pagina_web) >= 20) ? 'col-lg-12 col-md-12' : 'col-lg-8 col-md-8'; ?> col-sm-12 col-xs-12 dato" >
                  <p><?php echo $organizador->pagina_web; ?></p>
                </div>
              </div>
              <?php endif; ?>
              <div class="row label-dato-item-side">
                <ul class="tt-wrapper">
                  <li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
                  <li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
                  <li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
                </ul>
              </div>
            </div>
<!--            <div class="dato-realizacion-item" >
              <p class="dato" > <label class="etiqueta" >Fecha de realización: </label>&nbsp;&nbsp;
              20 de Octubre de 2015.</p>
            </div>
            <div class="dato-realizacion-item" >
              <p class="dato" > <label class="etiqueta" >Lugar de realización: </label>&nbsp;&nbsp;
              Calle 24N, Avenida 6A #23N-41.</p>
            </div>-->
          </div>
        </div>
      </div>
    </div>        
    </div>    
  </div>
</div>
<?php view::includePartial('partials/footer.html') ?>
<?php use mvc\routing\routingClass as routing; ?>
<?php use mvc\session\sessionClass as session; ?>
<?php use mvc\request\requestClass as request; ?>
<?php use mvc\i18n\i18nClass as i18n; ?>
<?php use mvc\config\configClass as config; ?>

<?php $nombre = eventoTableClass::NOMBRE; ?>
<?php $id = eventoTableClass::ID; ?>
<?php $descripcion = eventoTableClass::DESCRIPCION; ?>
<?php $imagen = eventoTableClass::IMAGEN; ?>

<div style="text-align: center; display: none;" id="loaderGif" >
  <img src="<?php echo routing::getInstance()->getUrlImg('cargaAjax.gif'); ?>" alt="" width="32px" height="32px" />
</div>
<div class="row spacer-row" >
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eventos-items">
    <div class="row" > 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item-5">
        <div class="row" >

          <?php foreach($objEventos as $evento): ?>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 eventos-item">
              <div class="eventos-item-img" >
                <img src="<?php echo routing::getInstance()->getUrlImg(config::getUploadEventImgFolder() . $evento->$imagen) ?>" alt="" height="" width="" style="max-width: 100%;">
              </div>
              <div class="eventos-item-autor" >
                <?php $usuario = usuarioTableClass::getDatosUsuario($evento->usuario_id); ?>
                <?php echo $usuario->user_name; ?>
              </div>
              <div class="eventos-item-description" >
                <div class="eventos-item-description-title" >
                  <a href="" >
                    <h5><?php echo $evento->$nombre; ?></h5>
                  </a>
                </div>
                <div class="eventos-item-description-text" >
                  <div>
                    <p>
                      <?php

                        if(strlen($evento->$descripcion) > 90) {
                          echo substr($evento->$descripcion, 0, 90) . "..."; 
                        } else {
                          echo $evento->$descripcion;
                        }

                      ?>
                    </p>
                  </div>
                </div>
                <div class="eventos-item-widgets-view" >
                  <div class="widgets1" >
                    <ul class="tt-wrapper">
                      <li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
                      <li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
                      <li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
                    </ul>
                  </div>    
                  <a href="<?php echo routing::getInstance()->getUrlWeb('eventos', 'evento', array('id' => $evento->$id)) ?>" >
                    <div class="read" >
                      Read
                    </div>
                  </a>
                </div>
                <div class="eventos-item-coments-viewpicture" >
                  <i class="fa fa-comment"></i>&nbsp;&nbsp;8 comentarios
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" id="paginador-contenedor">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 eventos-paginador">
    <ul class="pagination">
      <li class="prev <?php if ($page <= 1) echo 'disabled'; ?> npage" ><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('eventos', 'paginador') ?>" data-direction="left" data-sincepage="<?php echo $sincePage; ?>" >← Previous</a></li>
      <?php for ($i = $sincePage; $i <= $untilPage; $i++) : ?>                                            
      <li class="<?php echo($page == $i) ? 'active' : '' ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('eventos', 'paginador') ?>" data-page="<?php echo $i; ?>" data-sincepage="<?php echo $sincePage; ?>" ><?php echo $i; ?></a></li>
      <?php endfor; ?>
      <li class="next <?php if ($page >= $pages ) echo 'disabled'; ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('eventos', 'paginador') ?>" data-direction="right" data-sincepage="<?php echo $sincePage; ?>" >Next → </a></li>
    </ul>
  </div>
</div>
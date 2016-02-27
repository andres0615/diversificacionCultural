<?php use mvc\routing\routingClass as routing; ?>
<?php use mvc\config\configClass as config; ?>

<div style="text-align: center; display: none;" id="loaderGif" >
  <img class="normal-img1" src="<?php echo routing::getInstance()->getUrlImg('cargaAjax.gif'); ?>" alt="" width="32px" height="32px" />
</div>
<div id="data-contenedor" >
  <?php foreach($objEventos as $evento): ?>
  <div class="usuario-item2" style="margin-bottom: 1em;">
    <div class="row evento-ui" >
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
        <img src="<?php echo routing::getInstance()->getUrlImg(config::getUploadEventImgFolder() . $evento->imagen); ?>" alt="" style="width: 100%;">
      </div>
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <h4 class="title1" ><?php echo $evento->nombre; ?></h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
            <p class="p1" >
              <?php echo $evento->descripcion; ?>
            </p>
            <a href="<?php echo routing::getInstance()->getUrlWeb('eventos', 'evento', array('id' => $evento->id)) ?>" >
              <div class="read" >
                Read
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
  <div id="paginador-contenedor" >
    <div class=" center-block">
      <div class="pagination">
        <ul class="pagination">
          <li class="prev <?php if ($page <= 1) echo 'disabled'; ?> npage" ><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'eventosPaginador') ?>" data-direction="left" data-sincepage="<?php echo $sincePage; ?>" >← Previous</a></li>
          <?php for ($i = $sincePage; $i <= $untilPage; $i++) : ?>
            <li class="<?php echo($page == $i) ? 'active' : '' ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'eventosPaginador') ?>" data-page="<?php echo $i; ?>" data-sincepage="<?php echo $sincePage; ?>" ><?php echo $i; ?></a></li>
          <?php endfor; ?>
          <li class="next <?php if ($page >= $pages ) echo 'disabled'; ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'eventosPaginador') ?>" data-direction="right" data-sincepage="<?php echo $sincePage; ?>" >Next → </a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
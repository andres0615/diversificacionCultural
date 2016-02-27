<?php use mvc\routing\routingClass as routing; ?>

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
    <div class="profile-widget-cont">
      <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 img-profile-widget ">
          <img src="<?php echo routing::getInstance()->getUrlImg('pf-1.jpg') ?>" alt="">
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">
          <div class="row name-tag" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center " >
              <?php echo $usuarioNombrecompleto; ?>
              <!-- Bryan Andres Felipe Durango Jimenez -->
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center ">
              <!-- <button type="button" class="btn btn-default">Mi perfil</button> -->
              <a href="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'index') ?>" class="btn btn-default" >Mi perfil</a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-center ">
              <!-- <button type="button" class="btn btn-default">Salir</button> -->
              <a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>" class="btn btn-default" >Salir</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
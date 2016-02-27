<?php use mvc\routing\routingClass as routing; ?>
<?php use mvc\session\sessionClass as session; ?>
<div class="large-row large-row-header" >
  <div class="container" >
    <div class="row" >
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
        Prefabricados
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" >
        <div class="pull-right" >
          <a href="" >
            <img src="<?php echo routing::getInstance()->getUrlImg('facebook.png') ?>" alt="facebook" height="30px" width="30px">
            <img src="<?php echo routing::getInstance()->getUrlImg('youtube.png') ?>" alt="facebook" height="30px" width="30px">
            <img src="<?php echo routing::getInstance()->getUrlImg('google-plus.png') ?>" alt="facebook" height="30px" width="30px">
            <img src="<?php echo routing::getInstance()->getUrlImg('twitter-bird.png') ?>" alt="facebook" height="30px" width="30px">
          </a>          
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container header-container">
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-img"  >
      <img src="<?php echo routing::getInstance()->getUrlImg('cabesote3.png') ?>" />
    </div>
  </div>
</div>
<div class="container">
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
      <nav class="fancyNavBackground navbar navbar-default navbar-green" role="navigation" >
        
        <!-- El logotipo y el icono que despliega el menú se agrupan
              para mostrarlos mejor en los dispositivos móviles -->
         <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse"
                   data-target=".navbar-ex1-collapse">
             <span class="sr-only">Desplegar navegación</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>   
         </div>
        
        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
               otro elemento que se pueda ocultar al minimizar la barra -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">        
            <ul class="fancyNav nav navbar-nav navbar-custom">
              <li><a href="<?php echo routing::getInstance()->getUrlWeb('preFabricados', 'index') ?>" class="homeIcon" style="<?php echo "background: url('" . routing::getInstance()->getUrlImg('navigation/home.png') . "') no-repeat center center;" ?>" >Home</a></li>
              <!--<li><a href="<?php // echo routing::getInstance()->getUrlWeb('preFabricados', 'quienesSomos') ?>">Quienes somos</a></li>-->
              <li><a href="<?php echo routing::getInstance()->getUrlWeb('preFabricados', 'mision') ?>">Mision</a></li>
              <li><a href="<?php echo routing::getInstance()->getUrlWeb('preFabricados', 'vision') ?>">Vision</a></li>

              <?php if(!session::getInstance()->isUserAuthenticated()): ?>
                <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'ingresar') ?>">Ingresar</a></li>
              <?php endif; ?>

              <?php if(session::getInstance()->isUserAuthenticated()): ?>
                <?php if(in_array("admin", session::getInstance()->getCredentials())): ?>
                  <li><a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'admin') ?>">Admin</a></li>
                <?php endif; ?>
              <?php endif; ?>

              <li><a href="<?php echo routing::getInstance()->getUrlWeb('eventos', 'index') ?>">Eventos</a></li>

              <?php if(session::getInstance()->isUserAuthenticated()): ?>
                <li id="li-profile-normal" ><a href="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'index') ?>">Perfil</a></li>
                <li id="li-profile" data-profwidget="<?php echo routing::getInstance()->getUrlWeb('preFabricados', 'profileWidget') ?>" ><a href="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'index') ?>">Perfil</a></li>
              <?php endif; ?>

              <!--<li><a href="<?php // echo routing::getInstance()->getUrlWeb('preFabricados', 'galeria') ?>">Galeria</a></li>-->
              <!--<li><a href="<?php // echo routing::getInstance()->getUrlWeb('preFabricados', 'catalogo') ?>">Catalogo</a></li>-->
              <!--<li><a href="<?php // echo routing::getInstance()->getUrlWeb('preFabricados', 'sistema') ?>">Sistema</a></li>-->
              <!--<li><a href="<?php // echo routing::getInstance()->getUrlWeb('preFabricados', 'contactenos') ?>">Conctactenos</a></li>-->
    <!--          <li id="about"><a href="#about">About us</a></li>
              <li id="services"><a href="#services">Services</a></li>
              <li id="contact"><a href="#contact">Contact us</a></li>-->
            </ul>
          </div>
      </nav>
    </div>
  </div>
</div>


<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $idUsuario = usuarioTableClass::ID ?>
<?php $password = usuarioTableClass::PASSWORD ?>
      
      <?php if (session::getInstance()->hasFlash('danger')): ?>     
        <div class="row">
          <div class="col-lg-12">
            <div class="alert alert-danger">
              <span class="glyphicon glyphicon-remove-circle" style="font-size: 1.4em; display: inline-block;" ></span>
              &nbsp;&nbsp;
              <label for="" style="vertical-align: middle; font-weight: normal;">
              <?php echo session::getInstance()->getFlash('danger'); ?>
              </label>
            </div>
          </div>
        </div>
      <?php endif; ?> 
      <form action="<?php echo routing::getInstance()->getUrlWeb('usuario', ((isset($objUsuario)) ? 'update' : 'create')) ?>" method="post" accept-charset="utf-8" class="form" role="form">   
        <?php if (isset($objUsuario) == true): ?>
          <input name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>" value="<?php echo $objUsuario[0]->$idUsuario ?>" type="hidden">
        <?php endif ?>
        <h4><?php echo i18n::__('user') ?>:</h4>
        <input type="text" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::USER, true) ?>" value="<?php echo ((isset($objUsuario) == true) ? $objUsuario[0]->$usuario : '') ?>" class="form-control input-lg" placeholder="Nombre de usuario"  />
        <h4><?php echo i18n::__('pass') ?>:</h4>
        <input type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1' ?>" value="" class="form-control input-lg pass" placeholder="Password"  />   
        <h4>Confirmar contraseña:</h4>
        <input type="password" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2' ?>" value="" class="form-control input-lg pass" placeholder="Password"  />
        <div style="margin: .8em 0" >
          <input style="display: inline-block" type="checkbox" id="mostrar" />
          &nbsp;
          <h5 style="display: inline-block" >Mostrar contraseña</h5>
        </div>
        <input type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>" class="btn btn-lg btn-primary btn-block signup-btn">      
      </form>  
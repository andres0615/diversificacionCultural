<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = patrocinadorTableClass::NOMBRE ?>
<?php $id = patrocinadorTableClass::ID ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">          
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">          
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
            
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
            <div class="account-container register ">

            <div class="content clearfix">

              <form action="<?php echo routing::getInstance()->getUrlWeb('patrocinador', 'create') ?>" method="POST" id="patrocinador-form">

                <h1>Crear patrocinador</h1>			

                <div class="login-fields">

                  <!--  <p>Create your free account:</p>-->

                  <div class="field">
                    <p style="font-size: 1.2em" >Nombre:</p>
                    <input type="text" id="patrocinador_name" name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true) ?>" placeholder="Nombre entidad patrocinadora" class="login" maxlength="<?php echo patrocinadorTableClass::NOMBRE_LENGTH ?>" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Telefono:</p>
                    <input type="text" id="patrocinador_telefono" name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true) ?>" placeholder="Telefono patrocinador" class="login" maxlength="<?php echo patrocinadorTableClass::TELEFONO_LENGTH ?>" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Correo:</p>
                    <input type="text" id="patrocinador_correo" name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true) ?>" placeholder="Correo patrocinador" class="login" maxlength="<?php echo patrocinadorTableClass::CORREO_LENGTH ?>" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Direccion:</p>
                    <input type="text" id="patrocinador_direccion" name="<?php echo patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true) ?>" placeholder="Direccion patrocinador" class="login" maxlength="<?php echo patrocinadorTableClass::DIRECCION_LENGTH ?>" />
                  </div> <!-- /field -->

                </div> <!-- /login-fields -->

              </form>
              <div class="admin-item1" >                
                <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('patrocinador', 'index') ?>" >Volver</a>
                <button class="button btn btn-success" id="submit-patrocinador-form" >Registrar</button>
              </div>                            
            </div> <!-- /content -->

          </div> <!-- /account-container -->
          <div id="mensaje" style="position:relative;width: 50%;margin: 0 auto; text-align: center;" >
              
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
            
          </div>
        </div>
        </div>
      </div>
    </div>        
    </div>    
  </div>
<?php view::includePartial('partials/footer.html') ?>
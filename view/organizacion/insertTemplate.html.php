<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = organizacionTableClass::NOMBRE ?>
<?php $id = organizacionTableClass::ID ?>

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

              <form action="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'create') ?>" method="POST" id="organizacion-form">

                <h1>Crear organización</h1>			

                <div class="login-fields">

                  <!--  <p>Create your free account:</p>-->

                  <div class="field">
                    <p style="font-size: 1.2em" >Nombre:</p>
                    <input type="text" id="organizacion_name" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true) ?>" placeholder="Nombre de la organización" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Dirección:</p>
                    <input type="text" id="organizacion_direccion" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true) ?>" placeholder="Direccion de la organización" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Telefono:</p>
                    <input type="text" id="organizacion_telefono" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true) ?>" placeholder="Telefono de la organización" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Fax:</p>
                    <input type="text" id="organizacion_fax" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::FAX, true) ?>" placeholder="Fax de la organización" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Correo:</p>
                    <input type="text" id="organizacion_correo" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::CORREO, true) ?>" placeholder="Correo de la organización" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Pagina web:</p>
                    <input type="text" id="organizacion_pagina_web" name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true) ?>" placeholder="Pagina web de la organización" class="login" />
                  </div> <!-- /field -->

                </div> <!-- /login-fields -->

              </form>
              <div class="admin-item1" >                
                <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'index') ?>" >Volver</a>
                <button class="button btn btn-success" id="submit-organizacion-form" >Registrar</button>
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
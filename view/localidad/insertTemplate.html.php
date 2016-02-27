<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = localidadTableClass::NOMBRE ?>
<?php $id = localidadTableClass::ID ?>

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

              <form action="<?php echo routing::getInstance()->getUrlWeb('localidad', 'create') ?>" method="POST" id="localidad-form">

                <h1>Crear Localidad</h1>			

                <div class="login-fields">

                  <!--  <p>Create your free account:</p>-->

                  <div class="field">
                    <p style="font-size: 1.2em" >Localidad:</p>
                    <input type="text" id="localidad_name" name="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?>" placeholder="Nombre de la localidad" class="login" />
                  </div> <!-- /field -->
                  
                  <div class="field">
                    <p style="font-size: 1.2em" >Perteneciente a la localidad:</p>
                    <input type="text" class="tags" name="<?php echo localidadTableClass::getNameField(localidadTableClass::LOCALIDAD_ID, true) ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="localidad" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="localidad_localidad_id"/>
                    <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: none;" class="autocomplete-img"  />
                    <input type="hidden" id="localidad_localidad_id" name="<?php echo localidadTableClass::getNameField(localidadTableClass::LOCALIDAD_ID, true) ?>" />
                  </div> <!-- /field -->

                </div> <!-- /login-fields -->

              </form>
              <div class="admin-item1" >                
                <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('localidad', 'index') ?>" >Volver</a>
                <button class="button btn btn-success" id="submit-localidad-form" >Registrar</button>
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
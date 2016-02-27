<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = localidadTableClass::NOMBRE ?>
<?php $id = localidadTableClass::ID ?>
<?php $localidad_id = localidadTableClass::LOCALIDAD_ID ?>
<?php $localidad_preteneciente_nombre = 'localidad_perteneciente_nombre' ?>

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

              <form action="<?php echo routing::getInstance()->getUrlWeb('localidad', 'update') ?>" method="POST" id="localidad-form">

                <h1>Editar Localidad</h1>			

                <div class="login-fields">

                  <!--  <p>Create your free account:</p>-->
                  
                  <input type="hidden" id="localidad_id" name="<?php echo localidadTableClass::getNameField(localidadTableClass::ID,true) ?>" value="<?php echo $objLocalidad[0]->$id ?>" />

                  <div class="field">
                    <p style="font-size: 1.2em" >Localidad:</p>
                    <label for="firstname">Localidad:</label>
                    <input type="text" id="localidad_name" value="<?php echo $objLocalidad[0]->$nombre ?>" name="<?php echo localidadTableClass::getNameField(localidadTableClass::NOMBRE, true) ?>" placeholder="Nombre de localidad" class="login" />
                  </div> 
                  
                  <div class="field" >
                    <p style="font-size: 1.2em" >Perteneciente a la localidad:</p>
                    <input type="text" class="tags" name="<?php echo localidadTableClass::getNameField(localidadTableClass::LOCALIDAD_ID, true) ?>" placeholder="Perteneciente a la localidad" class="login" data-id="ID" data-column="NOMBRE" data-source="localidad" data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete') ?>" data-input-id="localidad_localidad_id" value="<?php echo $objLocalidad[0]->$localidad_preteneciente_nombre ?>"/>
                    <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 2.5em; position: relative; top: -2.7em; float:right; left: -0.2em; display: <?php echo (strlen(trim($objLocalidad[0]->$localidad_id)) > 0) ? 'block' : 'none' ?>;" class="autocomplete-img"  />
                    <input type="hidden" id="localidad_localidad_id" name="<?php echo localidadTableClass::getNameField(localidadTableClass::LOCALIDAD_ID, true) ?>" value="<?php echo $objLocalidad[0]->$localidad_id ?>" />
                  </div>

                </div> <!-- /login-fields -->

                <div class="login-actions">

                  <!--<button class="button btn btn-primary btn-large" id="" >Register</button>-->
                  <!--<input type="submit" class="button btn btn-primary btn-large" value="Register" />-->

                </div> <!-- .actions -->

              </form>
              <div class="admin-item1" >
                <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('localidad', 'index') ?>" >Volver</a>
                <button class="button btn btn-success" id="submit-localidad-form" >Actualizar</button>
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
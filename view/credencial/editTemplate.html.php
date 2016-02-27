<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = credencialTableClass::NOMBRE ?>
<?php $id = credencialTableClass::ID ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">          
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
              <div class="account-container register ">

              <div class="content clearfix">

                <form action="<?php echo routing::getInstance()->getUrlWeb('credencial', 'update') ?>" method="POST" id="credencial-form">

                  <h1>Editar credencial</h1>			

                  <div class="login-fields">

                    <!--  <p>Create your free account:</p>-->

                    <input type="hidden" id="credencial_id" name="<?php echo credencialTableClass::getNameField(credencialTableClass::ID,true) ?>" value="<?php echo $objCredenciales[0]->$id ?>" />

                    <div class="field">
                      <p style="font-size: 1.2em" >Nombre:</p>
                      <input type="text" id="credencial_name" value="<?php echo $objCredenciales[0]->$nombre ?>" name="<?php echo credencialTableClass::getNameField(credencialTableClass::NOMBRE, true) ?>" placeholder="Nombre de credencial" class="login" />
                    </div> 

                  </div> <!-- /login-fields -->

                  <div class="login-actions">

                    <!--<button class="button btn btn-primary btn-large" id="" >Register</button>-->
                    <!--<input type="submit" class="button btn btn-primary btn-large" value="Register" />-->

                  </div> <!-- .actions -->

                </form>
                <div class="admin-item1" >
                  <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" >Volver</a>
                  <button class="button btn btn-success" id="submit-credencial-form" >Actualizar</button>
                </div>
              </div> <!-- /content -->

            </div> <!-- /account-container -->
            <div id="mensaje" style="position:relative;width: 50%;margin: 0 auto; text-align: center;" >

              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              
            </div>
          </div>
        </div>
      </div>
    </div>        
    </div>    
  </div>
<?php view::includePartial('partials/footer.html') ?>
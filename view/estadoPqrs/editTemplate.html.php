<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = estadoPqrsTableClass::NOMBRE ?>
<?php $actived = estadoPqrsTableClass::ACTIVED ?>
<?php $id = estadoPqrsTableClass::ID ?>

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

                <form action="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'update') ?>" method="POST" id="estadoPqrs-form">

                  <h1>Editar estado de pqrs</h1>			

                  <div class="login-fields">

                    <!--  <p>Create your free account:</p>-->

                    <input type="hidden" id="estadoPqrs_id" name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID,true) ?>" value="<?php echo $objEstadosPqrs[0]->$id ?>" />

                    <div class="field">
                      <p style="font-size: 1.2em" >Nombre:</p>
                      <input type="text" id="estadoPqrs_name" value="<?php echo $objEstadosPqrs[0]->$nombre ?>" name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true) ?>" placeholder="Nombre de estadoPqrs" class="login" />
                    </div> 
                    
                    <div class="field input-radio-div">
                      <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <p style="font-size: 1.2em" >Estado :</p>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <label class="radio inline" >
                            Activa
                          </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="radio" name="estadoPqrs_actived" data-name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ACTIVED, true) ?>" value="t" <?php echo ($objEstadosPqrs[0]->$actived === true)? 'checked="true"' : '' ?> > 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <label class="radio inline" >
                            Inactiva
                          </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="radio" name="estadoPqrs_actived" data-name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ACTIVED, true) ?>" value="f" <?php echo ($objEstadosPqrs[0]->$actived === false)? 'checked="true"' : '' ?> >
                        </div>
                      </div>
                    </div> <!-- /field -->

                  </div> <!-- /login-fields -->

                  <div class="login-actions">

                    <!--<button class="button btn btn-primary btn-large" id="" >Register</button>-->
                    <!--<input type="submit" class="button btn btn-primary btn-large" value="Register" />-->

                  </div> <!-- .actions -->

                </form>
                <div class="admin-item1" >
                  <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'index') ?>" >Volver</a>
                  <button class="button btn btn-success" id="submit-estadoPqrs-form" >Actualizar</button>
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
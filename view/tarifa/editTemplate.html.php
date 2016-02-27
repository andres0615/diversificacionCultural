<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $descripcion = tarifaTableClass::DESCRIPCION ?>
<?php $valor = tarifaTableClass::VALOR ?>
<?php $actived = tarifaTableClass::ACTIVED ?>
<?php $id = tarifaTableClass::ID ?>

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

                <form action="<?php echo routing::getInstance()->getUrlWeb('tarifa', 'update') ?>" method="POST" id="tarifa-form">

                  <h1>Editar tarifa</h1>			

                  <div class="login-fields">

                    <!--  <p>Create your free account:</p>-->

                    <input type="hidden" id="tarifa_id" name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::ID,true) ?>" value="<?php echo $objTarifas[0]->$id ?>" />

                    <div class="field">
                      <p style="font-size: 1.2em" >Descripción:</p>
                      <textarea id="tarifa_descripcion" name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true) ?>" class="login" style="width: 100%; max-width: 100%; min-height: 4em; font-size: 1.4em; color: #8e8d8d;" placeholder="Descripcion de la tarifa" maxlength="1024" ><?php echo $objTarifas[0]->$descripcion ?></textarea>
                    </div> <!-- /field -->

                    <div class="field">
                      <p style="font-size: 1.2em" >Valor:</p>
                      <input type="text" id="tarifa_valor" name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::VALOR, true) ?>" placeholder="Valor de la tarifa" class="login" value="<?php echo $objTarifas[0]->$valor ?>" />
                    </div> <!-- /field -->

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
                          <input type="radio" name="tarifa_actived" data-name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::ACTIVED, true) ?>" value="t" <?php echo ($objTarifas[0]->$actived === true)? 'checked="true"' : '' ?> > 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <label class="radio inline" >
                            Inactiva
                          </label>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                          <input type="radio" name="tarifa_actived" data-name="<?php echo tarifaTableClass::getNameField(tarifaTableClass::ACTIVED, true) ?>" value="f" <?php echo ($objTarifas[0]->$actived === false)? 'checked="true"' : '' ?> >
                        </div>  
                      </div>
                    </div> <!-- /field -->

                  </div> <!-- /login-fields -->

                </form>
                <div class="admin-item1" >
                  <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('tarifa', 'index') ?>" >Volver</a>
                  <button class="button btn btn-success" id="submit-tarifa-form" >Actualizar</button>
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
<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php $nombre = categoriaTableClass::NOMBRE ?>
<?php $id = categoriaTableClass::ID ?>

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

                <form action="<?php echo routing::getInstance()->getUrlWeb('categoria', 'update') ?>" method="POST" id="categoria-form">

                  <h1>Editar categoria</h1>			

                  <div class="login-fields">

                    <!--  <p>Create your free account:</p>-->

                    <input type="hidden" id="categoria_id" name="<?php echo categoriaTableClass::getNameField(categoriaTableClass::ID,true) ?>" value="<?php echo $objCategorias[0]->$id ?>" />

                    <div class="field">
                      <p style="font-size: 1.2em" >Nombre:</p>
                      <input type="text" id="categoria_name" value="<?php echo $objCategorias[0]->$nombre ?>" name="<?php echo categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true) ?>" placeholder="Nombre de categoria" class="login" maxlength="<?php echo categoriaTableClass::NOMBRE_LENGTH ?>" />
                    </div> 

                  </div> <!-- /login-fields -->

                  <div class="login-actions">

                    <!--<button class="button btn btn-primary btn-large" id="" >Register</button>-->
                    <!--<input type="submit" class="button btn btn-primary btn-large" value="Register" />-->

                  </div> <!-- .actions -->

                </form>
                <div class="admin-item1" >
                  <a class="button btn btn-info" id="volver" href="<?php echo routing::getInstance()->getUrlWeb('categoria', 'index') ?>" >Volver</a>
                  <button class="button btn btn-success" id="submit-categoria-form" >Actualizar</button>
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
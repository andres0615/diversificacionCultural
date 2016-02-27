<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row " >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="usuario-item1" >
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="<?php echo routing::getInstance()->getUrlImg('pf-1.jpg') ?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <hr />
                    <ul class="usuario-opciones" >
                      <a id="ui-opcion1" href="" data-frame="1" data-url="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'frameHandler') ?>" ><li>Perfil</li></a>
                      <hr />
                      <a href="" data-frame="2" data-url="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'eventosPaginador') ?>" ><li>Eventos</li></a>
                      <hr />
                      <a href="" data-frame="3" data-url="<?php echo routing::getInstance()->getUrlWeb('usuarioUi', 'frameHandler') ?>" ><li>Editar mi perfil</li></a>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" id="perfil-frame" >

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php view::includePartial('partials/footer.html') ?>
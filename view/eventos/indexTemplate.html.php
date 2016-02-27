<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>

<?php $nombre = eventoTableClass::NOMBRE; ?>
<?php $id = eventoTableClass::ID; ?>
<?php $descripcion = eventoTableClass::DESCRIPCION; ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" >
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 item-5" style="margin-bottom: 1.5em;">
      <div class="usuario-item2">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" >
            <h3 style="margin: .2em 0em;" >Eventos</h3>
            <hr style="margin: 0; border-top: solid 1px #B8B8B8;" >
            <div class="row" style="margin-top: .7em; margin-bottom: .5em;" >
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                <a href="#" id="panel-buscar" style="text-decoration: none;" >
                  <span class="glyphicon glyphicon-search" ></span>
                  Buscar +
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
            <div class="usuario-item3" >
              <div class="row" >
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 eventos-items" >
                  <h5>Has parte de la diversificacion y publica tu evento.</h5>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 eventos-items text-center" >
                  <a href="<?php echo routing::getInstance()->getUrlWeb('eventos', 'registrarEventoUi') ?>" class="cbutton5" >Publicar evento</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="widget admin-template" id="panel-buscar-evento-ui" style="display:none;" >
    <div class="widget-header">
      <i class="icon-search"></i>
      <h3 style="margin: 0;" >Busqueda</h3>
    </div>
    <div class="widget-content" >
      <div class="row" >
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <label class="control-label" for="firstname">Nombre :</label>
            <div class="controls">
              <input type="text" class="span6" id="evento-nombre" >
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <label class="control-label" for="firstname">Fecha inicial :</label>
            <div class="controls">
              <input type="text" class="span6 datepicker1" id="evento-fechainicial" >
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <label class="control-label" for="firstname">Fecha final :</label>
            <div class="controls">
              <input type="text" class="span6 datepicker1" id="evento-fechafinal" >
            </div>
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <label class="control-label" for="firstname">Usuario :</label>
            <div class="controls">
              <input type="text"
                     class="span6 tags3"
                     id="evento-usuario"
                     name="<?php echo eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, true); ?>"
                     data-id="ID"
                     data-column="USER"
                     data-source="<?php echo usuarioTableClass::getNameTable(); ?>"
                     data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete'); ?>"
                     data-input-id="<?php echo usuarioTableClass::getNameTable() . '_' . usuarioTableClass::ID; ?>"
              />
              <input
                  type="hidden"
                  id="<?php echo usuarioTableClass::getNameTable() . '_' . usuarioTableClass::ID; ?>"
                  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true); ?>"
              />
              <div style="width: 100%; position: absolute;" >
                <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/list-input.png') ?>" style="width: 1.3em; position: relative; top: -2em; left: -2.33em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'none' : 'block' ; ?>;" class="autocomplete-img-def" title="Campo de autobusqueda"  />
                <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 1.3em; position: relative; top: -2em; left: -2.33em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'block' : 'none' ; ?>; " class="autocomplete-img3"  />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <label class="control-label" for="firstname">Categoria :</label>
            <div class="controls">
              <input type="text"
                     class="span6 tags3"
                     id="evento-categoria"
                     name="<?php echo eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true); ?>"
                     data-id="ID"
                     data-column="NOMBRE"
                     data-source="<?php echo categoriaTableClass::getNameTable(); ?>"
                     data-url="<?php echo routing::getInstance()->getUrlWeb('components', 'autoComplete'); ?>"
                     data-input-id="<?php echo categoriaTableClass::getNameTable() . '_' . categoriaTableClass::ID; ?>"
              />
              <input
                  type="hidden"
                  id="<?php echo categoriaTableClass::getNameTable() . '_' . categoriaTableClass::ID; ?>"
                  name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true); ?>"
              />
              <div style="width: 100%; position: absolute;" >
                <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/list-input.png') ?>" style="width: 1.3em; position: relative; top: -2em; left: -2.33em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'none' : 'block' ; ?>;" class="autocomplete-img-def" title="Campo de autobusqueda"  />
                <img src="<?php echo routing::getInstance()->getUrlImg('components/autocomplete/complete.png') ?>" style="width: 1.3em; position: relative; top: -2em; left: -2.33em; float:right; display: <?php echo (strlen(trim($localidad_id)) > 0)? 'block' : 'none' ; ?>; " class="autocomplete-img3"  />
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
          <div class="control-group">
            <div class="controls">
              <a href="<?php echo routing::getInstance()->getUrlWeb('eventos', 'paginador'); ?>" id="filtrar" class="btn btn-info" style="float: right;" ><i class="icon-zoom-out"></i>&nbsp;&nbsp;Buscar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="data-contenedor" data-cargar-datos="<?php echo routing::getInstance()->getUrlWeb('eventos', 'paginador'); ?>" >
  </div>
</div>
<!--</div>-->
<?php view::includePartial('partials/footer.html') ?>
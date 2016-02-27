<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>

<?php $nombre = organizacionTableClass::NOMBRE ?>
<?php $id = organizacionTableClass::ID ?>

<?php view::includePartial('partials/header.html') ?>

<div id="dialog" title="Desea eliminar el usuario ? " style="display:none;"></div>
<div id="dialog2" title="Desea eliminar el usuario ? " style="display:none;"></div>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <?php view::includePartial('partials/admin/tables.html') ?>
          <div class="widget admin-template" >
            <div class="widget-header">
              <i class="icon-cogs"></i>
              <h3 style="margin: 0;" >Acciones</h3>
            </div>
            <div class="widget-content admin-item1" >
              <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'insert') ?>" class="btn btn-success"><i class=" icon-plus"></i>&nbsp;Crear</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'deleteSelect') ?>" id="delete-select" class="btn btn-danger"><i class="icon-trash" id="delete-select" ></i>&nbsp;Eliminar</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'paginador'); ?>" id="delete-filters" class="btn btn-warning"><i class="icon-zoom-out"></i>&nbsp;Eliminar Filtros</a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'report'); ?>" target="_blank" class="btn"><i class="icon-list-alt"></i>&nbsp;Reporte</a>
              <!--<button class="btn btn-info">Crear</button>-->                          
            </div>
          </div>
          <div class="widget admin-template" >
            <div class="widget-header">
              <i class="icon-search"></i>
              <h3 style="margin: 0;" >Filtros</h3>
            </div>
            <div class="widget-content" >
              <div class="row" >
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                  <div class="control-group">											
                    <label class="control-label" for="firstname">Nombre :</label>
                    <div class="controls">
                      <input type="text" class="span6" id="organizacion-nombre" >
                    </div> 				
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                  <div class="control-group">											
                    <label class="control-label" for="firstname">Fecha inicial :</label>
                    <div class="controls">
                      <input type="text" class="span6 datepicker1" id="organizacion-fechainicial" >
                    </div> 				
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                  <div class="control-group">											
                    <label class="control-label" for="firstname">Fecha final :</label>
                    <div class="controls">
                      <input type="text" class="span6 datepicker1" id="organizacion-fechafinal" >
                    </div> 				
                  </div>
                </div>
              </div>
              <div class="row" >
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 admin-item1">
                  <div class="control-group">											                    
                    <div class="controls">
                      <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'paginador'); ?>" id="filtrar" class="btn btn-info" style="float: right;" ><i class="icon-zoom-out"></i>&nbsp;&nbsp;Filtrar</a>
                    </div> 				
                  </div>
                </div>
              </div>
            </div>            
          </div>
          <div id="mensaje" style="position:relative;width: 100%;margin: 0 auto; text-align: center;" >
              
          </div>          
          <div id="data-table-contenedor" >
            <div style="text-align: center; display: none;" id="loaderGif" >
              <img src="<?php echo routing::getInstance()->getUrlImg('cargaAjax.gif'); ?>" alt="" width="32px" height="32px" />
            </div>
            <div class="widget widget-table action-table admin-template" id="data-table" >
              <div class="widget-header"> <i class="icon-briefcase"></i>
                <h3 style="margin: 0;" >Organización</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th><input type="checkbox" id="chkAll"></th>
                      <th>Organización</th>
                      <th class="td-actions">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($objOrganizaciones as $organizacion): ?>
                      <tr>
                        <td><input type="checkbox"  class="item-organizacion-chk" name="userchk[]" value="<?php echo $organizacion->$id ?>"></td>
                        <td><?php echo $organizacion->$nombre ?></td>                      
                        <td class="td-actions">
                          <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'edit', array(organizacionTableClass::ID => $organizacion->$id)) ?>" class="btn btn-small btn-success" style="display: inline">
                            Editar <i class="btn-icon-only icon-edit"> </i>
                          </a>
                          <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'delete') ?>" onclick="" class="btn btn-danger btn-small organizacion-delete" style="display: inline" data-id="<?php echo $organizacion->$id ?>" data-name="<?php echo organizacionTableClass::getNameField(organizacionTableClass::ID, true) ?>">
                            Eliminar <i class="btn-icon-only icon-remove"> </i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /widget-content --> 
            </div>
            <div id="paginador-contenedor" >
              <div class=" center-block">
                <div class="pagination">
                  <ul class="pagination">
                    <li class="prev <?php if ($page <= 1) echo 'disabled'; ?>" ><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'paginador') ?>" data-direction="left" data-sincepage="<?php echo $sincePage; ?>" >← Previous</a></li>
                    <?php for ($i = $sincePage; $i <= $untilPage; $i++) : ?>                                            
                    <li class="<?php echo($page == $i) ? 'active' : '' ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'paginador') ?>" data-page="<?php echo $i; ?>" data-sincepage="<?php echo $sincePage; ?>" ><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="next <?php if ($page >= $pages ) echo 'disabled'; ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'paginador') ?>" data-direction="right" data-sincepage="<?php echo $sincePage; ?>" >Next → </a></li>
                  </ul>
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
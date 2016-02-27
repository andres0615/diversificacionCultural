<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $nombre = estadoPqrsTableClass::NOMBRE ?>
<?php $id = estadoPqrsTableClass::ID ?>

<div style="text-align: center; display: none;" id="loaderGif" >
  <img src="<?php echo routing::getInstance()->getUrlImg('cargaAjax.gif'); ?>" alt="" width="32px" height="32px" />
</div>
<div class="widget widget-table action-table admin-template" id="data-table" >  
  <div class="widget-header"> <i class="icon-edit"></i>
    <h3 style="margin: 0;" >Tipo de Pqrs</h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th><input type="checkbox" id="chkAll"></th>
          <th>Estado de Pqrs</th>
          <th class="td-actions">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($objEstadosPqrs as $estadoPqrs): ?>
          <tr>
            <td><input type="checkbox"  class="item-estadoPqrs-chk" name="userchk[]" value="<?php echo $estadoPqrs->$id ?>"></td>
            <td><?php echo $estadoPqrs->$nombre ?></td>                      
            <td class="td-actions">
              <a href="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'edit', array(estadoPqrsTableClass::ID => $estadoPqrs->$id)) ?>" class="btn btn-small btn-success" style="display: inline">
                Editar <i class="btn-icon-only icon-edit"> </i>
              </a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'delete') ?>" onclick="" class="btn btn-danger btn-small estadoPqrs-delete" style="display: inline" data-id="<?php echo $estadoPqrs->$id ?>" data-name="<?php echo estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID, true) ?>">
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
        <li class="prev <?php if ($page <= 1) echo 'disabled'; ?> npage" ><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'paginador') ?>" data-direction="left" data-sincepage="<?php echo $sincePage; ?>" >← Previous</a></li>
        <?php for ($i = $sincePage; $i <= $untilPage; $i++) : ?>                                            
        <li class="<?php echo($page == $i) ? 'active' : '' ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'paginador') ?>" data-page="<?php echo $i; ?>" data-sincepage="<?php echo $sincePage; ?>" ><?php echo $i; ?></a></li>
        <?php endfor; ?>
        <li class="next <?php if ($page >= $pages ) echo 'disabled'; ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'paginador') ?>" data-direction="right" data-sincepage="<?php echo $sincePage; ?>" >Next → </a></li>
      </ul>
    </div>
  </div>
</div>
<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\session\sessionClass as session ?>
<?php use mvc\request\requestClass as request ?>
<?php use mvc\config\configClass as config ?>
<?php $usu = usuarioTableClass::USER ?>
<?php $id = usuarioTableClass::ID ?>
<?php $sincePage = session::getInstance()->getFlash('sincePage'); ?>
<?php $untilPage = session::getInstance()->getFlash('untilPage'); ?>
<?php mvc\view\viewClass::includePartial('partials/menu') ?>
<?php use mvc\i18n\i18nClass as i18n; ?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#"><?php echo i18n::__('home'); ?></a> / <?php echo i18n::__('admin'); ?></span>
    <h2><?php echo i18n::__('admin'); ?><h2>
  </div>
</div>
<!-- banner -->

<!--sidebar-->

<?php mvc\view\viewClass::includePartial('partials/admin/sidebar.html') ?>
<!--sidebar-->
<div class="container">
  <div class="row">
    <div class="col-lg-1 col-md-1 col-sm-1">
      
    </div>
    <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12">
      <br /><br />
      <div class="box-inner">
        <div class="box-header well" data-original-title="">
          <h2><i class="glyphicon glyphicon-user"></i> <?php echo i18n::__('users'); ?> </h2>
            <div class="box-icon">
              <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'insert') ?>" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-plus"></i> <?php echo i18n::__('add'); ?></a>
              <a href="#" id="borrarSeleccion" class="btn btn-close btn-round btn-default" data-actualurl="<?php echo routing::getInstance()->getUrlWeb('usuario', 'table'); ?>" data-action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'deleteSelect'); ?>" ><i class="glyphicon glyphicon-remove"></i> <?php echo i18n::__('delete'); ?></a>
              <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'deleteFilter'); ?>" class="btn btn-danger btn-default" ><i class="glyphicon glyphicon-remove"></i> <?php echo i18n::__('deleteFilters'); ?></a>     
              <a href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'report'); ?>" class="btn btn-danger btn-default" ><i class="glyphicon glyphicon-list-alt"></i> <?php echo i18n::__('report'); ?></a>     
            </div>
        </div>
        <div class="box-content" id="box-cont">          
          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">    
            <form action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'table') ?>" name="filtros" method="POST"> 
              <div class="row">              
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >
                  <label for="">Usuario:</label>
                  <input type="text" name="filter[usuario]" value="<?php echo ((isset($filter) == true) ? $filter['usuario'] : '') ?>"/>                  
                </div> 
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                  <div class="pull-right" >
                    <label for="">Fecha de creacion:</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" name="filter[fechaCreacion1]" value="<?php echo ((isset($filter) == true) ? $filter['fechaCreacion1'] : '') ?>" />&nbsp;&nbsp;&nbsp;
                    <label for="">to</label>&nbsp;&nbsp;&nbsp;
                    <input type="date" name="filter[fechaCreacion2]" value="<?php echo ((isset($filter) == true) ? $filter['fechaCreacion2'] : '') ?>" />  
                  </div>                                 
                </div>                     
              </div>
              <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" >

                </div> 
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" >
                  <div class="pull-right" >
                    <input type="submit" class="btn btn-success" value="Filtrar"/>                 
                  </div>
                </div>  
              </div> 
            </form>
            <br />
            <?php if (isset($success)): ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-success">
                  <span class="glyphicon glyphicon-ok-circle" style="font-size: 1.4em; display: inline-block;" ></span>
                  &nbsp;&nbsp;
                  <label for="" style="vertical-align: middle; font-weight: normal;">
                  <?php echo $success ?>
                  </label>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if (isset($danger)): ?>
            <div class="row">
              <div class="col-lg-12">
                <div class="alert alert-danger">
                  <span class="glyphicon glyphicon-ok-circle" style="font-size: 1.4em; display: inline-block;" ></span>
                  &nbsp;&nbsp;
                  <label for="" style="vertical-align: middle; font-weight: normal;">
                  <?php echo $danger ?>
                  </label>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php if (session::getInstance()->hasFlash('noRows')): ?>
            <div class="row" >
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" >
                <legend><?php echo i18n::__(00010, config::getDefaultCulture(), 'errors') ?></legend>
              </div>
            </div>
            <?php else: ?>            
            <div class="row">
              <div style="text-align: center; display: none;" id="loaderGif" >
                <img src="<?php echo routing::getInstance()->getUrlImg('cargaAjax.gif'); ?>" alt="" width="32px" height="32px" />
              </div>
              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                <thead>
                  <tr role="row">
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 30px;" ><input type="checkbox" id="chkAll"></th>
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 199px;"><?php echo i18n::__('username'); ?></th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 370px;"><?php echo i18n::__('actions'); ?></th>
                  </tr>
                </thead>
                <tbody id="table-cont" role="alert" aria-live="polite" aria-relevant="all">                  
                  <?php foreach ($objUsuarios as $usuario): ?>
                    <tr class="odd">
                      <td><input type="checkbox" name="chk[]" value="<?php echo $usuario->$id ?>"></td>
                      <td class=" sorting_1"><?php echo $usuario->$usu ?></td>
                      <td class="center ">
                        <a class="btn btn-success" style="" href="<?php echo routing::getInstance()->getUrlWeb('usuario', 'edit', array(usuarioTableClass::ID => $usuario->$id)) ?>">
                          <i class="glyphicon glyphicon-edit icon-white"></i>
                          <?php echo i18n::__('edit'); ?>
                        </a>
                        <a href="#" class="btn btn-danger" onclick="confirmarEliminar(<?php echo $usuario->$id ?>)" >
                          <i class="glyphicon glyphicon-trash icon-white"></i>
                          <?php echo i18n::__('delete'); ?>
                        </a>
                      </td>
                    </tr>  
                  <?php endforeach ?>                  
                </tbody>
              </table>
            </div>           
            <form id="frmDelete" action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'delete') ?>" method="POST">
              <input type="hidden" id="idDelete" name="<?php echo usuarioTableClass::getNameField(usuarioTableClass::ID, true) ?>">
            </form>
            <?php // echo routing::getInstance()->forward('usuario', 'paginador') ?>
            <div class="row">
              <div class="col-md-12">
                <div class="dataTables_info" id="DataTables_Table_0_info">Showing <?php echo $since + 1; ?> to <?php echo $since + $rowsperpage; ?> of <?php echo $totalRows; ?> entries
                </div>
              </div>
              <div class="col-md-12 center-block">
                <div class="dataTables_paginate paging_bootstrap pagination">
                  <ul class="pagination">
                    <li class="prev <?php if ($page <= 1) echo 'disabled'; ?> npage" ><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuario', 'paginador') ?>" data-direction="left" data-sincepage="<?php echo $sincePage; ?>" >← Previous</a></li>
                    <?php for ($i = $sincePage; $i <= $untilPage; $i++) : ?>                                            
                    <li class="<?php echo($page == $i) ? 'active' : '' ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuario', 'paginador') ?>" data-page="<?php echo $i; ?>" data-sincepage="<?php echo $sincePage; ?>" ><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="next <?php if ($page >= $pages ) echo 'disabled'; ?> npage"><a href="#" data-paginador="<?php echo routing::getInstance()->getUrlWeb('usuario', 'paginador') ?>" data-direction="right" data-sincepage="<?php echo $sincePage; ?>" >Next → </a></li>
                  </ul>
                </div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
<!--    <div class="col-lg-2 col-md-3 col-sm-2">
      
    </div>-->
  </div>
</div>
<?php 
//echo $since;
//echo '<br />';
//echo $pages;
?>
<!--<input type="button" id="enviarf" data-actualurl="<?php echo routing::getInstance()->getUrlWeb('usuario', 'table'); ?>" data-action="<?php echo routing::getInstance()->getUrlWeb('usuario', 'deleteSelect'); ?>"/>-->
<?php mvc\view\viewClass::includePartial('partials/footer.html') ?>
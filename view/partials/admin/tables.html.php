<?php use mvc\routing\routingClass as routing ?>

          <div class="widget admin-template">
            <div class="widget-header"> <i class="icon-table"></i>
              <h3 style="margin: 0;" >Tablas</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
                <a href="<?php echo routing::getInstance()->getUrlWeb('admin', 'admin') ?>" class="shortcut">
                  <i class="shortcut-icon icon-user"></i>
                  <span class="shortcut-label">Usuario</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('localidad', 'index') ?>" class="shortcut">
                    <i class="shortcut-icon icon-map-marker"></i>
                    <span class="shortcut-label">Localidad</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoDocumento', 'index') ?>" class="shortcut">
                  <i class="shortcut-icon icon-credit-card"></i>
                  <span class="shortcut-label">Tipo Documento</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('organizacion', 'index') ?>" class="shortcut">
                  <i class="shortcut-icon icon-briefcase"></i> 
                  <span class="shortcut-label">Organizacion</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('patrocinador', 'index') ?>" class="shortcut"> 
                  <i class="shortcut-icon icon-suitcase"></i>
                  <span class="shortcut-label">Patrocinador</span> 
                </a>                
                <a href="<?php echo routing::getInstance()->getUrlWeb('categoria', 'index') ?>" class="shortcut">
                  <i class="shortcut-icon icon-tag"></i>
                  <span class="shortcut-label">Categoria</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('tarifa', 'index') ?>" class="shortcut">
                  <i class="shortcut-icon fa fa-calculator" style="font-size: 1.6em" ></i> 
                  <span class="shortcut-label">Tarifa</span> 
                </a>
                <a href="<?php echo routing::getInstance()->getUrlWeb('tipoPqrs', 'index') ?>" class="shortcut"> 
                  <i class="shortcut-icon icon-copy"></i>
                  <span class="shortcut-label">Tipo pqrs</span> 
                </a> 
                <a href="<?php echo routing::getInstance()->getUrlWeb('estadoPqrs', 'index') ?>" class="shortcut"> 
                  <i class="shortcut-icon icon-edit"></i>
                  <span class="shortcut-label">Estado pqrs</span> 
                </a> 
                <a href="<?php echo routing::getInstance()->getUrlWeb('credencial', 'index') ?>" class="shortcut"> 
                  <i class="shortcut-icon icon-list-alt"></i>
                  <span class="shortcut-label">Credencial</span> 
                </a> 
                <a href="<?php echo routing::getInstance()->getUrlWeb('evento', 'index') ?>" class="shortcut"> 
                  <i class="shortcut-icon icon-calendar"></i>
                  <span class="shortcut-label">Evento</span> 
                </a> 
              </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
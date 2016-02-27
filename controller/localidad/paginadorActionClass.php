<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\view\viewClass as view;
/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class paginadorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {     
      
//      sleep(1);  
      
      $fields = array(
          localidadTableClass::ID,
          localidadTableClass::NOMBRE,
          localidadTableClass::CREATED_AT
      );
      $orderBy = array(
          localidadTableClass::NOMBRE
      ); 
      
      if (request::getInstance()->hasPost('borrarFiltros')) {
        
        if (request::getInstance()->getPost('borrarFiltros') === 'true') {
          session::getInstance()->deleteAttribute('localidadFilter');
          session::getInstance()->deleteAttribute('localidadWhere');
        }
      }
      
      if (request::getInstance()->hasPost('filter')) {    
        
        $filter = request::getInstance()->getPost('filter');      
        
        if (strlen(trim($filter['localidadNombre'])) > 0) {
          $where[localidadTableClass::NOMBRE] = $filter['localidadNombre'];          
        }
        
        if (strlen(trim($filter['localidadFechaInicial'])) > 0 && strlen(trim($filter['localidadFechaFinal'])) > 0) {
          $where[localidadTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['localidadFechaInicial'] . ' 00:00:00' )),
              date(config::getFormatTimestamp(), strtotime($filter['localidadFechaFinal'] . ' 23:59:59' ))
          );
        }
        
        $this->filter = request::getInstance()->getPost('filter');        
        
        session::getInstance()->setAttribute('localidadFilter', $this->filter);
        session::getInstance()->setAttribute('localidadWhere', $where);
        
      } else if (session::getInstance()->hasAttribute('localidadWhere')) {
          $where = session::getInstance()->getAttribute('localidadWhere');
          $this->filter = session::getInstance()->getAttribute('localidadFilter');          
      }
      
      $this->rowsperpage = 3;     
      
      if (request::getInstance()->hasPost('page')) {        
        $this->page = request::getInstance()->getPost('page');        
        $this->since = $this->page - 1;
        $this->since = $this->since * $this->rowsperpage; 
      } else {
        $this->page = 1;
        $this->since = $this->page - 1;
        $this->since = $this->since * $this->rowsperpage;
      }
      
      if (session::getInstance()->hasAttribute('localidadWhere')) {
        $filter = session::getInstance()->getAttribute('localidadFilter');
        $where = session::getInstance()->getAttribute('localidadWhere');
      } 
      
      $this->registros = count(localidadTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
      $this->pages = $this->registros / $this->rowsperpage; 
      
      if (!(is_int($this->pages))) {
        $this->pages = (int)$this->pages + 1;
      }
      
      $this->sincePages = 1;
      $this->untilPages = $this->sincePages + 3;
      
      if (request::getInstance()->hasPost('sincePage')) {        
          $this->sincePage = request::getInstance()->getPost('sincePage');
          $this->untilPage = $this->sincePage + 3;                      
      }     
      
      if ($this->page > $this->untilPage) {        
        $this->sincePage = $this->sincePage + 1;
        $this->untilPage = $this->sincePage + 3;
      } else if ($this->page < $this->sincePage) {
        $this->sincePage = $this->sincePage - 1;
        $this->untilPage = $this->sincePage + 3;
      }
      
      if ($this->sincePage == 1) {
        if ($this->pages >= 4) {
          $this->untilPage = 4;
        } else  {
          $this->untilPage = $this->pages;
        }
      }      
      
      $this->objLocalidades = localidadTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      $this->visibleRows = count($this->objLocalidades);
      
      if ($this->page > $this->pages) {
        $this->page = $this->pages;
      }
      
      if ($this->visibleRows == 0) {
        
        if (($this->since - $this->rowsperpage) < 0) {
          $this->since = 0;
        } else {
          $this->since = $this->since - $this->rowsperpage;
        }
        
        $this->objLocalidades = localidadTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
        $this->visibleRows = count($this->objLocalidades);        
      }
      
      $this->totalRows = count(localidadTableClass::getAll($fields));  
      

      view::includePartial('localidad/registrosTemplate.html', 
              array(
                  'objLocalidades' => $this->objLocalidades,
                  'page' => $this->page,
                  'pages' => $this->pages,
                  'sincePage' => $this->sincePage,
                  'untilPage' => $this->untilPage,
                  'totalRows' => $this->totalRows,
                  'visibleRows' => $this->visibleRows,
                  'since' => $this->since,
                  'filter' => $filter
                  ));
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

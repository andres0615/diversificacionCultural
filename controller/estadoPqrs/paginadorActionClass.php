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
          estadoPqrsTableClass::ID,
          estadoPqrsTableClass::NOMBRE,
          estadoPqrsTableClass::CREATED_AT
      );
      $orderBy = array(
          estadoPqrsTableClass::NOMBRE
      ); 
      
      if (request::getInstance()->hasPost('borrarFiltros')) {
        
        if (request::getInstance()->getPost('borrarFiltros') === 'true') {
          session::getInstance()->deleteAttribute('estadoPqrsFilter');
          session::getInstance()->deleteAttribute('estadoPqrsWhere');
        }
      }
      
      if (request::getInstance()->hasPost('filter')) {    
        
        $filter = request::getInstance()->getPost('filter');      
        
        if (strlen(trim($filter['estadoPqrsNombre'])) > 0) {
          $where[estadoPqrsTableClass::NOMBRE] = $filter['estadoPqrsNombre'];          
        }
        
        if (strlen(trim($filter['estadoPqrsFechaInicial'])) > 0 && strlen(trim($filter['estadoPqrsFechaFinal'])) > 0) {
          $where[estadoPqrsTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['estadoPqrsFechaInicial'] . ' 00:00:00' )),
              date(config::getFormatTimestamp(), strtotime($filter['estadoPqrsFechaFinal'] . ' 23:59:59' ))
          );
        }
        
        $this->filter = request::getInstance()->getPost('filter');        
        
        session::getInstance()->setAttribute('estadoPqrsFilter', $this->filter);
        session::getInstance()->setAttribute('estadoPqrsWhere', $where);
        
      } else if (session::getInstance()->hasAttribute('estadoPqrsWhere')) {
          $where = session::getInstance()->getAttribute('estadoPqrsWhere');
          $this->filter = session::getInstance()->getAttribute('estadoPqrsFilter');          
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
      
      if (session::getInstance()->hasAttribute('estadoPqrsWhere')) {
        $filter = session::getInstance()->getAttribute('estadoPqrsFilter');
        $where = session::getInstance()->getAttribute('estadoPqrsWhere');
      } 
      
      $this->registros = count(estadoPqrsTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
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
      
      $this->objEstadosPqrs = estadoPqrsTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      $this->visibleRows = count($this->objEstadosPqrs);
      
      if ($this->page > $this->pages) {
        $this->page = $this->pages;
      }
      
      if ($this->visibleRows == 0) {
        
        if (($this->since - $this->rowsperpage) < 0) {
          $this->since = 0;
        } else {
          $this->since = $this->since - $this->rowsperpage;
        }
        
        $this->objEstadosPqrs = estadoPqrsTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
        $this->visibleRows = count($this->objEstadosPqrs);        
      }
      
      $this->totalRows = count(estadoPqrsTableClass::getAll($fields));  
      

      view::includePartial('estadoPqrs/registrosTemplate.html', 
              array(
                  'objEstadosPqrs' => $this->objEstadosPqrs,
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

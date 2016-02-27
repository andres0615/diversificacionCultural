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
          tipoDocumentoTableClass::ID,
          tipoDocumentoTableClass::NOMBRE,
          tipoDocumentoTableClass::CREATED_AT
      );
      $orderBy = array(
          tipoDocumentoTableClass::NOMBRE
      ); 
      
      if (request::getInstance()->hasPost('borrarFiltros')) {
        
        if (request::getInstance()->getPost('borrarFiltros') === 'true') {
          session::getInstance()->deleteAttribute('tipoDocumentoFilter');
          session::getInstance()->deleteAttribute('tipoDocumentoWhere');
        }
      }
      
      if (request::getInstance()->hasPost('filter')) {    
        
        $filter = request::getInstance()->getPost('filter');      
        
        if (strlen(trim($filter['tipoDocumentoNombre'])) > 0) {
          $where[tipoDocumentoTableClass::NOMBRE] = $filter['tipoDocumentoNombre'];          
        }
        
        if (strlen(trim($filter['tipoDocumentoFechaInicial'])) > 0 && strlen(trim($filter['tipoDocumentoFechaFinal'])) > 0) {
          $where[tipoDocumentoTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['tipoDocumentoFechaInicial'] . ' 00:00:00' )),
              date(config::getFormatTimestamp(), strtotime($filter['tipoDocumentoFechaFinal'] . ' 23:59:59' ))
          );
        }
        
        $this->filter = request::getInstance()->getPost('filter');        
        
        session::getInstance()->setAttribute('tipoDocumentoFilter', $this->filter);
        session::getInstance()->setAttribute('tipoDocumentoWhere', $where);
        
      } else if (session::getInstance()->hasAttribute('tipoDocumentoWhere')) {
          $where = session::getInstance()->getAttribute('tipoDocumentoWhere');
          $this->filter = session::getInstance()->getAttribute('tipoDocumentoFilter');          
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
      
      if (session::getInstance()->hasAttribute('tipoDocumentoWhere')) {
        $filter = session::getInstance()->getAttribute('tipoDocumentoFilter');
        $where = session::getInstance()->getAttribute('tipoDocumentoWhere');
      } 
      
      $this->registros = count(tipoDocumentoTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
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
      
      $this->objTiposDocumento = tipoDocumentoTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      $this->visibleRows = count($this->objTiposDocumento);
      
      if ($this->page > $this->pages) {
        $this->page = $this->pages;
      }
      
      if ($this->visibleRows == 0) {
        
        if (($this->since - $this->rowsperpage) < 0) {
          $this->since = 0;
        } else {
          $this->since = $this->since - $this->rowsperpage;
        }
        
        $this->objTiposDocumento = tipoDocumentoTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
        $this->visibleRows = count($this->objTiposDocumento);        
      }
      
      $this->totalRows = count(tipoDocumentoTableClass::getAll($fields));  
      

      view::includePartial('tipoDocumento/registrosTemplate.html', 
              array(
                  'objTiposDocumento' => $this->objTiposDocumento,
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

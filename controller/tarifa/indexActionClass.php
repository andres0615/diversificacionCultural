<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class indexActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    
    try {        
      
      $fields = array(
          tarifaTableClass::ID,
          tarifaTableClass::DESCRIPCION
      );
      $orderBy = array(
          tarifaTableClass::DESCRIPCION
      );     
      
      $where = null;
      
      if (session::getInstance()->hasAttribute('tarifaWhere')) {
          $where = session::getInstance()->getAttribute('tarifaWhere');
//          $this->filter = session::getInstance()->getAttribute('usuariosFilter');          
      }   
      
      $this->rowsperpage = 3;
      
      $this->page = 1;
      $this->since = $this->page - 1;
      $this->since = $this->since * $this->rowsperpage;
      
      $this->registros = count(tarifaTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
      $this->pages = $this->registros / $this->rowsperpage; 
      
      if (!(is_int($this->pages))) {
        $this->pages = (int)$this->pages + 1;
      }      
      
      $this->objTarifas = tarifaTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      
      $this->sincePage = 1;
      
      if ($this->pages >= 4) {
        $this->untilPage = 4;
      } else  {
        $this->untilPage = $this->pages;
      }
      
      session::getInstance()->setFlash('sincePage', $this->sincePage);
      session::getInstance()->setFlash('untilPage', $this->untilPage);
      
//      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC');     
      
      $this->defineView('index', 'tarifa', session::getInstance()->getFormatOutput());
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

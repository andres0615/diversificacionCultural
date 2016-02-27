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
class adminActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    
    try {      
      
      $fields = array(
          usuarioTableClass::ID,
          usuarioTableClass::USER,
          usuarioTableClass::CREATED_AT
      );
      $orderBy = array(
          usuarioTableClass::USER
      );
      
      $where = null;
      
      if (session::getInstance()->hasAttribute('usuariosWhere')) {
          $where = session::getInstance()->getAttribute('usuariosWhere');
      }   
      
      $this->rowsperpage = 3;
      
      $this->page = 1;
      $this->since = $this->page - 1;
      $this->since = $this->since * $this->rowsperpage;
      
      $this->registros = count(usuarioTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
      $this->pages = $this->registros / $this->rowsperpage; 
      
      if (!(is_int($this->pages))) {
        $this->pages = (int)$this->pages + 1;
      }      
      
      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      
      $this->sincePage = 1;
      
      if ($this->pages >= 4) {
        $this->untilPage = 4;
      } else  {
        $this->untilPage = $this->pages;
      }
      
      session::getInstance()->setFlash('sincePage', $this->sincePage);
      session::getInstance()->setFlash('untilPage', $this->untilPage);
      
//      $this->objUsuarios = usuarioTableClass::getAll($fields, true, $orderBy, 'ASC');
      
      $this->defineView('admin', 'admin', session::getInstance()->getFormatOutput());
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

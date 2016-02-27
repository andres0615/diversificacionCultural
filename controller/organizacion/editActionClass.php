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
class editActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->hasRequest(organizacionTableClass::ID)) {
        $fields = array(
            organizacionTableClass::ID,
            organizacionTableClass::NOMBRE,
            organizacionTableClass::DIRECCION,
            organizacionTableClass::TELEFONO,
            organizacionTableClass::FAX,
            organizacionTableClass::CORREO,
            organizacionTableClass::PAGINA_WEB
        );
        
        $where = array(
            organizacionTableClass::ID => request::getInstance()->getRequest(organizacionTableClass::ID)
        );
        $this->objOrganizacion = organizacionTableClass::getAll($fields, true, null, null, null, null, $where, null);
        $this->defineView('edit', 'organizacion', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

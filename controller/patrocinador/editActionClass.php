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
      if (request::getInstance()->hasRequest(patrocinadorTableClass::ID)) {
        $fields = array(
            patrocinadorTableClass::ID,
            patrocinadorTableClass::NOMBRE,
            patrocinadorTableClass::TELEFONO,
            patrocinadorTableClass::CORREO,
            patrocinadorTableClass::DIRECCION
        );
        
        $where = array(
            patrocinadorTableClass::ID => request::getInstance()->getRequest(patrocinadorTableClass::ID)
        );
        $this->objPatrocinadores = patrocinadorTableClass::getAll($fields, true, null, null, null, null, $where, null);
        $this->defineView('edit', 'patrocinador', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

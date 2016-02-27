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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID, true));
        
        $fields = array(
            estadoPqrsTableClass::ID,
            estadoPqrsTableClass::NOMBRE
        );
        $where = array(
            estadoPqrsTableClass::ID => $id
        );
        $this->objEstadoPqrs = estadoPqrsTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objEstadoPqrs = $this->objEstadoPqrs[0];
        
        $estadoPqrsName =  estadoPqrsTableClass::NOMBRE;
        
        $estadoPqrs = $objEstadoPqrs->$estadoPqrsName;
        
        $ids = array(
            estadoPqrsTableClass::ID => $id
        );
        estadoPqrsTableClass::delete($ids, true);
        $mensaje = i18n::__(00034, null, 'success', array(':estadoPqrs' => $estadoPqrs));
          
        echo $mensaje;
        echo "¬";
        echo "true";
        die();
//        routing::getInstance()->redirect('default', 'index');
      } else {
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

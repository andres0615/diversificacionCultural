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

        $id = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::ID, true));
        
        $fields = array(
            eventoTableClass::ID,
            eventoTableClass::NOMBRE
        );
        $where = array(
            eventoTableClass::ID => $id
        );
        $this->objEvento = eventoTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objEvento = $this->objEvento[0];
        
        $eventoName =  eventoTableClass::NOMBRE;
        
        $evento = $objEvento->$eventoName;
        
        $ids = array(
            eventoTableClass::ID => $id
        );
        eventoTableClass::delete($ids, true);
        $mensaje = i18n::__(00042, null, 'success', array(':evento' => $evento));
          
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

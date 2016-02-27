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

        $id = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::ID, true));
        
        $fields = array(
            localidadTableClass::ID,
            localidadTableClass::NOMBRE
        );
        $where = array(
            localidadTableClass::ID => $id
        );
        $this->objLocalidad = localidadTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objLocalidad = $this->objLocalidad[0];
        
        $localidadName =  localidadTableClass::NOMBRE;
        
        $localidad = $objLocalidad->$localidadName;
        
        $ids = array(
            localidadTableClass::ID => $id
        );
        localidadTableClass::delete($ids, true);
        $mensaje = i18n::__(00006, null, 'success', array(':localidad' => $localidad));
          
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

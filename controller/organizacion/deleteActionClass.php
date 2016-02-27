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

        $id = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::ID, true));
        
        $fields = array(
            organizacionTableClass::ID,
            organizacionTableClass::NOMBRE
        );
        $where = array(
            organizacionTableClass::ID => $id
        );
        $this->objOrganizacion = organizacionTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objOrganizacion = $this->objOrganizacion[0];
        
        $organizacionName =  organizacionTableClass::NOMBRE;
        
        $organizacion = $objOrganizacion->$organizacionName;
        
        $ids = array(
            organizacionTableClass::ID => $id
        );
        organizacionTableClass::delete($ids, true);
        $mensaje = i18n::__(00013, null, 'success', array(':organizacion' => $organizacion));
          
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

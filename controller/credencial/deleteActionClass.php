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

        $id = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));
        
        $fields = array(
            credencialTableClass::ID,
            credencialTableClass::NOMBRE
        );
        $where = array(
            credencialTableClass::ID => $id
        );
        $this->objCredencial = credencialTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objCredencial = $this->objCredencial[0];
        
        $credencialName =  credencialTableClass::NOMBRE;
        
        $credencial = $objCredencial->$credencialName;
        
        $ids = array(
            credencialTableClass::ID => $id
        );
        credencialTableClass::delete($ids, true);
        $mensaje = i18n::__(00045, null, 'success', array(':credencial' => $credencial));
          
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

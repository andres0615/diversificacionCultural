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

        $id = request::getInstance()->getPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::ID, true));
        
        $fields = array(
            tipoPqrsTableClass::ID,
            tipoPqrsTableClass::NOMBRE
        );
        $where = array(
            tipoPqrsTableClass::ID => $id
        );
        $this->objTipoPqrs = tipoPqrsTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objTipoPqrs = $this->objTipoPqrs[0];
        
        $tipoPqrsName =  tipoPqrsTableClass::NOMBRE;
        
        $tipoPqrs = $objTipoPqrs->$tipoPqrsName;
        
        $ids = array(
            tipoPqrsTableClass::ID => $id
        );
        tipoPqrsTableClass::delete($ids, true);
        $mensaje = i18n::__(00030, null, 'success', array(':tipoPqrs' => $tipoPqrs));
          
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

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

        $id = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::ID, true));
        
        $fields = array(
            patrocinadorTableClass::ID,
            patrocinadorTableClass::NOMBRE
        );
        $where = array(
            patrocinadorTableClass::ID => $id
        );
        $this->objPatrocinador = patrocinadorTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objPatrocinador = $this->objPatrocinador[0];
        
        $patrocinadorName =  patrocinadorTableClass::NOMBRE;
        
        $patrocinador = $objPatrocinador->$patrocinadorName;
        
        $ids = array(
            patrocinadorTableClass::ID => $id
        );
        patrocinadorTableClass::delete($ids, true);
        $mensaje = i18n::__(00044, null, 'success', array(':patrocinador' => $patrocinador));

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

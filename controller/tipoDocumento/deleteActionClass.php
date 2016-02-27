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

        $id = request::getInstance()->getPost(tipoDocumentoTableClass::getNameField(tipoDocumentoTableClass::ID, true));
        
        $fields = array(
            tipoDocumentoTableClass::ID,
            tipoDocumentoTableClass::NOMBRE
        );
        $where = array(
            tipoDocumentoTableClass::ID => $id
        );
        $this->objTipoDocumento = tipoDocumentoTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objTipoDocumento = $this->objTipoDocumento[0];
        
        $tipoDocumentoName =  tipoDocumentoTableClass::NOMBRE;
        
        $tipoDocumento = $objTipoDocumento->$tipoDocumentoName;
        
        $ids = array(
            tipoDocumentoTableClass::ID => $id
        );
        tipoDocumentoTableClass::delete($ids, true);
        $mensaje = i18n::__(00010, null, 'success', array(':tipoDocumento' => $tipoDocumento));
          
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

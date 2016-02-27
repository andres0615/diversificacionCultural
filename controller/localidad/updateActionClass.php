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
class updateActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::ID, true));
        $nombre = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::NOMBRE, true));
        $localidad_id = request::getInstance()->getPost(localidadTableClass::getNameField(localidadTableClass::LOCALIDAD_ID, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } 

        $ids = array(
          localidadTableClass::ID => $id
        );

        if (strlen(trim($localidad_id)) == 0) {
          $localidad_id = null;
        } 
        
        $data = array(
          localidadTableClass::NOMBRE => $nombre,
          localidadTableClass::LOCALIDAD_ID => $localidad_id
        );

        localidadTableClass::update($ids, $data);

        $mensaje = i18n::__(00008, null, 'success', array(':localidad' => $nombre));

        echo $mensaje;
        echo "¬";
        echo "true";
        die();       
        
      }else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

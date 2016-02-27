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

        $id = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::ID, true));
        $nombre = request::getInstance()->getPost(credencialTableClass::getNameField(credencialTableClass::NOMBRE, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } 

        $ids = array(
          credencialTableClass::ID => $id
        );
        
        $data = array(
          credencialTableClass::NOMBRE => $nombre
        );

        credencialTableClass::update($ids, $data);

        $mensaje = i18n::__(00037, null, 'success', array(':credencial' => $nombre));

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

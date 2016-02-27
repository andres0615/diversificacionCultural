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

        $id = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ID, true));
        $nombre = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::NOMBRE, true));
        $actived = request::getInstance()->getPost(estadoPqrsTableClass::getNameField(estadoPqrsTableClass::ACTIVED, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($nombre)) > estadoPqrsBaseTableClass::NOMBRE_LENGTH) {
          $mensaje = i18n::__(00019, null, 'errors', array(':longitud' => estadoPqrsTableClass::NOMBRE_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($actived)) == 0) { 
          $mensaje = i18n::__(00027, null, 'errors');
          echo $mensaje;
          die();
        }

        $ids = array(
          estadoPqrsTableClass::ID => $id
        );
        
        $data = array(
          estadoPqrsTableClass::NOMBRE => $nombre,
          estadoPqrsTableClass::ACTIVED => $actived
        );

        estadoPqrsTableClass::update($ids, $data);

        $mensaje = i18n::__(00033, null, 'success', array(':estadoPqrs' => $nombre));

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

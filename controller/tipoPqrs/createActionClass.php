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
class createActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      
      if (request::getInstance()->isMethod('POST')) {
        
        $nombre = request::getInstance()->getPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::NOMBRE, true));
        $actived = request::getInstance()->getPost(tipoPqrsTableClass::getNameField(tipoPqrsTableClass::ACTIVED, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($nombre)) > tipoPqrsBaseTableClass::NOMBRE_LENGTH) {
          $mensaje = i18n::__(00019, null, 'errors', array(':longitud' => tipoPqrsTableClass::NOMBRE_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($actived)) == 0) { 
          $mensaje = i18n::__(00027, null, 'errors');
          echo $mensaje;
          die();
        }
       
        $data = array(
            tipoPqrsTableClass::NOMBRE => $nombre,
            tipoPqrsTableClass::ACTIVED => $actived
        );
        
        tipoPqrsTableClass::insert($data);

        $mensaje = i18n::__(00028, null, 'success', array(':tipoPqrs' => $nombre));

        echo $mensaje;
        echo "¬";
        echo "true";
        die();
        
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

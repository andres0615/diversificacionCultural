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

        $id = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::ID, true));
        $descripcion = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::DESCRIPCION, true));
        $valor= request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::VALOR, true));
        $actived = request::getInstance()->getPost(tarifaTableClass::getNameField(tarifaTableClass::ACTIVED, true));
        
        if (strlen(trim($descripcion)) == 0) { 
          $mensaje = i18n::__(00023, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($descripcion)) > tarifaTableClass::DESCRIPCION_LENGTH) {
          $mensaje = i18n::__(00026, null, 'errors', array(':longitud' => tarifaTableClass::DESCRIPCION_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($valor)) == 0) { 
          $mensaje = i18n::__(00024, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($actived)) == 0) { 
          $mensaje = i18n::__(00025, null, 'errors');
          echo $mensaje;
          die();
        }

        $ids = array(
          tarifaTableClass::ID => $id
        );
        
        $data = array(
          tarifaTableClass::DESCRIPCION => $descripcion,
          tarifaTableClass::VALOR => $valor,
          tarifaTableClass::ACTIVED => $actived
        );

        tarifaTableClass::update($ids, $data);

        $mensaje = i18n::__(00025, null, 'success');

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

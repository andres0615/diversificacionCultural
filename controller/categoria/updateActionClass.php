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

        $id = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::ID, true));
        $nombre = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::NOMBRE, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($nombre)) > categoriaTableClass::NOMBRE_LENGTH) {
            $mensaje = i18n::__(00010, null, 'errors', array(':longitud' => categoriaTableClass::NOMBRE_LENGTH));
            echo $mensaje;
            die();
        }

        $ids = array(
          categoriaTableClass::ID => $id
        );
        
        $data = array(
          categoriaTableClass::NOMBRE => $nombre
        );

        categoriaTableClass::update($ids, $data);

        $mensaje = i18n::__(00021, null, 'success', array(':categoria' => $nombre));

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

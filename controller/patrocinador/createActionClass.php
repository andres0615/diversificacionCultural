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
        
        $nombre = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::NOMBRE, true));
        $telefono = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::TELEFONO, true));
        $correo = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::CORREO, true));
        $direccion = request::getInstance()->getPost(patrocinadorTableClass::getNameField(patrocinadorTableClass::DIRECCION, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($nombre)) > patrocinadorTableClass::NOMBRE_LENGTH) {
            $mensaje = i18n::__(00010, null, 'errors', array(':longitud' => patrocinadorTableClass::NOMBRE_LENGTH));
            echo $mensaje;
            die();
        }
        
        if (strlen(trim($telefono)) == 0) { 
          $mensaje = i18n::__(00009, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($telefono)) > patrocinadorTableClass::TELEFONO_LENGTH) {
            $mensaje = i18n::__(00020, null, 'errors', array(':longitud' => patrocinadorTableClass::TELEFONO_LENGTH));
            echo $mensaje;
            die();
        }
        
        if (strlen(trim($correo)) == 0) { 
          $mensaje = i18n::__(00010, null, 'errors');
          echo $mensaje;
          die();
        } elseif (!(preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $correo))) {
          $mensaje = i18n::__(00011, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($correo)) > patrocinadorTableClass::CORREO_LENGTH) {
            $mensaje = i18n::__(00021, null, 'errors', array(':longitud' => patrocinadorTableClass::CORREO_LENGTH));
            echo $mensaje;
            die();
        }
        
        
        if (strlen(trim($direccion)) == 0) { 
          $mensaje = i18n::__(00008, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($direccion)) > patrocinadorTableClass::DIRECCION_LENGTH) {
            $mensaje = i18n::__(00022, null, 'errors', array(':longitud' => patrocinadorTableClass::DIRECCION_LENGTH));
            echo $mensaje;
            die();
        }
       
        $data = array(
            patrocinadorTableClass::NOMBRE => $nombre,
            patrocinadorTableClass::TELEFONO => $telefono,
            patrocinadorTableClass::CORREO => $correo,
            patrocinadorTableClass::DIRECCION => $direccion
        );
        
        patrocinadorTableClass::insert($data);

        $mensaje = i18n::__(00016, null, 'success', array(':patrocinador' => $nombre));

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

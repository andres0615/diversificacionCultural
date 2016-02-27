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

        $id = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::ID, true));
        $nombre = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::NOMBRE, true));
        $direccion = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::DIRECCION, true));
        $telefono = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::TELEFONO, true));
        $fax = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::FAX, true));
        $correo = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::CORREO, true));
        $pagina_web = request::getInstance()->getPost(organizacionTableClass::getNameField(organizacionTableClass::PAGINA_WEB, true));
        
        if (strlen(trim($nombre)) == 0) { 
          $mensaje = i18n::__(00007, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($direccion)) == 0) { 
          $mensaje = i18n::__(00008, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($telefono)) == 0) { 
          $mensaje = i18n::__(00009, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($correo)) == 0) { 
          $mensaje = i18n::__(00010, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (!(preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $correo))) {
          $mensaje = i18n::__(00011, null, 'errors');
          echo $mensaje;
          die();
        }

        $ids = array(
          organizacionTableClass::ID => $id
        );
        
        $data = array(
          organizacionTableClass::NOMBRE => $nombre,
          organizacionTableClass::DIRECCION => $direccion,
          organizacionTableClass::TELEFONO => $telefono,
          organizacionTableClass::FAX => $fax,
          organizacionTableClass::CORREO => $correo,
          organizacionTableClass::PAGINA_WEB => $pagina_web
        );

        organizacionTableClass::update($ids, $data);

        $mensaje = i18n::__(00012, null, 'success', array(':organizacion' => $nombre));

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

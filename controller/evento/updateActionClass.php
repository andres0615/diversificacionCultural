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

        $id = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::ID, true));
        $eventoNombre = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::NOMBRE, true));
        $eventoDescripcion = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DESCRIPCION, true));
        $eventoFechaInicial = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_EVENTO, true));
        $eventoFechaFinal = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_EVENTO, true));
        $eventoLatitud = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LATITUD, true));
        $eventoLongitud = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::LUGAR_LONGITUD, true));
        $eventoDireccion = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::DIRECCION, true));
        $eventoCosto = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::COSTO, true));
        $eventoUsuarioId = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::USUARIO_ID, true));
        $eventoCategoriaId = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::CATEGORIA_ID, true));
        $eventoFechaInicialPublicacion = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_INICIAL_PUBLICACION, true));
        $eventoFechaFinalPublicacion = request::getInstance()->getPost(eventoTableClass::getNameField(eventoTableClass::FECHA_FINAL_PUBLICACION, true));
        
//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";
//        die();
        
        if (strlen(trim($eventoNombre)) == 0) { 
          $mensaje = i18n::__(00012, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoNombre)) > eventoTableClass::NOMBRE_LENGTH) {
          $mensaje = i18n::__(00033, null, 'errors', array(':longitud' => eventoTableClass::NOMBRE_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoDescripcion)) == 0) { 
          $mensaje = i18n::__(00023, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoDescripcion)) > eventoTableClass::DESCRIPCION_LENGTH) {
          $mensaje = i18n::__(00026, null, 'errors', array(':longitud' => eventoTableClass::DESCRIPCION_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoFechaInicial)) == 0) {
          $mensaje = i18n::__(00029, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoFechaFinal)) == 0) {
          $mensaje = i18n::__(00030, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoLatitud)) == 0) {
          $mensaje = i18n::__(00031, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoLatitud)) > eventoTableClass::LUGAR_LATITUD_LENGTH) {
          $mensaje = i18n::__(00034, null, 'errors', array(':longitud' => eventoTableClass::LUGAR_LATITUD_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoLongitud)) == 0) {
          $mensaje = i18n::__(00032, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoLongitud)) > eventoTableClass::LUGAR_LONGITUD_LENGTH) {
          $mensaje = i18n::__(00035, null, 'errors', array(':longitud' => eventoTableClass::LUGAR_LONGITUD_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoDireccion)) == 0) { 
          $mensaje = i18n::__(00008, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoDireccion)) > eventoTableClass::DIRECCION_LENGTH) {
          $mensaje = i18n::__(00036, null, 'errors', array(':longitud' => eventoTableClass::DESCRIPCION_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoCosto)) == 0) { 
          $mensaje = i18n::__(00037, null, 'errors');
          echo $mensaje;
          die();
        } elseif(!is_numeric($eventoCosto)) {
          $mensaje = i18n::__(00041, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoUsuarioId)) == 0) { 
          $mensaje = i18n::__(00038, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoCategoriaId)) == 0) { 
          $eventoCategoriaId = null;
        } 
        
        if (strlen(trim($eventoFechaInicialPublicacion)) == 0) {
          $mensaje = i18n::__(00039, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoFechaFinalPublicacion)) == 0) {
          $mensaje = i18n::__(00040, null, 'errors');
          echo $mensaje;
          die();
        }

        $ids = array(
          eventoTableClass::ID => $id
        );

        $data = array(
          eventoTableClass::NOMBRE => $eventoNombre,
          eventoTableClass::DESCRIPCION => $eventoDescripcion,
          eventoTableClass::FECHA_INICIAL_EVENTO => $eventoFechaInicial,
          eventoTableClass::FECHA_FINAL_EVENTO => $eventoFechaFinal,
          eventoTableClass::LUGAR_LATITUD => $eventoLatitud,
          eventoTableClass::LUGAR_LONGITUD => $eventoLongitud,
          eventoTableClass::DIRECCION => $eventoDireccion,
          eventoTableClass::COSTO => $eventoCosto,
          eventoTableClass::USUARIO_ID => $eventoUsuarioId,
          eventoTableClass::CATEGORIA_ID => $eventoCategoriaId,
          eventoTableClass::FECHA_INICIAL_PUBLICACION => $eventoFechaInicialPublicacion,
          eventoTableClass::FECHA_FINAL_PUBLICACION => $eventoFechaFinalPublicacion
        );
        
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
//        die();

        eventoTableClass::update($ids, $data);

        $mensaje = i18n::__(00041, null, 'success');

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

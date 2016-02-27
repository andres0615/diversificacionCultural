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
        $eventoArchivoImagen = $_FILES[eventoTableClass::getNameField(eventoTableClass::IMAGEN, true)];
        
        if (strlen(trim($eventoNombre)) == 0) { 
          $mensaje = i18n::__(0007, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoNombre)) > eventoTableClass::NOMBRE_LENGTH) {
          $mensaje = i18n::__(00023, null, 'errors', array(':longitud' => eventoTableClass::NOMBRE_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoDescripcion)) == 0) { 
          $mensaje = i18n::__(00027, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoDescripcion)) > eventoTableClass::DESCRIPCION_LENGTH) {
          $mensaje = i18n::__(00032, null, 'errors', array(':longitud' => eventoTableClass::DESCRIPCION_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoFechaInicial)) == 0) {
          $mensaje = i18n::__(00031, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoFechaFinal)) == 0) {
          $mensaje = i18n::__(00034, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoLatitud)) == 0) {
          $mensaje = i18n::__(00037, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoLatitud)) > eventoTableClass::LUGAR_LATITUD_LENGTH) {
          $mensaje = i18n::__(00042, null, 'errors', array(':longitud' => eventoTableClass::LUGAR_LATITUD_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoLongitud)) == 0) {
          $mensaje = i18n::__(00040, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoLongitud)) > eventoTableClass::LUGAR_LONGITUD_LENGTH) {
          $mensaje = i18n::__(00043, null, 'errors', array(':longitud' => eventoTableClass::LUGAR_LONGITUD_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoDireccion)) == 0) { 
          $mensaje = i18n::__(00010, null, 'errors');
          echo $mensaje;
          die();
        } elseif (strlen(trim($eventoDireccion)) > eventoTableClass::DIRECCION_LENGTH) {
          $mensaje = i18n::__(00044, null, 'errors', array(':longitud' => eventoTableClass::DESCRIPCION_LENGTH));
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoCosto)) == 0) { 
          $mensaje = i18n::__(00045, null, 'errors');
          echo $mensaje;
          die();
        } elseif(!(is_numeric($eventoCosto))) {
          $mensaje = i18n::__(00051, null, 'errors');
          echo $mensaje;
          die();
        }
        
        if (strlen(trim($eventoUsuarioId)) == 0) { 
          $mensaje = i18n::__(00046, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoCategoriaId)) == 0) { 
          $eventoCategoriaId = null;
        } 
        
        if (strlen(trim($eventoFechaInicialPublicacion)) == 0) {
          $mensaje = i18n::__(00047, null, 'errors');
          echo $mensaje;
          die();
        } 
        
        if (strlen(trim($eventoFechaFinalPublicacion)) == 0) {
          $mensaje = i18n::__(00050, null, 'errors');
          echo $mensaje;
          die();
        }

        if(is_array($eventoArchivoImagen)) {

          $response = eventoTableClass::uploadImage($eventoArchivoImagen);
          extract($response);

          if (isset($mensaje)) {
            echo $mensaje;
            die();
          }

        } else {
          $eventoImagen = config::getDefaultEventImg();
        }

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
            eventoTableClass::FECHA_FINAL_PUBLICACION => $eventoFechaFinalPublicacion,
            eventoTableClass::IMAGEN => $eventoImagen
        );

        if(isset($evento_codigo)) {
          $data[eventoTableClass::ID] = $evento_codigo;
        }

        eventoTableClass::insert($data);

        $mensaje = i18n::__(00050, null, 'success');

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

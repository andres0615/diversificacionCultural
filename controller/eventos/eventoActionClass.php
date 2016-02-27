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
class eventoActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    
    try {
      
      if (request::getInstance()->hasRequest(eventoTableClass::ID)) {
        $fields = array(
            eventoTableClass::ID,
            eventoTableClass::NOMBRE,
            eventoTableClass::DESCRIPCION,
            eventoTableClass::FECHA_INICIAL_EVENTO,
            eventoTableClass::FECHA_FINAL_EVENTO,
            eventoTableClass::LUGAR_LATITUD,
            eventoTableClass::LUGAR_LONGITUD,
            eventoTableClass::DIRECCION,
            eventoTableClass::COSTO,
            eventoTableClass::USUARIO_ID,
            eventoTableClass::CATEGORIA_ID,
            eventoTableClass::FECHA_INICIAL_PUBLICACION,
            eventoTableClass::FECHA_FINAL_PUBLICACION,
            eventoTableClass::IMAGEN
        );
        $where = array(
            eventoTableClass::ID => request::getInstance()->getRequest(eventoTableClass::ID)
        );
        
        $this->objEvento = eventoTableClass::getAll($fields, true, null, null, null, null, $where);
        $usuarioIdCampoName = eventoTableClass::USUARIO_ID;
        //$this->objUsuario = eventoTableClass::getEventoUsuarioNombre($this->objEvento[0]->$usuarioIdCampoName);
        $categoriaIdCampoName = eventoTableClass::CATEGORIA_ID;
        $this->objCategoria = eventoTableClass::getEventoCategoriaNombre($this->objEvento[0]->$categoriaIdCampoName);
        
        $eventoFecha = eventoTableClass::FECHA_INICIAL_EVENTO;
        
        $fecha = strtotime(substr($this->objEvento[0]->$eventoFecha, 0, 10));
        
        $this->year1 = date("Y", $fecha);
        $mes1 = date("m", $fecha);
        
        $mesCodigo1 = '$mesCodigo1';
        
        eval("$mesCodigo1 =  000$mes1;");
        
        $this->mesNombre1 = i18n::__($mesCodigo1, null, 'mes');
        $this->dia1 = date("d", $fecha);
        
        $organizadorId = eventoTableClass::getOrganizadorId(request::getInstance()->getRequest(eventoTableClass::ID));
        
        $where1 = array(
        organizacionTableClass::ID => $organizadorId
        );
        
        $fields1 = array(
            organizacionTableClass::NOMBRE,
            organizacionTableClass::DIRECCION,
            organizacionTableClass::TELEFONO,
            organizacionTableClass::CORREO,
            organizacionTableClass::PAGINA_WEB
        );

        if (strlen(trim($organizadorId)) > 0) {
          $this->objOrganizacion = organizacionTableClass::getAll($fields1, true, null, null, null, null, $where1);

          $organizacionNombre = organizacionTableClass::NOMBRE;
          $organizacionDireccion = organizacionTableClass::DIRECCION;
          $organizacionTelefono = organizacionTableClass::TELEFONO;
          $organizacionCorreo = organizacionTableClass::CORREO;
          $organizacionPaginaWeb = organizacionTableClass::PAGINA_WEB;

          $this->organizador->nombre = $this->objOrganizacion[0]->$organizacionNombre;
          $this->organizador->direccion = $this->objOrganizacion[0]->$organizacionDireccion;
          $this->organizador->telefono = $this->objOrganizacion[0]->$organizacionTelefono;
          $this->organizador->correo = $this->objOrganizacion[0]->$organizacionCorreo;
          $this->organizador->pagina_web = $this->objOrganizacion[0]->$organizacionPaginaWeb;

        } else {

          $usuarioId = eventoTableClass::USUARIO_ID;

          $this->objUsuario = usuarioTableClass::getDatosUsuario($this->objEvento[0]->$usuarioId);

          //echo $this->objEvento->$usuarioId;

          $nombre = datoUsuarioTableClass::NOMBRE;
          $apellido = datoUsuarioTableClass::APELLIDO;
          $correo = datoUsuarioTableClass::CORREO;

          //$this->organizador->nombre = $this->objUsuario[0]->$nombre . " " . $this->objUsuario->$apellido;
          //$this->organizador->direccion = $this->objUsuario[0]->$direccion;

          $this->organizador->nombre = $this->objUsuario->nombre . " " . $this->objUsuario->apellido;
          $this->organizador->correo = $this->objUsuario->correo;
        }
        
        $this->defineView('evento', 'eventos', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('eventos', 'index');
      }
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

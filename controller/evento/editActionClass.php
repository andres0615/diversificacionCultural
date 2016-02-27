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
class editActionClass extends controllerClass implements controllerActionInterface {

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
            eventoTableClass::FECHA_FINAL_PUBLICACION
        );
        
        $where = array(
            eventoTableClass::ID => request::getInstance()->getRequest(eventoTableClass::ID)
        );
        
        $this->objEvento = eventoTableClass::getAll($fields, true, null, null, null, null, $where);
        $usuarioIdCampoName = eventoTableClass::USUARIO_ID;
        $this->objUsuario = eventoTableClass::getEventoUsuarioNombre($this->objEvento[0]->$usuarioIdCampoName);
        $categoriaIdCampoName = eventoTableClass::CATEGORIA_ID;
        $this->objCategoria = eventoTableClass::getEventoCategoriaNombre($this->objEvento[0]->$categoriaIdCampoName);
        
        $this->defineView('edit', 'evento', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

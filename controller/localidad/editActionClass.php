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
      if (request::getInstance()->hasRequest(localidadTableClass::ID)) {
        $fields = array(
            localidadTableClass::getNameTable() . '.' . localidadTableClass::ID,
            localidadTableClass::getNameTable() . '.' . localidadTableClass::NOMBRE,
            localidadTableClass::getNameTable() . '.' . localidadTableClass::LOCALIDAD_ID,
            'localidad1.nombre as localidad_perteneciente_nombre'
        );
        
        $join = array(
          array(
              'TABLE1_NAME' => localidadTableClass::getNameTable(),
              'TABLE1_COLUMN' => localidadTableClass::LOCALIDAD_ID,
              'TABLE2_NAME' => localidadTableClass::getNameTable(),
              'TABLE2_ALIAS' => 'localidad1',
              'TABLE2_COLUMN' => localidadTableClass::ID,
              'JOIN_TYPE' => 'LEFT'
          )/*,
          array(
              'TABLE1_NAME' => 'localidad1',
              'TABLE1_COLUMN' => localidadTableClass::LOCALIDAD_ID,
              'TABLE2_NAME' => localidadTableClass::getNameTable(),
              'TABLE2_ALIAS' => 'localidad2',
              'TABLE2_COLUMN' => localidadTableClass::ID,
              'JOIN_TYPE' => 'LEFT'
          )*/
        );
        
        /*echo "<pre>";
        print_r($join);
        echo "</pre>";*/
        
        $where = array(
            localidadTableClass::getNameTable() . '.' .localidadTableClass::ID => request::getInstance()->getRequest(localidadTableClass::ID)
        );
        $this->objLocalidad = localidadTableClass::getAll($fields, true, null, null, null, null, $where, null, $join);
        $this->defineView('edit', 'localidad', session::getInstance()->getFormatOutput());
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

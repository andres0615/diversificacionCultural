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
class deleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {
      if (request::getInstance()->isMethod('POST')) {

        $id = request::getInstance()->getPost(categoriaTableClass::getNameField(categoriaTableClass::ID, true));
        
        $fields = array(
            categoriaTableClass::ID,
            categoriaTableClass::NOMBRE
        );
        $where = array(
            categoriaTableClass::ID => $id
        );
        $this->objCategoria = categoriaTableClass::getAll($fields, true, null, null, null, null, $where);
        
        $objCategoria = $this->objCategoria[0];
        
        $categoriaName =  categoriaTableClass::NOMBRE;
        
        $categoria = $objCategoria->$categoriaName;
        
        $ids = array(
            categoriaTableClass::ID => $id
        );
        categoriaTableClass::delete($ids, true);
        $mensaje = i18n::__(00022, null, 'success', array(':categoria' => $categoria));
          
        echo $mensaje;
        echo "¬";
        echo "true";
        die();
//        routing::getInstance()->redirect('default', 'index');
      } else {
        routing::getInstance()->redirect('default', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

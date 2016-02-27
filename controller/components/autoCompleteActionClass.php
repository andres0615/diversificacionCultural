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
class autoCompleteActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {        
      
      if (request::getInstance()->hasPost('data')) {
        $data = request::getInstance()->getPost('data');
        
        $table = $data['table'];        
        $id = $data['id'];
        $column = $data['column']; 
        $columnvalue = $data['columnvalue'];
        
        $tableClass = $table . 'TableClass';
        
        $idData = '$idData';
        $columnData = '$columnData';
        
        eval("$idData = $tableClass::$id;");
        eval("$columnData = $tableClass::$column;");
        
        $fields = array(          
          $idData,
          $columnData       
        );
        
        $orderBy = array(
            $columnData
        );
        
        $like[$columnData] = $columnvalue;
        
        $this->objData = $tableClass::getAll($fields, true, $orderBy, 'ASC', null, 10, null, $like);
        
        $contador = 0;
        
        echo "[";
      
        foreach ($this->objData as $item) {

          if ($contador++ > 0) {
            echo ", ";          
          }

          echo "{" .
                "\"label\"" . ":" . "\"" . $item->$columnData . "\"," .
                "\"value\"". ":" . "{" . "\"descripcion1\"" . ":" . "\"" . $item->$idData . "\"" . "}" .
              "}";

        }
        
        echo "]";
        
      }
      
//      echo  "[{" .
//              "\"label\"" . ":" . "\"descripcion\"," .
//              "\"value\"". ":" . "{" . "\"descripcion1\"" . ":" . "\"valordescripcion1\"" . "}" .
//            "}" . ","  .
//            "{" .
//              "\"label\"" . ":" . "\"descripcion2\"," .
//              "\"value\"" . ":" . "{" . "\"descripcion1\"" . ":" . "\"valordescripcion2\"" . "}" .
//              "}]";
      
      
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

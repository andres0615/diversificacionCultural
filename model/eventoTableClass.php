<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of eventoTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class eventoTableClass extends eventoBaseTableClass {
    public static function getEventoUsuarioNombre($usuarioId) {
      try {
        $sql = "SELECT u." . usuarioTableClass::USER . " as user_name FROM " 
                . usuarioTableClass::getNameTable() . " u "                
                . " WHERE u." . usuarioTableClass::ID . " = :usuarioId";
        $params = array(
            ':usuarioId' => $usuarioId
        );
        
//        echo "<pre>";
//        print_r($sql);
//        echo "</pre>";

        $answer = model::getInstance()->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer : false;
      } catch (PDOException $exc) {
        throw $exc;
      }
    }
    
    public static function getEventoCategoriaNombre($categoriaId) {
      try {
        $sql = "SELECT c." . categoriaTableClass::NOMBRE . " as nombre FROM " 
                . categoriaTableClass::getNameTable() . " c "                
                . " WHERE c." . categoriaTableClass::ID . " = :categoriaId";
        $params = array(
            ':categoriaId' => $categoriaId
        );
        
        /*echo "<pre>";
        print_r($sql);
        echo "</pre>";*/

        $answer = model::getInstance()->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(PDO::FETCH_OBJ);
        return (count($answer) > 0 ) ? $answer : false;
      } catch (PDOException $exc) {
        throw $exc;
      }
    }
    
    public static function getOrganizadorId($eventoId) {
      try {
        
        $sql = "select " 
                . " o." . organizacionTableClass::ID
                . " from "
                . eventoTableClass::getNameTable() . " e "
                . " left join " . usuarioTableClass::getNameTable() .  " u on u." . usuarioTableClass::ID . " = e." . eventoTableClass::USUARIO_ID
                . " left join " . datoUsuarioTableClass::getNameTable() . " da on da." . datoUsuarioTableClass::USUARIO_ID . " = u." . usuarioTableClass::ID
                . " left join " . organizacionTableClass::getNameTable() . " o on o." . organizacionTableClass::ID . " = da." . datoUsuarioTableClass::ORGANIZACION_ID
                . " where e." . eventoTableClass::ID . " = :eventoId";
        
//        echo "<pre>";
//        echo $sql;
//        echo "</pre>";
        
        $params = array(
            ':eventoId' => $eventoId
        );

        $answer = model::getInstance()->prepare($sql);
        $answer->execute($params);
        $answer = $answer->fetchAll(PDO::FETCH_OBJ);
        $campoId = organizacionTableClass::ID;
        $organizadorId = $answer[0]->$campoId;        
        return $organizadorId;
      } catch (PDOException $exc) {
        throw $exc;
      }
    }

    public static function getEventoCodigo($param) {

      $sql = "select " . $param . "val('evento_id_seq'::regclass) as codigo;";

      $answer = model::getInstance()->prepare($sql);
      $answer->execute();
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);

      $codigo = $answer[0]->codigo;
      return $codigo;
    }

    public static function uploadImage($file) {
      $response = array();

      $allowedType = array('image');
      $type = strstr($file['type'], '/', true);

      if(! in_array($type, $allowedType)) {
        $response['mensaje'] = i18n::__(00052, null, 'errors');
        return $response;
      }

      $allowedExt = array('jpeg', 'png');
      $ext = substr(strrchr($file['type'], '/'), 1);

      if(! in_array($ext, $allowedExt)) {
        $response['mensaje'] = i18n::__(00053, null, 'errors');
        return $response;
      }

      $ruta_imagen = $file['tmp_name'];

      $miniatura_ancho_maximo = 420;
      $miniatura_alto_maximo = 420;

      $info_imagen = getimagesize($ruta_imagen);
      $imagen_ancho = $info_imagen[0];
      $imagen_alto = $info_imagen[1];
      $imagen_tipo = $info_imagen['mime'];

      $proporcion_imagen = $imagen_ancho / $imagen_alto;
      $proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

      if ( $proporcion_imagen > $proporcion_miniatura ){
        $miniatura_ancho = $miniatura_alto_maximo * $proporcion_imagen;
        $miniatura_alto = $miniatura_alto_maximo;
      } else if ( $proporcion_imagen < $proporcion_miniatura ){
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
      } else {
        $miniatura_ancho = $miniatura_ancho_maximo;
        $miniatura_alto = $miniatura_alto_maximo;
      }

      $x = ( $miniatura_ancho - $miniatura_ancho_maximo ) / 2;
      $y = ( $miniatura_alto - $miniatura_alto_maximo ) / 2;

      switch ( $imagen_tipo ){
        case "image/jpg":
        case "image/jpeg":
          $imagen = imagecreatefromjpeg( $ruta_imagen );
          break;
        case "image/png":
          $imagen = imagecreatefrompng( $ruta_imagen );
          break;
        case "image/gif":
          $imagen = imagecreatefromgif( $ruta_imagen );
          break;
      }

      $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
      $lienzo_temporal = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

      $negro = imagecolorallocate($lienzo, 0, 0, 0);
      $negro_temporal = imagecolorallocate($lienzo_temporal, 0, 0, 0);

      imagecolortransparent($lienzo, $negro);
      imagecolortransparent($lienzo_temporal, $negro_temporal);

      imagecopyresampled($lienzo_temporal, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
      imagecopy($lienzo, $lienzo_temporal, 0,0, $x, $y, $miniatura_ancho_maximo, $miniatura_alto_maximo);

      //imagejpeg($lienzo, "ruta/de/la/miniatura.jpg", 80);

      $extOrg = substr(strrchr($file["name"], "."), 1);

      $upload_img_path = config::getPathAbsolute() . config::getImgUploadPath() . config::getUploadEventImgFolder();
      $evento_codigo = self::getEventoCodigo("next");
      $response['evento_codigo'] = $evento_codigo;
      $img_name = "evento-" . $evento_codigo . "." . $extOrg;
      $img_path = $upload_img_path . $img_name;
      //move_uploaded_file($file['tmp_name'], $img_path);

      switch ( $imagen_tipo ){
        case "image/jpg":
        case "image/jpeg":
          imagejpeg($lienzo, $img_path, 80);
          break;

        case "image/png":
          imagepng($lienzo, $img_path, 0);
          break;
      }

      $eventoImagen = substr(strrchr($img_path, "/"), 1);
      $response['eventoImagen'] = $eventoImagen;

      return $response;
    }
    
}

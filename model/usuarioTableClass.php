<?php

use mvc\model\modelClass as model;
use mvc\config\myConfigClass as config;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of usuarioTableClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class usuarioTableClass extends usuarioBaseTableClass {

  public static function verifyUser($usuario, $password) {
    try {
      $sql = 'SELECT
      ' . credencialTableClass::getNameField(credencialTableClass::NOMBRE) . ' as credencial,
      ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' as usuario,
      ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' as id_usuario,
      (' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE) . ' || \' \' || ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO) . ')' . ' as usuario_nombrecompleto
      FROM ' . usuarioTableClass::getNameTable() . '
      LEFT JOIN ' . usuarioCredencialTableClass::getNameTable() . ' ON ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::USUARIO_ID) . '
      LEFT JOIN ' . credencialTableClass::getNameTable() . ' ON ' . credencialTableClass::getNameField(credencialTableClass::ID) . ' = ' . usuarioCredencialTableClass::getNameField(usuarioCredencialTableClass::CREDENCIAL_ID) . '
      LEFT JOIN ' . datoUsuarioTableClass::getNameTable() . ' ON ' . datoUsuarioTableClass::getNameField(datoUsuarioTableClass::USUARIO_ID) . ' = ' . usuarioTableClass::getNameField(usuarioTableClass::ID) . '
      WHERE ' . usuarioTableClass::getNameField(usuarioTableClass::ACTIVED) . ' = :actived
      AND ' . usuarioTableClass::getNameField(usuarioTableClass::DELETED_AT) . ' IS NULL
      AND ' . credencialTableClass::getNameField(credencialTableClass::DELETED_AT) . ' IS NULL
      AND ' . usuarioTableClass::getNameField(usuarioTableClass::USER) . ' = :user
      AND ' . usuarioTableClass::getNameField(usuarioTableClass::PASSWORD) . ' = :pass';
      $params = array(
          ':user' => $usuario,
          ':pass' => md5($password),
          ':actived' => ((config::getDbDriver() === 'mysql') ? 1 : 't')
      );
      
      /*echo "<pre>";
      echo $sql;
      echo "</pre>";
      die();*/
      
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);
      return (count($answer) > 0 ) ? $answer : false;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }

  public static function setRegisterLastLoginAt($id) {
    try {
      $sql = 'UPDATE ' . usuarioTableClass::getNameTable() . '
              SET ' . usuarioTableClass::LAST_LOGIN_AT . ' = :last_login_at
              WHERE ' . usuarioTableClass::ID . ' = :id';
      $params = array(
          ':id' => $id,
          ':last_login_at' => date(config::getFormatTimestamp())
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      return true;
    } catch (PDOException $exc) {
      throw $exc;
    }
  }
  
  public static function getDatosUsuario($id, $formato_fechanacimiento = "default", $formato_localidad = "default") {
    
    try {
      $sql =  "select
              u.id as usuario_id,
              du.nombre,
              du.apellido,
              du.correo,
              du.genero,
              du.fecha_nacimiento,
              du.localidad_id,
              l.nombre as localidad_nombre,
              l2.nombre as localidad_nombre2,
              l3.nombre as localidad_nombre3,
              l4.nombre as localidad_nombre4,
              du.tipo_documento_id,
              td.nombre as tipo_documento_nombre,
              du.organizacion_id,
              o.nombre as organizacion_nombre,
              u.user_name
              from usuario u
              join dato_usuario du on du.usuario_id = u.id
              join localidad l on l.id = du.localidad_id
              left join localidad l2 on l2.id = l.localidad_id
              left join localidad l3 on l3.id = l2.localidad_id
              left join localidad l4 on l4.id = l3.localidad_id
              join tipo_documento td on td.id = du.tipo_documento_id
              left join organizacion o on o.id = du.organizacion_id
              where 
              u.id = :id";
      
      $params = array(
          ':id' => $id
      );
      $answer = model::getInstance()->prepare($sql);
      $answer->execute($params);
      $answer = $answer->fetchAll(PDO::FETCH_OBJ);

      if ($formato_fechanacimiento == "ui") {
        $answer[0]->fecha_nacimiento = usuarioTableClass::getFechaNacimientoUi($answer[0]->fecha_nacimiento);
      }

      if ($formato_localidad == "ui") {

        $localidades = array(
          'localidad' => $answer[0]->localidad_nombre,
          'localidad2' => $answer[0]->localidad_nombre2,
          'localidad3' => $answer[0]->localidad_nombre3,
          'localidad4' => $answer[0]->localidad_nombre4
        );

        $answer[0]->localidad_nombre = usuarioTableClass::getLocalidadUi($localidades);
      }

      return (count($answer) > 0 ) ? $answer[0] : false;
      
    } catch (PDOException $exc) {
      throw $exc;
    }    
    
  }

  public static function getFechaNacimientoUi($fecha) {
    $fecha = date("d-m-Y", strtotime($fecha));

    $datos = explode('-', $fecha);

    $dia = $datos[0];
    $mes = $datos[1];
    $year = $datos[2];

    switch($mes) {
      case '01':
        $mes = i18n::__(00001, null, 'mes');
        break;

      case '02':
        $mes = i18n::__(00002, null, 'mes');
        break;

      case '03':
        $mes = i18n::__(00003, null, 'mes');
        break;

      case '04':
        $mes = i18n::__(00004, null, 'mes');
        break;

      case '05':
        $mes = i18n::__(00005, null, 'mes');
        break;

      case '06':
        $mes = i18n::__(00006, null, 'mes');
        break;

      case '07':
        $mes = i18n::__(00007, null, 'mes');
        break;

      case '08':
        $mes = i18n::__(00010, null, 'mes');
        break;

      case '09':
        $mes = i18n::__(00011, null, 'mes');
        break;

      case '10':
        $mes = i18n::__(00012, null, 'mes');
        break;

      case '11':
        $mes = i18n::__(00013, null, 'mes');
        break;

      case '12':
        $mes = i18n::__(00014, null, 'mes');
        break;
    }

    $fecha = i18n::__(00001,null,'phrases',array(':dia' => $dia, ':mes' => $mes, ':year' => $year));

    return $fecha;
  }

  public static function getLocalidadUi($localidades) {

    $localidades_array = Array();

    foreach($localidades as $localidad) {
      if (strlen(trim($localidad)) > 0) {
        array_push($localidades_array,trim($localidad));
      }
    }

    $localidades_ui = implode(', ', $localidades_array);

    return $localidades_ui;
  }

  public static function validateUserName($user_name) {

  try {

    $sql = "select user_name from usuario where user_name = '" . $user_name ."'";

    $params = array();
    $answer = model::getInstance()->prepare($sql);
    $answer->execute($params);
    $answer = $answer->fetchAll(PDO::FETCH_OBJ);

    if (count($answer) > 0) {
      return false;
    } else {
      return true;
    }

  } catch (PDOException $exc) {
  throw $exc;
  }

}

}

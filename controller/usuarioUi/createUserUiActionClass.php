<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use hook\log\logHookClass as log;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class createUserUiActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

      if (request::getInstance()->isMethod('POST')) {

//        request::getInstance()->hasPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));

        // DATOS DE LA TABLA DATO USUARIO

        $usuarioNombre = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::NOMBRE, true));
        $usuarioApellido = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::APELLIDO, true));
        $usuarioCorreo = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::CORREO, true));
        $usuarioGenero = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::GENERO, true));
        $usuarioFechaNacimiento = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::FECHA_NACIMIENTO, true));
        $usuarioLocalidad = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::LOCALIDAD_ID, true));
        $usuarioTipoDocumento = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::TIPO_DOCUMENTO_ID, true));
        $usuarioOrganizacion = request::getInstance()->getPost(datoUsuarioTableClass::getNameField(datoUsuarioTableClass::ORGANIZACION_ID, true));

        //DATOS DE LA TABLA USUARIO

        $usuario = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::USER, true));
        $password = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_1');
        $confirmPassword = request::getInstance()->getPost(usuarioTableClass::getNameField(usuarioTableClass::PASSWORD, true) . '_2');

        if (strlen(trim($usuarioNombre)) == 0) {
          $mensaje = i18n::__(00014, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioApellido)) == 0) {
          $mensaje = i18n::__(00015, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioCorreo)) == 0) {
          $mensaje = i18n::__(00012, null, 'errors');
          echo $mensaje;
          die();
        } else {
          if (!(preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $usuarioCorreo))) {
            $mensaje = i18n::__(00013, null, 'errors');
            echo $mensaje;
            die();
          }
        }

        if (strlen(trim($usuarioGenero)) == 0) {
          $mensaje = i18n::__(00017, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioFechaNacimiento)) == 0) {
          $mensaje = i18n::__(00020, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioLocalidad)) == 0) {
          $mensaje = i18n::__(00021, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioTipoDocumento)) == 0) {
          $mensaje = i18n::__(00022, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($usuarioOrganizacion)) == 0) {
          $usuarioOrganizacion = null;
        }

        if (strlen(trim($usuario)) == 0) {
          $mensaje = i18n::__(00003, null, 'errors');
          echo $mensaje;
          die();
        }

        $validateUserName = usuarioTableClass::validateUserName(trim($usuario));

        if (!$validateUserName) {
          $mensaje = i18n::__(00054, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($password)) == 0) {
          $mensaje = i18n::__(00004, null, 'errors');
          echo $mensaje;
          die();
        }

        if (strlen(trim($confirmPassword)) == 0) {
          $mensaje = i18n::__(00005, null, 'errors');
          echo $mensaje;
          die();
        }

        if ($password == $confirmPassword) {

          if (strlen(trim($usuario)) > usuarioTableClass::USER_LENGTH) {
//            throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00001);
            $mensaje = i18n::__(00001, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH));
            echo $mensaje;
            die();
          }

          if (strlen(trim($password)) > usuarioTableClass::PASSWORD_LENGTH) {
//            throw new PDOException(i18n::__(00002, null, 'errors', array(':longitud' => usuarioTableClass::USER_LENGTH)), 00002);
            $mensaje = i18n::__(00002, null, 'errors', array(':longitud' => usuarioTableClass::PASSWORD_LENGTH));
            echo $mensaje;
            die();
          }

          $data = array(
              '__sequence' => 'usuario_id_seq',
              usuarioTableClass::USER => $usuario,
              usuarioTableClass::PASSWORD => md5($password)
          );

          $usuarioId = usuarioTableClass::insert($data);

          $data1 = array(
              datoUsuarioTableClass::USUARIO_ID => $usuarioId,
              datoUsuarioTableClass::NOMBRE => $usuarioNombre,
              datoUsuarioTableClass::APELLIDO => $usuarioApellido,
              datoUsuarioTableClass::CORREO => $usuarioCorreo,
              datoUsuarioTableClass::GENERO => $usuarioGenero,
              datoUsuarioTableClass::FECHA_NACIMIENTO => $usuarioFechaNacimiento,
              datoUsuarioTableClass::LOCALIDAD_ID => $usuarioLocalidad,
              datoUsuarioTableClass::TIPO_DOCUMENTO_ID => $usuarioTipoDocumento,
              datoUsuarioTableClass::ORGANIZACION_ID => $usuarioOrganizacion
          );

          datoUsuarioTableClass::insert($data1);

          $data2 = array(
              usuarioCredencialTableClass::USUARIO_ID => $usuarioId,
              usuarioCredencialTableClass::CREDENCIAL_ID => 2
          );

          usuarioCredencialTableClass::insert($data2);

          $mensaje = i18n::__(00001, null, 'success', array(':username' => $usuario));

          //$mensaje = "no logueado";
          if (($objUsuario = usuarioTableClass::verifyUser($usuario, $password)) !== false) {
            //$mensaje = "si logueado";
            hook\security\securityHookClass::login($objUsuario);
            log::register('identificacion', 'NINGUNA');
          }

          echo $mensaje;
          echo "¬";
          echo "true";
          echo "¬";
          echo routing::getInstance()->getUrlWeb('usuarioUi', 'index');
          die();


//          routing::getInstance()->redirect('preFabricados', 'index');

        } else {

          $mensaje = i18n::__(00006, null, 'errors');
          echo $mensaje;
          die();

        }
      } else {
        routing::getInstance()->redirect('preFabricados', 'index');
      }
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use mvc\view\viewClass as view;

/**
 * Description of ejemploClass
 *
 * @author Julian Lasso <ingeniero.julianlasso@gmail.com>
 */
class frameHandlerActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    
    try {
      /*$fields = array(
          usuarioTableClass::ID,
          usuarioTableClass::USER,
          usuarioTableClass::CREATED_AT
      );
      $orderBy = array(
          usuarioTableClass::USER
      );*/
      
      if (request::getInstance()->hasPost('tipo_frame')) {
        
        $this->tipo_frame = request::getInstance()->getPost('tipo_frame');
        
      }
      
      switch ($this->tipo_frame) {
        case 1:

          $this->usuario = usuarioTableClass::getDatosUsuario(session::getInstance()->getUserId(), "ui", "ui");

          $this->objUsuario = usuarioTableClass::getAll(array(usuarioTableClass::USER), true, array(usuarioTableClass::USER), 'ASC', null, null, array(usuarioTableClass::ID => session::getInstance()->getUserId() ));

          $vista = 'perfil';
          $parametros = array(
                          'nombre' => $this->usuario->nombre . " " . $this->usuario->apellido,
                          'correo' => $this->usuario->correo,
                          'fecha_nacimiento' => $this->usuario->fecha_nacimiento,
                          'genero' => (($this->usuario->genero == true)? 'Femenino' : 'Masculino'),
                          'localidad' => $this->usuario->localidad_nombre,
                          'organizacion' => $this->usuario->organizacion_nombre,
                          'nombre_usuario' => strtoupper($this->objUsuario[0]->user_name)
                        );

          break;
        
        case 2:
          
          $vista = 'eventos';

          $fields = array(
              eventoTableClass::ID,
              eventoTableClass::NOMBRE,
              eventoTableClass::CREATED_AT,
              eventoTableClass::DESCRIPCION,
              eventoTableClass::IMAGEN
          );

          $orderBy = array(
              eventoTableClass::NOMBRE
          );

          $where = null;

          /*if (session::getInstance()->hasAttribute('eventosWhere')) {
            $where = session::getInstance()->getAttribute('eventosWhere');
          }*/

          $this->rowsperpage = 3;

          $this->page = 1;
          $this->since = $this->page - 1;
          $this->since = $this->since * $this->rowsperpage;

          $this->registros = count(eventoTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
          $this->pages = $this->registros / $this->rowsperpage;

          if (!(is_int($this->pages))) {
            $this->pages = (int)$this->pages + 1;
          }

          $this->objEventos = eventoTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);

          $this->sincePage = 1;

          if ($this->pages >= 4) {
            $this->untilPage = 4;
          } else  {
            $this->untilPage = $this->pages;
          }

          session::getInstance()->setFlash('sincePage', $this->sincePage);
          session::getInstance()->setFlash('untilPage', $this->untilPage);

          $parametros = array(
                          'page' => $this->page,
                          'sincePage' => $this->sincePage,
                          'pages' => $this->pages,
                          'untilPage' => $this->untilPage,
                          'objEventos' => $this->objEventos
                        );

          break;
        
        case 3:

          $this->usuario = usuarioTableClass::getDatosUsuario(session::getInstance()->getUserId());

          $this->objUsuario = usuarioTableClass::getAll(array(usuarioTableClass::USER), true, array(usuarioTableClass::USER), 'ASC', null, null, array(usuarioTableClass::ID => session::getInstance()->getUserId() ));
          
          $vista = 'editarPerfil';
          $parametros = array(
              'nombre' => $this->usuario->nombre,
              'apellido' => $this->usuario->apellido,
              'correo' => $this->usuario->correo,
              'fecha_nacimiento' => $this->usuario->fecha_nacimiento,
              'genero' => $this->usuario->genero,
              'localidad_id' => $this->usuario->localidad_id,
              'localidad_nombre' => $this->usuario->localidad_nombre,
              'organizacion_id' => $this->usuario->organizacion_id,
              'organizacion_nombre' => $this->usuario->organizacion_nombre,
              'nombre_usuario' => $this->objUsuario[0]->user_name,
              'tipo_documento_id' => $this->usuario->tipo_documento_id,
              'tipo_documento_nombre' => $this->usuario->tipo_documento_nombre,
              'usuario_id' => $this->usuario->usuario_id,
              'nombre_ui' => $this->usuario->nombre . " " . $this->usuario->apellido
          );

          break;

        default:
          break;
      }
      
      view::includePartial("usuarioUi/" . $vista . "Template.html", $parametros);
      
    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

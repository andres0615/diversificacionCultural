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
class profileWidgetActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {

    try {

      //$this->defineView('ingresar', 'shfSecurity', session::getInstance()->getFormatOutput());

      view::includePartial('partials/profileWidgetTemplate.html',
                          array(
                            'usuarioNombrecompleto' => session::getInstance()->getUsuarioNombrecompleto()
                          ));

    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

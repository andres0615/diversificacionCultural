<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\configClass as config;
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
class eventosPaginadorActionClass extends controllerClass implements controllerActionInterface {

  public function execute() {
    try {

//      sleep(1);

      $filter = null;
      $where = null;

      $fields = array(
          eventoTableClass::ID,
          eventoTableClass::NOMBRE,
          eventoTableClass::DESCRIPCION,
          eventoTableClass::CREATED_AT,
          eventoTableClass::IMAGEN
      );
      $orderBy = array(
          eventoTableClass::NOMBRE
      );

      $where[eventoTableClass::USUARIO_ID] = session::getInstance()->getUserId();

      /*if (request::getInstance()->hasPost('borrarFiltros')) {

        if (request::getInstance()->getPost('borrarFiltros') === 'true') {
          session::getInstance()->deleteAttribute('eventosFilter');
          session::getInstance()->deleteAttribute('eventosWhere');
        }
      }*/

      /*if (request::getInstance()->hasPost('filter')) {

        $filter = request::getInstance()->getPost('filter');

        if (strlen(trim($filter['eventoNombre'])) > 0) {
          $where[eventoTableClass::NOMBRE] = $filter['eventoNombre'];
        }

        if (strlen(trim($filter['eventoFechaInicial'])) > 0 && strlen(trim($filter['eventoFechaFinal'])) > 0) {
          $where[eventoTableClass::CREATED_AT] = array(
              date(config::getFormatTimestamp(), strtotime($filter['eventoFechaInicial'] . ' 00:00:00' )),
              date(config::getFormatTimestamp(), strtotime($filter['eventoFechaFinal'] . ' 23:59:59' ))
          );
        }

        $this->filter = request::getInstance()->getPost('filter');

        session::getInstance()->setAttribute('eventosFilter', $this->filter);
        session::getInstance()->setAttribute('eventosWhere', $where);

      } else if (session::getInstance()->hasAttribute('eventosWhere')) {
        $where = session::getInstance()->getAttribute('eventosWhere');
        $this->filter = session::getInstance()->getAttribute('eventosFilter');
      }*/

      $this->rowsperpage = 3;

      if (request::getInstance()->hasPost('page')) {
        $this->page = request::getInstance()->getPost('page');
        $this->since = $this->page - 1;
        $this->since = $this->since * $this->rowsperpage;
      } else {
        $this->page = 1;
        $this->since = $this->page - 1;
        $this->since = $this->since * $this->rowsperpage;
      }

      /*if (session::getInstance()->hasAttribute('eventosUiWhere')) {
        $filter = session::getInstance()->getAttribute('eventosUiFilter');
        $where = session::getInstance()->getAttribute('eventosUiWhere');
      }*/

      $this->registros = count(eventoTableClass::getAll($fields, true, $orderBy, 'ASC', null, null, $where));
      $this->pages = $this->registros / $this->rowsperpage;

      if (!(is_int($this->pages))) {
        $this->pages = (int)$this->pages + 1;
      }

      $this->sincePages = 1;
      $this->untilPages = $this->sincePages + 3;

      if (request::getInstance()->hasPost('sincePage')) {
        $this->sincePage = request::getInstance()->getPost('sincePage');
        $this->untilPage = $this->sincePage + 3;
      }

      if ($this->page > $this->untilPage) {
        $this->sincePage = $this->sincePage + 1;
        $this->untilPage = $this->sincePage + 3;
      } else if ($this->page < $this->sincePage) {
        $this->sincePage = $this->sincePage - 1;
        $this->untilPage = $this->sincePage + 3;
      }

      if ($this->sincePage == 1) {
        if ($this->pages >= 4) {
          $this->untilPage = 4;
        } else  {
          $this->untilPage = $this->pages;
        }
      }

      $this->objEventos = eventoTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
      $this->visibleRows = count($this->objEventos);

      if ($this->page > $this->pages) {
        $this->page = $this->pages;
      }

      if ($this->visibleRows == 0) {

        if (($this->since - $this->rowsperpage) < 0) {
          $this->since = 0;
        } else {
          $this->since = $this->since - $this->rowsperpage;
        }

        $this->objEventos = eventoTableClass::getAll($fields, true, $orderBy, 'ASC', $this->rowsperpage, $this->since, $where);
        $this->visibleRows = count($this->objEventos);
      }

      $this->totalRows = count(eventoTableClass::getAll($fields));


      view::includePartial('usuarioUi/registrosEventosTemplate.html',
          array(
              'objEventos' => $this->objEventos,
              'page' => $this->page,
              'pages' => $this->pages,
              'sincePage' => $this->sincePage,
              'untilPage' => $this->untilPage,
              'totalRows' => $this->totalRows,
              'visibleRows' => $this->visibleRows,
              'since' => $this->since,
              'filter' => $filter
          ));

    } catch (PDOException $exc) {
      session::getInstance()->setFlash('exc', $exc);
      routing::getInstance()->forward('shfSecurity', 'exception');
    }
  }

}

<?php

$config = "<?php

use mvc\config\myConfigClass as config;
use mvc\session\sessionClass as session;

config::setRowGrid($row_grid);

config::setDbHost('$bd_host');
config::setDbDriver('$bd_driver'); // mysql
config::setDbName('$bd_name');
config::setDbPort($bd_port); // 3306
config::setDbUser('$bd_user');
config::setDbPassword('$bd_password');
// Esto solo es necesario en caso de necesitar un socket para la DB
config::setDbUnixSocket(null); ///tmp/mysql.sock

if (config::getDbUnixSocket() !== null) {
  config::setDbDsn(
          config::getDbDriver()
          . ':unix_socket=' . config::getDbUnixSocket()
          . ';dbname=' . config::getDbName()
  );
} else {
  config::setDbDsn(
          config::getDbDriver()
          . ':host=' . config::getDbHost()
          . ';port=' . config::getDbPort()
          . ';dbname=' . config::getDbName()
  );
}

config::setPathAbsolute('$path_absolute');
config::setUrlBase('$url_web');

config::setImgUploadPath('web/img/');
config::setUploadProfileImgFolder('user_profile_img/');
config::setUploadEventImgFolder('event_img/');

config::setDefaultProfileImg('default.png');
config::setDefaultEventImg('default.png');

config::setScope('$scope'); // prod

if (session::getInstance()->hasDefaultCulture() === false) {
  config::setDefaultCulture('$idioma');
} else {
  config::setDefaultCulture(session::getInstance()->getDefaultCulture());
}

config::setIndexFile('index.php');

config::setFormatTimestamp('$time_format');

config::setHeaderJson('Content-Type: application/json; charset=utf-8');
config::setHeaderXml('Content-Type: application/xml; charset=utf-8');
config::setHeaderHtml('Content-Type: text/html; charset=utf-8');
config::setHeaderPdf('Content-type: application/pdf; charset=utf-8');
config::setHeaderJavascript('Content-Type: text/javascript; charset=utf-8');
config::setHeaderExcel2003('Content-Type: application/vnd.ms-excel; charset=utf-8');
config::setHeaderExcel2007('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8');

config::setCookieNameRememberMe('mvcSiteRememberMe');
config::setCookieNameSite('mvcSite');
config::setCookiePath('/SohoFramework/web/' . config::getIndexFile());
config::setCookieDomain('http://localhost/');
config::setCookieTime(3600 * 8); // una hora en segundo 3600 y por 8 serían 8 horas

config::setDefaultModule('preFabricados');
config::setDefaultAction('index');

config::setDefaultModuleSecurity('shfSecurity');
config::setDefaultActionSecurity('ingresar');

config::setDefaultModulePermission('shfSecurity');
config::setDefaultActionPermission('noPermission');

config::setShowSqlGetAll(false);";
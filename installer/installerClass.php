<?php

/**
 * Description of installerClass
 *
 * @author julianlasso
 */

class installerClass {

  public function install() {

    if (isset($_POST['step']) !== true) {
      include_once 'view/index.html.php';
    } else {
      switch ($_POST['step']) {
        case 2:

          if (substr($_POST["php-version"], 0, 3) < $_POST["php-version-required"]) {
            echo "false";
            echo "¬";
            echo "La version de php que este equipo posee no es valida para la instalacion";
          } else {
            echo "true";
            echo "¬";
            echo "";
          }
          break;
        case 3:
          try {

            include_once 'view/step2.html.php';

          } catch (PDOException $exc) {
            $_GET['error'] = true;
            $_GET['error_message'] = $exc->getMessage();
            include_once 'view/dataBase.html.php';
          }
          break;
        case 4:
          try {

          if (strlen(trim($_POST["bd_host"])) == 0) {
            echo "false";
            echo "¬";
            echo "El campo host es requerido";
            die();
          }

          if (strlen(trim($_POST["bd_driver"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe escoger el controlador de la base de datos.";
            die();
          }

          if (strlen(trim($_POST["bd_port"])) == 0) {
            echo "false";
            echo "¬";
            echo "El campo puerto es requerido";
            die();
          }

          if (strlen(trim($_POST["bd_name"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el nombre de la base de datos";
            die();
          }

          if (strlen(trim($_POST["bd_user"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el nombre de usuario de la base de datos";
            die();
          }

          if (! is_array($_FILES["bd_backup"])) {
            echo "false";
            echo "¬";
            echo "Debe escoger el backup de la base de datos";
            die();
          } else {
            $allowedExt = array('sql');
            //$ext = substr(strrchr($_FILES["bd_backup"]['type'], '/'), 1);
            $ext = substr(strrchr($_FILES["bd_backup"]['name'], '.'), 1);

            if(! in_array($ext, $allowedExt)) {
              echo "false";
              echo "¬";
              echo "El backup debe ser un archivo sql.";
              die();
            }
          }

          if (strlen(trim($_POST["bd_password"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar la contraseña de la base de datos";
            die();
          }

          $_SESSION["config_params"] = $_POST;

          $dsn = $_POST['bd_driver'] . ':host=' . $_POST['bd_host'] . ';port=' . $_POST['bd_port'];

          $pdo = new PDO($dsn, $_POST["bd_user"], $_POST["bd_password"]);

          if ($_POST['bd_driver'] == "pgsql") {
            $query = "select version();";

            $valida_version = $pdo->prepare($query);

            $valida_version->execute();

            $valida_version = $valida_version->fetchAll(PDO::FETCH_OBJ);

            $bd_version = explode(" ", $valida_version[0]->version)[1];

            if ( trim($bd_version) != "9.4.5") {
              echo "false";
              echo "¬";
              echo "La version de postgres instalada en este servidor es incompatible con la aplicacion. Debe instalar postgres 9.4.5.";
              die();
            }

          }

          $query = "CREATE DATABASE {$_POST['bd_name']}
                                      WITH OWNER = {$_POST['bd_user']}
                                           ENCODING = 'UTF8'
                                           TABLESPACE = pg_default
                                           LC_COLLATE = 'es_CO.UTF-8'
                                           LC_CTYPE = 'es_CO.UTF-8'
                                           CONNECTION LIMIT = -1;";

          $crear_bd = $pdo->prepare($query);

          $crear_bd->execute();

          pg_close($crear_bd);

          $pdo = null;

          $archivo = fopen($_FILES["bd_backup"]["tmp_name"],"r");
          $query = "";
          while(!feof($archivo)) {
            $line = fgets($archivo);
            $query .= $line;
          }
          fclose($archivo);

          $dsn = $_POST['bd_driver'] . ':host=' . $_POST['bd_host'] . ';dbname=' . $_POST['bd_name'] . ';port=' . $_POST['bd_port'];

          $pdo = new PDO($dsn, $_POST["bd_user"], $_POST["bd_password"]);

          $pdo->exec($query);

          /*$query = "INSERT INTO usuario(
                    id, user_name, password, actived, last_login_at, created_at,
                    updated_at, deleted_at)
                    VALUES (
                    default, 'admin', '21232f297a57a5a743894a0e4a801fc3', default, null, default,
                    default, null);


                    INSERT INTO credencial(
                    id, nombre, created_at, updated_at, deleted_at)
                    VALUES (default, 'admin', default, default, null);


                    INSERT INTO usuario_credencial(
                    id, usuario_id, credencial_id, created_at)
                    VALUES (default, 1, 1, default);";*/

          //$pdo->exec($query);

          $pdo = null;

          echo "true";
          echo "¬";
          echo "La base de datos se creo con exito";

          } catch (PDOException $exc) {
            echo "false";
            echo "¬";
            echo $exc->getMessage();
            die();
          }
          break;
        case 5:
          try {

            include_once 'view/step3.html.php';

          } catch (PDOException $exc) {
            $_GET['error'] = true;
            $_GET['error_message'] = $exc->getMessage();
            include_once 'view/dataBase.html.php';
          }
          break;
        case 6:

          extract($_POST);
          $error = 0;

          foreach($_POST as $index => $value) {
            if(strlen(trim($value)) == 0) {
              $error++;
              $validacion = "El campo " . explode('_', $index)[1] . " no puede estar vacio";
            }

            if ($error > 0) {
              break;
            }

            if (strlen(trim(explode('_', $index)[2])) > 0) {
              $max_char = explode('_', $index)[2];
              if (strlen($value) > $max_char) {
                $error++;
                $validacion = "El campo " . explode('_', $index)[1] . " sobrepasa los caracteres permitidos <br />";
                $validacion .= "Caracteres permitidos: $max_char";
              }
            }

            if ($error > 0) {
              break;
            }
          }

          if($error > 0) {
            echo "false";
            echo "¬";
            echo $validacion;
            die();
          } else {

            extract($_SESSION["config_params"]);

            $usuario_password = md5($usuario_password_32);

            $dsn = $bd_driver . ':host=' . $bd_host . ';dbname=' . $bd_name . ';port=' . $bd_port;

            $pdo = new PDO($dsn, $bd_user , $bd_password);

            $query = "SELECT fn_crearusuarioinstalacion(
                        '$usuario_login_80',
                        '$usuario_password',
                        '$usuario_nombre_45',
                        '$usuario_apellido_45',
                        '$usuario_correo_70',
                        $usuario_genero,
                        '$usuario_fechanacimiento'::date
                    );";

            $pdo->exec($query);

            $pdo = null;

            echo "true";
            echo "¬";
            echo "El usuario fue creado satisfactoriamennte.";
          }
          
          break;

        case 7:

          include_once 'view/step4.html.php';

          break;

        case 8:

          if (strlen(trim($_POST["row_grid"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el numero de registros por tabla.";
            die();
          }

          if (strlen(trim($_POST["path_absolute"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar la ruta de la carpeta raiz.";
            die();
          }

          if (strlen(trim($_POST["url_web"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar la direccion de la pagina web.";
            die();
          }

          if (strlen(trim($_POST["scope"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el modo de instalacion.";
            die();
          }

          if (strlen(trim($_POST["idioma"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el idioma.";
            die();
          }

          if (strlen(trim($_POST["time_format"])) == 0) {
            echo "false";
            echo "¬";
            echo "Debe ingresar el formato de tiempo.";
            die();
          }

          extract($_SESSION["config_params"]);
          extract($_POST);

          include_once 'config.php';

          $file = fopen('../config/config.php', 'w');
          fputs($file, $config);
          fclose($file);

          echo "true";
          echo "¬";
          echo "La instalacion se realizo con exito.";
          die();

          break;
      }
    }
  }

}

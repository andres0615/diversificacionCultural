<?php include_once 'header.html.php'; ?>

<div class="container" >
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3" style="margin-bottom: 1em;" >
        <div class="account-container register ">
          <div class="content clearfix">
            <div class="login-fields">

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <h2 class="border-bottom" > Instalacion: Requisitos </h2>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  Bienvenido a la instalacion del portal cultural Diversificacion Cultural.
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  Asegurese de tener una versiona de php superior a la <b id="php-version-required" >5.4</b>.
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  En estos momentos la version de php de este ordenador es: <b id="php-version" ><?php echo PHP_VERSION ?></b>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <?php echo pg_version(); ?>
                </div>
              </div>

              <br />

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <a href="index.php" id="next-step1" class="cbutton5" >Siguiente</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
          <div id="mensaje" style="position:relative;/*width: 50%;*/margin: 0 auto; text-align: center;" >

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'footer.html.php'; ?>




<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    PHP 5.4 o superior <?php //echo PHP_VERSION ?><br>
    json - <?php //echo get_loaded_extensions()[array_search('json', get_loaded_extensions())] ?><br>
    PDO - <?php //echo get_loaded_extensions()[array_search('PDO', get_loaded_extensions())] ?><br>
    pdo_pgsql - <?php //echo get_loaded_extensions()[array_search('pdo_pgsql', get_loaded_extensions())] ?><br>
    pdo_mysql - <?php //echo get_loaded_extensions()[array_search('pdo_mysql', get_loaded_extensions())] ?><br>
    <a href="index.php?step=2">Siguiente</a>
  </body>
</html> -->

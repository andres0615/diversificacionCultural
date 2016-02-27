<?php include_once 'header.html.php'; ?>

  <div class="container" >
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
          <div class="account-container register ">
            <div class="content clearfix">
              <div class="login-fields">

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <h2 class="border-bottom" > Instalacion: Configuracion</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    Complete los datos para realizar la instalación.
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <form action="index.php" method="POST" id="step4-form">

                      <div class="field">
                        <p style="font-size: 1.1em" >Numero de registros por tabla:</p>
                        <input type="text" id="row_grid" name="row_grid" placeholder="Registros por tabla" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Ruta de la carpeta raiz (PathAbsolute):</p>
                        <input type="text" id="path_absolute" name="path_absolute" placeholder="Ruta de la carpeta raiz" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Direccion de la web (UrlBase):</p>
                        <input type="text" id="url_web" name="url_web" placeholder="Direccion de la web" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Modo:</p>
                        <select class="form-control" id="scope" name="scope" >
                          <option value="">Seleccione una opcion</option>
                          <option value="dev" >Desarrollo</option>
                          <option value="prod" >Produccion</option>
                        </select>
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Idioma:</p>
                        <select class="form-control" id="idioma" name="idioma" >
                          <option value="">Seleccione un idioma</option>
                          <option value="es" >Español</option>
                          <option value="en" >English</option>
                        </select>
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Formato de fecha y hora:</p>
                        <select class="form-control" id="time_format" name="time_format" >
                          <option value="Y-m-d H:i:s">Y-m-d H:i:s</option>
                        </select>
                      </div>

                    </form>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <a href="index.php" class="cbutton5" id="next-step4" >Siguiente</a>
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
</div>

<?php include_once 'footer.html.php'; ?>
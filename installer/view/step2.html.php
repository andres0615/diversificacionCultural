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
                    <h2 class="border-bottom" > Instalacion: Creación de la base de datos</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    Complete los datos para realizar la instalación.
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <form action="index.php" method="POST" id="step2-form">

                      <div class="field">
                        <p style="font-size: 1.1em" >Host de la base de datos:</p>
                        <input type="text" id="bd_host" name="bd_host" placeholder="Host" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Controlador:</p>
                        <select class="form-control" id="bd_driver" name="bd_driver" >
                          <option value="">Seleccione el controlador</option>
                          <option value="pgsql" >PostgreSQL</option>
                          <option value="mysql" >MySQL</option>
                        </select>
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Puerto:</p>
                        <input type="text" id="bd_port" name="bd_port" placeholder="Puerto" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Nombre de la base de datos:</p>
                        <input type="text" id="bd_name" name="bd_name" placeholder="Base de datos" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Nombre de usuario de la base de datos:</p>
                        <input type="text" id="bd_user" name="bd_user" placeholder="usuario de base de datos" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Backup de la base de datos:</p>
                        <input type="file" name="bd_backup" class="login fileinput" id="bd_backup" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Contraseña de la base de datos:</p>
                        <input type="password" id="bd_password" name="bd_password" placeholder="Contraseña" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <input id="show-password-step2" name="Field" type="checkbox" class="field login-checkbox" style="display: inline-block" />
                        <p style="font-size: 1.1em; display:inline-block;" >Mostrar contraseña</p
                      </div>

                    </form>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <a href="index.php" class="cbutton5" id="next-step2" >Siguiente</a>
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
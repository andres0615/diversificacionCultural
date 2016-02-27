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
                    <h2 class="border-bottom" > Instalación: Crear cuenta</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    Complete los datos para la creación de su cuenta.
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <form action="index.php" method="POST" id="step3-form">

                      <div class="field">
                        <p style="font-size: 1.1em" >Nombres:</p>
                        <input type="text" id="usuario_nombre" name="usuario_nombre_45" placeholder="Nombres" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Apellidos:</p>
                        <input type="text" id="usuario_apellido" name="usuario_apellido_45" placeholder="Apellidos" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Correo:</p>
                        <input type="text" id="usuario_correo" name="usuario_correo_70" placeholder="Correo" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Genero:</p>
                        <div class="row">
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                                <p>Masculino</p>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                                <input type="radio" name="usuario_genero" value="false" >
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                            <div class="row">
                              <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                                <p>Femenino</p>
                              </div>
                              <div class="col-lg-6 col-md-6 col-sm-3 col-xs-3">
                                <input type="radio" name="usuario_genero" value="true" >
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          </div>
                        </div>
                      </div>

                      <div class="field">
                        <p style="font-size: 1.2em" >Fecha de nacimiento :</p>
                        <input type="text" id="user_fecha_nacimiento" name="usuario_fechanacimiento" placeholder="Fecha de nacimiento" class="login datepicker1" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.1em" >Nombre de usuario:</p>
                        <input type="text" id="usuario_login" name="usuario_login_80" placeholder="Login" class="login" style="font-size:1.1em; height: auto;" />
                      </div>

                      <div class="field">
                        <p style="font-size: 1.2em" >Contraseña:</p>
                        <input type="password" id="usuario_password" name="usuario_password_32" placeholder="Contraseña" class="login" style="font-size:1.1em; height: auto;"/>
                      </div>

                      <div class="field">
                        <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="row">
                              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
                                <input id="show-password-step3" name="Field" type="checkbox"  />
                              </div>
                              <div class="col-lg-11 col-md-11 col-sm-11 col-xs-9">
                                <p>Mostrar contraseña</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          </div>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>

                <br />

                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                    <a href="index.php" class="cbutton5" id="next-step3" >Siguiente</a>
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
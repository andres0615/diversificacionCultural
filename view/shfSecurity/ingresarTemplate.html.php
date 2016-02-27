<?php use mvc\view\viewClass as view; ?>
<?php use mvc\routing\routingClass as routing; ?>
<?php use mvc\i18n\i18nClass as i18n; ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
      <section id="content">
        <form action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST" id="login-form">
          <h1>Login Form</h1>
          <div>
            <input type="text" placeholder="Username" class="login-user" required="" id="user_name" name="user_name" />
          </div>
          <div>
            <input type="password" placeholder="Password" required="" id="user_password" name="user_password" />
          </div>
        </form><!-- form -->
        <div class="button login-foot">
          <div class="row" >
              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" ></div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 " style="text-align: left;" >
                <!-- <input type="button" value="Log in" class="login-button" id="submit_login"/> -->
                <input type="button" value="Log in" class="cbutton5" id="submit_login"/>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 " style="text-align: right;" >
                <!-- <a href="#">Lost your password?</a> -->
                <a href="<?php echo routing::getInstance()->getUrlWeb('preFabricados', 'signup'); ?>" ><?php echo i18n::__('signup'); ?></a>
              </div>
              <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" ></div> 
          </div>
        </div> 
      </section><!-- content -->
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

    </div>     
  </div>
  <br />
  <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
      <div id="mensaje" style="position:relative;width: 100%;margin: 0 auto; text-align: center;" >

      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">

    </div>
  </div>
</div>
<?php view::includePartial('partials/footer.html') ?>

<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" > 
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="home-item-3-head" >
              <h3>Somos</h3>
            </div>
            <!--<hr>-->
            <div class="home-item-3-body" >
              <p>
                Una empresa fundada y consolidada con 25 años de experiencia en la 
                ciudad de cali dentro de la rama de la construccion recibiendo el 
                respaldo y aceptacion de la ciudadania hoy contamos con todo el 
                personal idoneo que permite nuestra excelente labor de poder llevar alegria
                y felicidad a la poblacion en general de poder obtener su propia vivienda
                a un precio muy economico.              
              </p>
              <!--<br />-->
              <!--<br />-->
              <!--<br />-->
              <br />
              <ul>
                <li>Rapida entrega e instalacion.</li>
                <li>Sismo resistentes.</li>
                <li>Tramites notariales.</li>
              </ul>
              <br />
            </div>
          </div>  
        </div> 
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="home-item-3-head" >
              <h3>Experiencia</h3>
            </div>
            <!--<hr>-->
            <div class="home-item-3-body" >
              <p>
                Nuestro trabajo esta garantizado, poseemos 25 años de experiencia en el mercado.
              </p>
            </div>
          </div>  
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <ul class="tt-wrapper">
              <li><a class="tt-gplus" href="#"><span>Google Plus</span></a></li>
              <li><a class="tt-twitter" href="#"><span>Twitter</span></a></li>
              <!--<li><a class="tt-dribbble" href="#"><span>Dribbble</span></a></li>-->
              <li><a class="tt-facebook" href="#"><span>Facebook</span></a></li>
              <!--<li><a class="tt-linkedin" href="#"><span>LinkedIn</span></a></li>-->
              <!--<li><a class="tt-forrst" href="#"><span>Forrst</span></a></li>-->
            </ul>
          </div>
        </div> 
      </div>      
    </div>        
    </div>    
  </div>
</div>
<?php view::includePartial('partials/footer.html') ?>
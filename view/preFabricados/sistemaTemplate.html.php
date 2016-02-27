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
              <h3>Experiencia</h3>
            </div>
            <!--<hr>-->
            <div class="home-item-3-body" >
              <p>
                Nuestro trabajo esta garantizado, poseemos 25 años de experiencia en el mercado.
              </p>
            </div>         
            <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                <div data-src="<?php echo routing::getInstance()->getUrlImg('slider1/example/001.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                    </div>
                </div>
                <div data-src="<?php echo routing::getInstance()->getUrlImg('slider1/example/002.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
                    </div>
                </div>
                <div data-src="<?php echo routing::getInstance()->getUrlImg('slider1/example/003.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        <em>It's completely free</em> (even if a donation is appreciated)
                    </div>
                </div>
                <div data-thumb="<?php echo routing::getInstance()->getUrlImg('slider1/example/001.jpg')?>" data-src="<?php echo routing::getInstance()->getUrlImg('camera/slides/sea.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        Camera slideshow provides many options <em>to customize your project</em> as more as possible
                    </div>
                </div>
                <div data-src="<?php echo routing::getInstance()->getUrlImg('slider1/example/002.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        It supports captions, HTML elements and videos and <em>it's validated in HTML5</em> (<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.pixedelic.com%2Fplugins%2Fcamera%2F&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0&amp;user-agent=W3C_Validator%2F1.2" target="_blank">have a look</a>)
                    </div>
                </div>
                <div data-src="<?php echo routing::getInstance()->getUrlImg('slider1/example/003.jpg')?>">
                    <div class="camera_caption fadeFromBottom">
                        Different color skins and layouts available, <em>fullscreen ready too</em>
                    </div>
                </div>
            </div>
          </div>  
        </div> 
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="home-item-3-head" >
              <h3>Sistema</h3>
            </div>
            <!--<hr>-->
            <div class="home-item-3-body" >
              <p>
                El sistema de construcción y emsamble de la vivienda es dirigido por personal
                técnico y especializado, que con su experiencia hace que nuestro trabajo sea
                seguro y eficaz.
                Aqui abajo hacemos una explicación detallada del procedimiento.
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
      <br />
      <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="home-item-3-head" style="text-align: center;" >
              <h3>SISTEMA DE CONSTRUCCIÓN Y ENSANBLAGE DE LA VIVIENDA</h3>
            </div>
            <div class="home-item-3-body" >
              <ul>
                <li>
                  <p>
                    Nuestras casas   son hechas en materiales resistibles, y de muy  buena calidad  
                    a la intemperie ya que pueden durar por muchos años. Dándole  satisfacción y la 
                    comodidad a nuestra distinguida  clientela de disfrutar de una larga experiencia 
                    en tener su propio hogar, casa, o chalet.
                  </p>
                </li>
                <li>
                  <p>
                    Sus paredes son construidas mediante una  serie de plaquetas o formaletas que 
                    son de fácil  armar además de ser de poco peso, su diseño está construido para  
                    dar la apariencia de tener una pared de ladrillo limpio real, pues su alto 
                    relieve es original el cual se puede pintar de cualquier color o sencillamente 
                    barnizar para darle una mayor durabilidad y belleza exterior.
                  </p>
                  <!--<br />-->
                  <p>
                    Cada plaqueta mide aproximadamente 1 x  1 metro cuadrado y son fundidas en 
                    concreto prensado  y en su interior por consiguiente lleva un refuerzo en 
                    hierro como tal para garantizar su buena calidad de fabricación.
                  </p>
                  <!--<br />-->
                  <p>
                    También estas miden 3,2 centímetro de espesor el cual aísla muy bien el frió o 
                    calor en temperaturas promedios.
                  </p>
                </li>
                <li>
                  <p>
                    Las uniones son metálicas en lamina galvanizada calibre 26 dobladas y grafadas 
                    en forma de (Canal) que permiten unir varias plaquetas a la vez, estas no se 
                    oxidan ni se deterioran por el tiempo.
                  </p>
                </li>
                <li>
                  <p>
                    Las  ventanas y puertas son hechas en lamina Collroll calibre 20, son diseños  ligeros, 
                    sencillos y modernos para este tipo de edificación de aspecto agradable y buena calidad.
                  </p>
                  <p>
                    Las ventanas traen una reja de seguridad en  tubo de ¾  (tres cuartos) cuadrado, 
                    calibre 20  adornadas con una forja en  platina,  dando un aspecto moderno y 
                    contemporáneo.
                  </p>
                </li>
                <li>
                  <p>
                    En cada área de 3, 4, o 5 metro se puede colocar una ventana que mide 1 x 1 metro.
                  </p>
                  <p>
                    Y  en aéreas mayores de 6 metro se puede colocar dos ventanas como máximo las 
                    ventanas son del mismo tamaño a acepción que el cliente exija tamaños diferentes 
                    y este costo va adicional  al  valor total del inmueble.
                  </p>
                  <p>
                    Los  baños igual llevan lucetas que miden 1 metro de ancho por 50 centímetros de 
                    alto estos permiten la ventilación y la proyección de la luz natural del día.  
                  </p>
                </li>
                <li>
                  <p>
                    También los baños se entregan con  puerta y no incluye enchape, cañerías, 
                    sanitario, lavamanos o terminados  a acepción  si el metraje de la vivienda 
                    supera los 42 metros cuadrados se le hace entrega de un combo al propietario de 
                    sanitario y lavamanos para que lo haga instalar. 
                  </p>
                </li>
                <li>
                  <p>
                    En la parte de la cocina lleva su división  una  luceta o o ventana según el 
                    gusto del propietario y  no incluye puerta,  mesón , enchapes cañerías o 
                    terminados. 
                  </p>
                </li>
                <li>
                  <p>
                    Los cuartos llevan una ventana por habitación y no llevan puertas, mas si lleva 
                    un refuerzo hecho en madera en el marco de la puerta.
                  </p>
                </li>
                <li>
                  <p>
                     La distribución de los cuartos, baños, cocina, sala, y comedor son  dependiendo 
                     del metraje que  se quiera construir y de acuerdo con el plano estipulado en el 
                     contrato de igual forma también depende del presupuesto con que el cliente tenga 
                     para hacerlo.  
                  </p>
                </li>
                <li>
                  <p>
                      El área  del techo consta de dos partes tales como las vigas en  madera de 
                      CHANUL  y la teja que es de ETERNIT, no incluye terminados como Cielos falsos 
                      o machimbre.
                  </p>
                  <p>
                      Si la persona quiere este trabajo  se le puede cotizar y hacer  por el total 
                      del metraje a instalar.
                  </p>
                </li>
                <li>
                  <p>
                       Nuestras casas se pueden construir en lotes limpios incluso no necesita de 
                       entrada tener una base, o loza de cimiento pues se puede construir sobre unas 
                       VIGUETAS que hacen el oficio de cimientos en el cual va a descansar la vivienda, 
                       de una forma segura.
                  </p>
                  <p>
                      La construcción de la loza ya depende de la persona dueña del lote o si quiere 
                      nosotros le podemos cotizar con el piso incluido.
                  </p>
                  <p>
                      También  se puede construir sobre terrazas  en las cuales no necesita de vigas 
                      ni columnas, pues su diseño no lo amerita para esta clase de viviendas, ya que 
                      su sistema de ensamblaje es de forma segura y eficaz.
                  </p>
                  <p>
                      Al cliente se le puede vender el lavadero mas no se le instala y se le 
                      colabora trasportándole hasta el  sitio de la vivienda
                  </p>
                </li>
                <li>
                  <p>
                       Nuestras casas se pueden construir en lotes limpios incluso no necesita de 
                       entrada tener una base, o loza de cimiento pues se puede construir sobre unas 
                       VIGUETAS que hacen el oficio de cimientos en el cual va a descansar la vivienda, 
                       de una forma segura.
                  </p>
                  <p>
                      La construcción de la loza ya depende de la persona dueña del lote o si quiere 
                      nosotros le podemos cotizar con el piso incluido.
                  </p>
                  <p>
                      También  se puede construir sobre terrazas  en las cuales no necesita de vigas 
                      ni columnas, pues su diseño no lo amerita para esta clase de viviendas, ya que 
                      su sistema de ensamblaje es de forma segura y eficaz.
                  </p>
                  <p>
                      Al cliente se le puede vender el lavadero mas no se le instala y se le 
                      colabora trasportándole hasta el  sitio de la vivienda.
                  </p>
                </li>
                <li>
                  <p>
                      En lo que es la parte eléctrica  esta no incluye ningún elemento pues la parte 
                      del sistema eléctrico depende del propietario.
                  </p>
                  <p>
                      se recomienda instalaciones externas utilizando tubería  cuadrada llamada 
                      CANALETA esta  es plástica de 13 x 7 milímetro para cableado delgado  y de 20 
                      x 12 milímetros para cable mas grueso  estas canaletas son de 2 metros de 
                      largo cada una ...
                  </p>
                </li>
              </ul>
            </div>
            <div class="home-item-3-head" style="text-align: center;" >
              <h3>MONTAJE  DE LA VIVIENDA</h3>
            </div>
            <div class="home-item-3-body" >
              <ul>
                <li>
                  <p>
                       La vivienda se entregara en el lugar de Construcción  de la misma.
                  </p>
                  <p>
                      y el transporte es gratis  solo hasta  30 kilómetros de distancia a la 
                      redonda en la cual mayor a esta distancia se cobrara  $ 200.000 Pesos 
                      adicionales
                  </p>
                  <p>
                      La vivienda se entregara  a entera satisfacción del propietario en un término 
                      de 10 días o mas dependiendo de lo que se quiera construir, y  después de 
                      haber tramitado la compra y la parte de facturación.
                  </p>
                  <p>
                      De igual forma se hace mención que en lotes que no tengan loza  o piso de 
                      sementó  es deber del propietario entregar el lote nivelado y listo para 
                      instalar sobre las viguetas.
                  </p>
                </li>
                <li>
                  <p>
                     Las aéreas de los corredores son gastos adicionales el cual se debe arreglar en 
                     la primera cotización que el cliente exija si este  lo demanda.
                  </p>
                </li>
                <li>
                  <p>
                     Los cielos falsos o machimbré se contrata igual de por aparte  en común acuerdo 
                     con el cliente.
                  </p>
                </li>
              </ul>
            </div>
          </div>            
        </div>
      </div>
    </div>        
  </div>    
</div>
<!--</div>-->
<?php view::includePartial('partials/footer.html') ?>
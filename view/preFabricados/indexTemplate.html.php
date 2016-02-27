<?php use mvc\view\viewClass as view ?>
<?php use mvc\routing\routingClass as routing ?>

<?php view::includePartial('partials/header.html') ?>

<div class="container" >
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="slider-container">
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
  <div class="row spacer-row" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="row" >
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-item-3">
            <div class="home-item-3-head" >
              <h3>Servicios</h3>
            </div>
            <!--<hr>-->
            <div class="home-item-3-body" >
              <p>
                Actualmente contamos con una gran variedad de diseños, planos
                y modelos modernos y comtemporaneos a dispocision.                
              </p>
              <!--<br />-->
              <!--<br />-->
              <!--<br />-->
              <br />
              <ul>
                <li>Casas</li>
                <li>Chalets</li>
                <li>Aulas escolares</li>
                <li>Casetas de vigilancia</li>
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
            <hr>
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
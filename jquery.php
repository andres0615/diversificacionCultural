<html>
    <head>
        <title>hola mundo</title>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js" ></script>
        <script>
            $(document).ready(function(){
                
                var rojo = false;
                
                console.log('hola mundo');
                $('#accion').click(function(e){
                    
                    e.preventDefault();
                    
                    if ( rojo === true) {
                        $('#reaccion').css({
                            'background': 'white'
                        });
                        rojo = false;
                    } else {
                        $('#reaccion').css({
                            'background': 'red'
                        });
                        
                        rojo = true;
                    }
                    
                    console.log(rojo);
                    
                });
            });
        </script>
    </head>
    <body>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        
        <div  >
            <a href="#" id="accion" >Mostrar/Ocultar</a>
        </div>
        <div id="reaccion" style="display: block">
            hola mundo.
        </div>
    </body>
</html>

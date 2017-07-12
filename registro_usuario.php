<!DOCTYPE html>
<html>
<head>
  <!-- Include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Include jQuery Mobile stylesheets -->
  <link rel="stylesheet" href="jquery/jquery.mobile-1.4.5.min.css">
  <!-- Include the jQuery library -->
  <script src="jquery/jquery.min.js"></script>
  <!-- Include the jQuery Mobile library -->
  <script src="jquery/jquery.mobile-1.4.5.min.js"></script>
  <script type="text/javascript" src="js/main.js" ></script>
  <script type="text/javascript" src="js/jquery.js" ></script>
</head>
<body>



<div data-role="page" id="pageone">
  	<div data-role="header" data-theme="b">
  	<a data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Atrás</a>
    <h1>Sign in</h1>
    <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-search ui-btn-icon-left">Search</a>

    <div data-role="navbar">
      <ul>
        <li><a href="#">Pronto habrán nuevas mejoras...</a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content">


	
	<!--Contenido de la página-->


  <h2>Regístrate en Cambia tu tiempo</h2>

  <div id="mensaje-registro"></div> <br>

  <form name="fValida">

  <div id="mensaje-registro"></div> <br>

  <span class="text text-danger" id="accion"></span>

  <input type="text" placeholder="Nombre de usuario" name="nombreUsuario" id="nombreUsuario" maxlength="30"><br>

  <input type="password" placeholder="Cree una contraseña" name="pass" id="pass" maxlength="30"><br>

  <input type="password" placeholder="Repita la contraseña" name="pass2" id="pass2" maxlength="30"><br>

  <input type="text" placeholder="Correo" name="correo" id="correo" maxlength="50"><br>

  <label for=""><strong>Fecha de nacimiento</strong></label>
  <input type="date" name="fecha" id="fecha"> <br>

  <a href="" data-role="button" onclick="enviardatosUsuario()" data-theme="b">Registrarse</a>

  </form>
  

  
<!--Aquí termina el contenido de la página-->





  </div>

  <div data-role="footer" data-theme="b" data-position="fixed">
    <h1>Comparte una <strong>sonrisa</strong></h1>
  </div>
</div> 




  <div data-role="main" class="ui-content">
    
  </div>
</div>

</body>
</html>
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

  <!--<script type="text/javascript" src="js/login.js" ></script>-->
  <script type="text/javascript" src="js/jquery.js" ></script>
  
  <script type="text/javascript" src="js/main.js"></script>
  

</head>
<body>

	<div data-role="page" id="pageone">
  	<div data-role="header" data-theme="b">
  	
    <h1>Iniciar Sesión</h1>
    

    <div data-role="navbar">
      <ul>
        <li><a href="registro_usuario.php">¿No tienes una cuenta? Registrate aquí</a></li>
      </ul>
    </div>
  </div>
	

	<div data-role="main" class="ui-content">
		<h1>Cambia tu tiempo</h1>

		<label for="fname" class="ui-hidden-accessible">Usuario</label>
     	<input type="text" name="usuario" id="usuario" placeholder="Usuario">
     	<br>
		<label for="fname" class="ui-hidden-accessible">Contraseña</label>
     	<input type="password" name="pass" id="pass" placeholder="Contraseña">

		<br>

    <div id="mensaje-login"></div> <br>

      <a data-theme="b" data-role="button" id="iniciar" onclick="iniciarSesion();">Login</a>

    <!-- Dialogo con el mensaje de error -->
    <div data-role="popup" id="error">
      <div data-role="header"><h1>Error</h1></div>
      <div data-role="body">
      <p>Usuario o contraseña no válida</p>
            <a href="#" data-role="button" data-rel="back">Aceptar</a>
            </div>
    </div>
    <section id="pageError" name="pageError" data-role="dialog">
        <header data-role="header">
            
        </header>
        <article data-role="content">
            
        </article>
    </section>
      


	</div>


	 <div data-role="footer" data-theme="b" data-position="fixed">
    <h1>Comparte una <strong>sonrisa</strong></h1>
  </div>
</div> 

</body>
</html>
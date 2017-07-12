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
    <!--Archivo JQuery-->
  <script type="text/javascript" src="js/jquery.js" ></script>
  <!--Archivo JavaScript donde se contienen las funciones-->
  <script type="text/javascript" src="js/main.js"></script>
</head>
<body>



<div data-role="page" id="pageone">
  	<div data-role="header" data-theme="b">
  
     <h1>Contraseña</h1>
    
    </div>
  

  <div data-role="main" class="ui-content">


	
	<!--Contenido de la página-->

  <div id="nombreUsuario"><?php include("php/buscarnombreUsuario.php") ?></div>

  <div id="msg-cambioPasswd"></div><br>

  <h1>Cambiar contraseña</h1>

      <!--<input type="text" name="pass_actual" id="passActual" placeholder="Contraseña actual"> <br>-->

      
      <input type="password" name="passNueva" id="passNueva" placeholder="Nueva contraseña"> <br>

      
      <input type="password" name="passNueva2" id="passNueva2" placeholder="Repita la nueva contraseña"> <br>

      <a href="" data-role="button" data-theme="b" onclick="cambioPassword();">Guardar cambios</a><br>

      <a href="" data-role="button" data-rel="back" data-theme="b">Cancelar</a>

<!--Aquí termina el contenido de la página-->






  </div>

  <div data-role="footer" data-theme="b" data-position="fixed">
    <h1>Comparte una <strong>sonrisa</strong></h1>
  </div>
</div> 


</div>

</body>
</html>
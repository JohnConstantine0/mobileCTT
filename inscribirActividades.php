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
  	<a data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
    <h1>Index</h1>
    <a href="logout.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">Log out</a>

    <div data-role="navbar" data-iconpos="left">
      <ul>
        <li><a href="#" class="ui-btn-active">Agendar Acts</a></li>
        <li><a href="cancelarActividades.php">Mis Acts</a></li>
        <li><a href="cambio_passwd.php">Configuración</a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content">


	
	<!--Contenido de la página-->
    <form method="post" action="">
      <h2>Inscribir actividades</h2>
    </form>
	<br>

  <div id="msg-inscribirActs"></div> <br>

  <div id="msg-error-inscribirActs"></div> <br>

  <div class="container" id="actsdisponiblesParticipantes"><?php Include('php/consultaactsParticipantes.php'); ?></div>

          <script type="text/javascript">
      
            $(document).ready(function () {
            
            verificarexistenciaactsDisponibles();
            });

          </script>


  
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

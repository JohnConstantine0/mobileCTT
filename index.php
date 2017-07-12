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
  
  <!--Script para habilitar los selects dependientes-->
  <script type="text/javascript">
    $(document).ready(function(){
      $("#tipoActividad").change(function(){
        $("#tipoActividad option:selected").each(function() {
          idTipo = $(this).val();
          $.post("php/buscarnombreAct.php", { idTipo: idTipo }, function(data){
            $("#nombreActividad").html(data);
          })
        })
      })

      $("#nombreActividad").change(function(){
      $("#nombreActividad option:selected").each(function(){
        idActividad = $(this).val();
        $.post("php/buscarnombreSede.php", { idActividad: idActividad }, function(data){
          $("#sedesDisponibles").html(data);
        })
      })
    })
    })
  </script>
<!--Aquí termina el script para los selects dependientes-->

</head>
<body>



<div data-role="page" id="pageone">
  	<div data-role="header" data-theme="b">
  	<a data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-icon-home ui-btn-icon-left">Home</a>
    <h1>Index</h1>
    <a href="logout.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">Log out</a>

    <div data-role="navbar">
      <ul>
        <li><a href="#" class="ui-btn-active">Altas</a></li>
        <li><a href="bajasAdministrador.php">Bajas</a></li>
        <li><a href="#">Opciones</a></li>
      </ul>
    </div>
  </div>

  <div data-role="main" class="ui-content">

<!--Contenido de la página-->

    <form method="post" action="">
      <h2>Alta de Actividades</h2>
    </form>
	   <br>

          <div id="msg-alta-Actividades"></div> <br>

          <div data-role="fieldcontain">

          <label><strong>Selecciona el tipo de actividad</strong></label>
          <select class="form-control" name="tipoActividad" id="tipoActividad"></select><br>

          </div>

          <label><strong>Selecciona la actividad</strong></label>
          <select class="form-control" name="nombreActividad" id="nombreActividad"></select><br>

          <label><strong>Selecciona la sede</strong></label>
          <select class="form-control" name="sedesDisponibles" id="sedesDisponibles"></select><br>

          <label for=""><strong>Ingrese la fecha en la que será la actividad</strong></label>
          <input type="date" name="fecha" id="fecha"> <br>

          <label for=""><strong>Ingrese la hora de inicio de la actividad</strong></label>
          <input type="time" name="horaInicio" id="horaInicio"><br>

          <label for=""><strong>Ingrese la hora final de la actividad</strong></label>
          <input type="time" name="horaFinal" id="horaFinal"><br>

          <label><strong>Ingrese el límite de participantes</strong></label>
          <input type="number" name="limiteParticipantes" id="limiteParticipantes" maxlength="2"> <br>

          <a href="#" data-role="button" data-theme="b" id="btn-registrar" name="btn-registrar" onclick="altaActividades();">Registrar actividad</a>

          <!--Script para obtener tipos de actividades en el primer select-->
          <script type="text/javascript">
      
            $(document).ready(function () {
            // body...
            gettipoActividad();
            });

          </script>
          <!--Aquí termina el script-->
  
      <!--Aquí termina el contenido de la página-->

</div>
<div data-role="footer" data-theme="b" data-position="fixed">
    <h1>Comparte una <strong>sonrisa</strong></h1>
  </div>
</div> 

</div>

</body>
</html>

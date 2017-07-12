<?php 
   require("conectar.php");

   @session_start();

   $idUsuario = $_SESSION['idUser'];
   $tipoActividad = $_POST['tipoActividad']; 
   $nombreActividad = $_POST['nombreActividad']; //ID ACTIVIDAD
   $sedesDisponibles = $_POST['sedesDisponibles'];
   $fecha = $_POST['fecha'];
   $horaInicio = $_POST['horaInicio'];
   $horaFinal = $_POST['horaFinal'];
   $limiteParticipantes = $_POST['limiteParticipantes'];

   $busqueda = "SELECT actsd.NOMBRE_ACT as nombreAct, actsd.SEDE_ACT as sedeActividad, actsd.FECHA_ACT as fechaAct, CONCAT(actsd.HORA_INICIO_ACT,'-',actsd.HORA_FINAL_ACT) as Horario from acts_disponibles as actsd, actividades as acts, tipo_actividad as tipo, sedes as sed where actsd.ID_ACTIVIDAD=acts.ID_ACTIVIDAD and acts.ID_TIPO=tipo.ID_TIPO and acts.ID_SEDE=sed.ID_SEDE and acts.ID_ACTIVIDAD = '$nombreActividad' and sed.ID_SEDE = '$sedesDisponibles' and actsd.FECHA_ACT = '$fecha' and actsd.HORA_INICIO_ACT = '$horaInicio' and actsd.HORA_FINAL_ACT = '$horaFinal';";

   $ejecutaBusqueda = mysqli_query($link, $busqueda) or die();

   if (mysqli_num_rows($ejecutaBusqueda) == 0) 
   {
   	
   	      /*CONSULTA PARA BUSCAR NOMBRE DE LA ACTIVIDAD DE ACUERDO AL ID*/

   	      $buscanombreActividad = "SELECT id_actividad as idActividad, nombre as nombreActividad from actividades where id_actividad = '$nombreActividad'";

   	      $ejecutabusquedaAct = mysqli_query($link, $buscanombreActividad) or die();

	      $rwActividad = mysqli_fetch_array($ejecutabusquedaAct);

   	      $nombreactConsulta = $rwActividad ['nombreActividad'];


   	      /*CONSULTA PARA BUSCAR EL NOMBRE DE LA SEDE DE ACUERDO AL ID*/

   	      $buscanombreSede = "SELECT id_sede as idSede, nombre as nombreSede from sedes where id_sede = '$sedesDisponibles'";

   	      $ejecutabusquedaSede = mysqli_query($link,$buscanombreSede) or die();

   	      $rwSede = mysqli_fetch_array($ejecutabusquedaSede);

   	      $nombreSede = $rwSede ['nombreSede'];

   	      /*INSERCIÓN DE ALTA DE ACTIVIDADES*/

	      $insertaAct = "INSERT INTO acts_disponibles(id_actividad,id_usuario,sede_act,nombre_act,fecha_act,hora_inicio_act,hora_final_act,limite_partic_act,fecha_subida) values('$nombreActividad','$idUsuario','$nombreSede','$nombreactConsulta','$fecha','$horaInicio','$horaFinal','$limiteParticipantes',now())";

	      $ejecutainsercionAct = mysqli_query($link, $insertaAct) or die();


		          if ($ejecutainsercionAct) 
		          {
			          echo "¡Actividad subida exitosamente!";
		          }
			          else
			          {
				          echo "Ha ocurrido un error";
			          }

             }else
   		          {
   			          echo "¡Esta actividad ya ha sido registrada con esta fecha y horario!";
   		          }
	
 ?>
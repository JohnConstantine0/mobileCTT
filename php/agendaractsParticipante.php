<?php 
	
	require("conectar.php");

	@session_start();

	$idactDisponible = $_POST['id'];
	$idUsuario = $_SESSION['idUser'];



	//CONSULTA PARA EXTRAER DATOS DE LA ACTIVIDAD DISPONIBLES

	$detalleactDisponible = "SELECT actDis.ID_ACTS_DISPONIBLES as idactDisponible, actDis.NOMBRE_ACT as nombreAct, actDis.SEDE_ACT as sedeAct, actDis.FECHA_ACT as fechaAct, actDis.HORA_INICIO_ACT as horaInicio, actDis.HORA_FINAL_ACT as horaFinal, actDis.LIMITE_PARTIC_ACT as capacidad from acts_disponibles as actDis where actDis.ID_ACTS_DISPONIBLES = '$idactDisponible';";

	$ejecutaDetalle = mysqli_query($link, $detalleactDisponible) or die();

	$rwdetalleactDisponible = mysqli_fetch_array($ejecutaDetalle);

	$rwfechaAct = $rwdetalleactDisponible['fechaAct'];

	$rwhoraInicio = $rwdetalleactDisponible['horaInicio'];

	$rwhoraFinal = $rwdetalleactDisponible['horaFinal'];

	$rwcapacidad = $rwdetalleactDisponible['capacidad'];

	
	//AQUÍ TERMINA LA CONSULTA PARA EXTRAER DATOS DE LA ACTIVIDAD DISPONIBLE

	//PROCESO PARA RESTAR CANTIDAD A CUPO

	$numero = 1;

	$resta = $rwcapacidad - $numero;

	$total = $resta;

	$updateCapacidad = "UPDATE acts_disponibles Set LIMITE_PARTIC_ACT='$total' Where ID_ACTS_DISPONIBLES='$idactDisponible';";

	$executeupdateCapacidad = mysqli_query($link, $updateCapacidad) or die();

	//AQUÍ TERMINA EL PROCESO PARA RESTAR CANTIDAD A CUPO


	//CONSULTA PARA COMPROBAR QUE NO HAYA CRUCE DE HORARIOS


	$verificaexistenciaFechayHorario = "SELECT actsd.ID_ACTS_DISPONIBLES as idactsDisponible,actsd.NOMBRE_ACT as nombreAct, actsd.SEDE_ACT as sedeAct, actsg.FECHA_ACT_AGENDADA as fechaAct, CONCAT(actsg.HORA_INICIO_AGENDADA,'-',actsg.HORA_FINAL_AGENDADA) as Horario from acts_agendadas as actsg, acts_disponibles as actsd where actsg.ID_ACTS_DISPONIBLES=actsd.ID_ACTS_DISPONIBLES and actsg.FECHA_ACT_AGENDADA = '$rwfechaAct' and actsg.HORA_INICIO_AGENDADA= '$rwhoraInicio' and actsg.HORA_FINAL_AGENDADA = '$rwhoraFinal'";

	$ejecutaverificarExistencia = mysqli_query($link, $verificaexistenciaFechayHorario) or die();

	//AQUÍ TERMINA LA CONSULTA PARA QUE NO HAYA CRUCE DE HORARIOS

	if (mysqli_num_rows($ejecutaverificarExistencia) == 0) 
	{
		
		$agendarAct = "INSERT INTO acts_agendadas(ID_ACTS_DISPONIBLES,ID_USUARIO,FECHA_ACT_AGENDADA,HORA_INICIO_AGENDADA,HORA_FINAL_AGENDADA,REALIZADO) values('$idactDisponible','$idUsuario','$rwfechaAct','$rwhoraInicio','$rwhoraFinal',0)";

		$ejecutaagendarAct = mysqli_query($link, $agendarAct) or die();

			if ($ejecutaagendarAct) 
			{
				echo "¡Actividad agendada exitosamente!";

			}else
				{
					echo "Ha ocurrido un error";
				}


	}else
		{
			echo "¡RAYOS! No puedes agendar esta actividad porque ya tienes otra actividad agendada en la misma fecha y horario";
		}


 ?>
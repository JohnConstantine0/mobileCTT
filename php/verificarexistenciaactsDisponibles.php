<?php 
	require("conectar.php");

	$verificaexistenciaactsDisponibles = "SELECT disp.id_acts_disponibles as idDisponible, tipo.NOMBRE as tipoActividad, disp.NOMBRE_ACT as nombreActividad, disp.SEDE_ACT as sedeActividad, sed.DIRECCION as direccionSede, acts.DESCRIPCION as descripcionAct, disp.LIMITE_PARTIC_ACT as Cupo, disp.FECHA_ACT as fechaAct, CONCAT(disp.HORA_INICIO_ACT,'-',disp.HORA_FINAL_ACT) as Horario from acts_disponibles as disp, actividades as acts, sedes as sed, tipo_actividad as tipo where disp.ID_ACTIVIDAD=acts.ID_ACTIVIDAD and acts.ID_SEDE=sed.ID_SEDE and acts.ID_TIPO=tipo.ID_TIPO and disp.limite_partic_act > 0 and not ID_ACTS_DISPONIBLES in (select ID_ACTS_DISPONIBLES from acts_agendadas where id_usuario = '$idUsuario')";

	$ejecutaverificarExistencia = mysqli_query($link, $verificaexistenciaactsDisponibles) or die();

	if (mysqli_num_rows($ejecutaverificarExistencia) == 0) 
	{
		echo "¡Vaya! Parece que no hemos encontrado actividades disponibles amigo/a";
	}

 ?>
<?php 
	require("conectar.php");

	$idtipoAct = $_POST['idTipo'];

	$buscarNombre = "SELECT id_actividad as idActividad, id_tipo as idTipo, nombre as nombreAct from actividades where id_tipo = '$idtipoAct';";

	$ejecutarBusqueda = mysqli_query($link, $buscarNombre) or die();
	echo '<option value="0">Seleccione una Actividad</option>';

	if (mysqli_num_rows($ejecutarBusqueda) > 0) 
	{
		while ($row = mysqli_fetch_array($ejecutarBusqueda)) 
		{
			$idActividad = $row['idActividad'];
			$nombreAct = $row['nombreAct'];

			echo '<option value="'.$idActividad.'">'.$nombreAct.'</option>';
		}
	}

 ?>
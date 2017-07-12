<?php 

	require("conectar.php");

	$idActividad = $_POST['idActividad'];

	$buscarSede = "SELECT sed.ID_SEDE as idSede ,sed.NOMBRE as nombreSede from actividades as act, sedes as sed where act.ID_SEDE=sed.ID_SEDE and act.ID_ACTIVIDAD = '$idActividad';";

	$ejecutarBusqueda = mysqli_query($link, $buscarSede) or die();
	echo '<option value="0">Seleccione una sede</option>';

	if (mysqli_num_rows($ejecutarBusqueda) > 0 ) 
	{
		while ($row = mysqli_fetch_array($ejecutarBusqueda)) 
		{
			$idSede = $row ['idSede'];
			$nombreSede = $row['nombreSede'];

			echo '<option value="'.$idSede.'">'.$nombreSede.'</option>';
		}
	}


 ?>
<?php 

	require("conectar.php");

	$buscatipoAct="SELECT id_tipo as idTipo, nombre as nombreTipo from tipo_actividad";

	$ejecutaBusqueda = mysqli_query($link, $buscatipoAct) or die();

	echo '<option value="0">Seleccione un tipo de Actividad</option>';

	if (mysqli_num_rows($ejecutaBusqueda) > 0) 
	{
		while ( $row = mysqli_fetch_array($ejecutaBusqueda)) 
		{
			$idTipo = $row ['idTipo'];
			$nombreTipo = $row['nombreTipo'];
			echo '<option value="'.$idTipo.'">'.$nombreTipo.'</option>';
		}
	}	



 ?>
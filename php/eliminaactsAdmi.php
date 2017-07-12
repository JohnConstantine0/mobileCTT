<?php 
	
	require("conectar.php");

	$id = $_POST['id'];

	$eliminaractDisponible = "DELETE FROM acts_disponibles WHERE ID_ACTS_DISPONIBLES = $id;";

	$ejecutarEliminacion = mysqli_query($link, $eliminaractDisponible) or die();

	if ($ejecutarEliminacion) 
	{
		echo "La actividad se ha eliminado correctamente";
	}else
		{
			echo "Ha ocurrido un error";
		}

 ?>
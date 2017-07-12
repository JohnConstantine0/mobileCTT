<?php

	require ('conectar.php');

	$nombreUsuario = $_POST['nombreUsuario'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$correo = $_POST['correo'];
	$fecha = $_POST['fecha'];


		$busqueda="SELECT * FROM usuarios where nombre = '$nombreUsuario'";

		$resultadoBusqueda = mysqli_query($link, $busqueda) or die();

		if (mysqli_num_rows($resultadoBusqueda)==0) 
		{
			$guardar = mysqli_query($link, "INSERT INTO usuarios(nombre,password,correo,fecha_nac,tipo_usuario) values ('$nombreUsuario','$pass','$correo','$fecha',0);");

			if ($guardar) 
			{
				echo "Registro exitoso";
			}
			else
			{
				echo "Error";
			}


		}
		else
		{
			$cadena = "El usuario '";

			$cadena = $cadena . $nombreUsuario;

			$exis = "' ya existe";
 
			$final = $cadena . $exis;

			echo $final;

			
		}
?>
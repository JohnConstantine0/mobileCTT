<?php 
	require("conectar.php");

	@session_start();

	$idUsuario = $_SESSION['idUser'];
	$passActual = $_POST['passActual'];
	$passNueva = $_POST['passNueva'];
	$passNueva2 = $_POST['passNueva2'];

	$updatePassword = "UPDATE usuarios Set password='$passNueva2' Where id_usuario='$idUsuario';";

	$executeUpdate = mysqli_query($link, $updatePassword) or die();

	if ($executeUpdate) 
		{
			echo "¡Contraseña actualizada exitosamente!";
		}


 ?>
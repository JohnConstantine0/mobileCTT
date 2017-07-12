<?php
	
	require ("conectar.php");

	@session_start();

	$usr = $_POST['usuario'];
	$pass = $_POST['pass'];

	$sql = "SELECT u.ID_USUARIO as idUsuario, u.TIPO_USUARIO as tipoUsuario from usuarios as u where u.NOMBRE = '$usr' and u.PASSWORD = '$pass'";

	$ejecutarSQL = mysqli_query($link, $sql) or die(mysqli_error($link));

	if (mysqli_num_rows($ejecutarSQL) > 0) 
	{
		$row = mysqli_fetch_array($ejecutarSQL);

		$idUsuario = $row ['idUsuario'];

		$tipoUsuario = $row ['tipoUsuario'];



		$_SESSION['idUser'] = $idUsuario;
		
		$_SESSION['tipoUser'] = $tipoUsuario;

		echo $tipoUsuario;
		
	}else
	{
		echo "Usuario y/o contraseña incorrecta";
	}

?>
<?php 
	require("conectar.php");

	@session_start();

    $idUsuario = $_SESSION['idUser'];

    $buscarNombre = "SELECT us.NOMBRE as nombreUsuario from usuarios as us where id_usuario = $idUsuario";

    $ejecutaBusqueda = mysqli_query($link, $buscarNombre) or die();

    $rwUsuario = mysqli_fetch_array($ejecutaBusqueda);

    $nombreUsuario = $rwUsuario['nombreUsuario'];



    $primeraParte = "Usuario en sesión: ";

    $final = $primeraParte . $nombreUsuario;

    echo $final;

 ?>
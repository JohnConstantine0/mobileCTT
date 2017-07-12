<?php
	$link =mysqli_connect("localhost","root","blackpanter");
	if($link)
	{

		mysqli_select_db($link,"ctt");
	}
	

?>
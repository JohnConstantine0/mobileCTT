<?php 
      if (empty($_SESSION['idUser'])) 
      {

      	//Sesión Iniciada

        echo "<a href="+"php/logout.php"+" class="+"ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left'>"+"Logout"+"</a>" . $_SESSION["idUser"] . "(" . $_SESSION["tipoUser"] . ")";
      }
      else
      {
      	//Sesión no iniciada
      	echo "¡Error!";
      }
     
     ?>
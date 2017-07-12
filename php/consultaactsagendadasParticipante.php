<script type="js/main.js"></script>
<?php

require("conectar.php");

@session_start();

$idUsuario = $_SESSION['idUser'];

$sql = mysqli_query($link, "SELECT actsd.ID_ACTS_DISPONIBLES as idactDisponible, tipo.NOMBRE as tipoAct, acts.NOMBRE as nombreAct, sed.NOMBRE as nombreSede, sed.DIRECCION as direccionSede, acts.DESCRIPCION as descripcionAct, actsd.FECHA_ACT as fechaAct, CONCAT(actsd.HORA_INICIO_ACT,'-',actsd.HORA_FINAL_ACT) as Horario from acts_disponibles as actsd, acts_agendadas as agdd, actividades as acts, tipo_actividad as tipo, sedes as sed where actsd.ID_ACTS_DISPONIBLES=agdd.ID_ACTS_DISPONIBLES and actsd.ID_ACTIVIDAD=acts.ID_ACTIVIDAD and acts.ID_TIPO=tipo.ID_TIPO and acts.ID_SEDE=sed.ID_SEDE and agdd.ID_USUARIO = '$idUsuario'");
?>


	  <table data-role="table" data-mode="reflow" id="tablaactsAdmi" class="ui-responsive table-stroke">
	  	<thead>	
			<tr class="active">
				<th>ID de Actividad</th>
				<th>Tipo Actividad</th>
				<th>Nombre Actividad</th>
				<th>Nombre Sede</th>
				<th>Dirección Sede</th>
				<th>Descripcion Actividad</th>
				<th>Fecha Actividad</th>
				<th>Horario Actividad</th>
				<th>Acción</th>
			</tr>
	  </thead>
		

<?php
	while ($row = mysqli_fetch_array($sql)) 
		{
			$idActividad = $row['idactDisponible']; 
			$tipoActividad = $row['tipoAct'];
			$nombreActividad = $row['nombreAct'];
			$nombreSede = $row['nombreSede'];
			$direccionSede = $row['direccionSede'];
			$descripcionAct = $row['descripcionAct'];
			$fechaAct = $row['fechaAct'];
			$horarioAct = $row['Horario'];
		
?>
	<tbody>
	<tr>
		<td><?=$idActividad?></td>
		<td><?=$tipoActividad?></td>
		<td><?=$nombreActividad?></td>
		<td><?=$nombreSede?></td>
		<td><?=$direccionSede?></td>
		<td><?=$descripcionAct?></td>
		<td><?=$fechaAct?></td>
		<td><?=$horarioAct?></td>
		<td><a href="#" data-role="button" data-theme="b" id="btn-eliminar" name="btn-eliminar" data-icon="delete"  onclick="">Cancelar</a></td>
	</tr>
	</tbody>

	<?php
		}
	?>

		</table>
 	

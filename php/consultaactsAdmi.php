<script type="php/main.js"></script>
<?php

require("conectar.php");

$sql = mysqli_query($link, "SELECT disp.id_acts_disponibles as idDisponible, tipo.NOMBRE as tipoActividad, disp.NOMBRE_ACT as nombreActividad, disp.SEDE_ACT as sedeActividad, sed.DIRECCION as direccionSede, acts.DESCRIPCION as descripcionAct, disp.LIMITE_PARTIC_ACT as Cupo, disp.FECHA_ACT as fechaAct, CONCAT(disp.HORA_INICIO_ACT,'-',disp.HORA_FINAL_ACT) as Horario from acts_disponibles as disp, actividades as acts, sedes as sed, tipo_actividad as tipo where disp.ID_ACTIVIDAD=acts.ID_ACTIVIDAD and acts.ID_SEDE=sed.ID_SEDE and acts.ID_TIPO=tipo.ID_TIPO and disp.limite_partic_act > 0");
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
				<th>Cupo</th>
				<th>Fecha Actividad</th>
				<th>Horario Actividad</th>
				<th>Acción</th>
			</tr>
	  </thead>
		

<?php
	while ($row = mysqli_fetch_array($sql)) 
		{
			$idActividad = $row['idDisponible']; 
			$tipoActividad = $row['tipoActividad'];
			$nombreActividad = $row['nombreActividad'];
			$nombreSede = $row['sedeActividad'];
			$direccionSede = $row['direccionSede'];
			$descripcionAct = $row['descripcionAct'];
			$cupo = $row['Cupo'];
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
		<td><?=$cupo?></td>
		<td><?=$fechaAct?></td>
		<td><?=$horarioAct?></td>
		<td><a href="#" data-role="button" data-theme="b" id="btn-eliminar" name="btn-eliminar" data-icon="delete"  onclick="bajaActs(<?=$idActividad?>);">Eliminar</a></td>
	</tr>
	</tbody>

	<?php
		}
	?>

		</table>
 	

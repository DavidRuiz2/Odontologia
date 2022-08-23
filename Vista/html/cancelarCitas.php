<?php 
	if ($result->num_rows > 0) {
?>
	<div id="ejecutar">
		
	</div>
	<table>
		<tr><th>Numero</th><th>Fecha</th><th>Hora</th></tr>

	<?php 

		while ($fila = $result->fetch_object()) {

	?>

		<tr>
			<td><?php echo $fila->citnumero;?></td>
			<td><?php echo $fila->citfecha;?></td>
			<td><?php echo $fila->cithora;?></td>
			<td><a href="#" onclick="confirmarCancelar(<?php echo $fila->citnumero;?>)">Cancelar</a></td>
		</tr>

	<?php 
	}
	?>
	</table>
	<?php
	}
	else{

	?>
	El paciente no posee citas Asignadas
	<?php
	}
	?>	
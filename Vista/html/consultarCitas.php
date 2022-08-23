<?php 
	if ($result->num_rows > 0) {
?>

	<table>
		<tr><th>Numero</th><th>Fecha</th><th>Hora</th></tr>

	<?php 

		while ($fila = $result->fetch_object()) {

	?>

		<tr>
			<td><?php echo $fila->citnumero;?></td>
			<td><?php echo $fila->citfecha;?></td>
			<td><?php echo $fila->cithora;?></td>
			<td><a href="index.php?accion=verCita&numero=<?php echo $fila->citnumero;?>">Ver</a></td>
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
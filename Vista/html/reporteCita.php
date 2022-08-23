<?php $fila = $result->fetch_object(); ?>


		<h1 style="text-align:center;">Informacion de la Cita</h1>
		<table style="border:1px solid #000; font-size:12pt;" align="center">
		<tr><th colspan="2" style="border:1px solid #000; text-align:center;">Datos del Paciente</th></tr>
		<tr><td>Documento</td><td><?php echo $fila->pacidentificacion;?></td></tr>
		<tr><td>Nombre</td><td><?php echo $fila->pacnombres." ".$fila->pacapellidos;?></td></tr>
		<tr><th colspan="2" style="border:1px solid #000; text-align:center;">Datos del Medico</th></tr>
		<tr><td>Documento</td><td><?php echo $fila->medidentificacion;?></td></tr>
		<tr><td>Nombre</td><td><?php echo $fila->mednombres." ".$fila->medapellidos;?></td></tr>
		<tr><th colspan="2" style="border:1px solid #000; text-align:center;">Datos de la Cita</th></tr>
		<tr><td>Numero</td><td><?php echo $fila->citnumero;?></td></tr>
		<tr><td>Fecha</td><td><?php echo $fila->citfecha;?></td></tr>
		<tr><td>Hora</td><td><?php echo $fila->cithora;?></td></tr>
		<tr><td>Numero de consultorio</td><td><?php echo $fila->connumero;?></td></tr>
		<tr><td>Nombre del consultorio</td><td><?php echo $fila->connombre;?></td></tr>
		<tr><td>Estado</td><td><?php echo $fila->citestado;?></td></tr>
		<tr><td>Observaciones</td><td><?php echo $fila->citobservaciones;?></td></tr>
	</table>
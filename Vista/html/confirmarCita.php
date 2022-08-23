<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Gestion Odontologica</title>
	<link rel="stylesheet" type="text/css" href="Vista/CSS/estilos.css">
	<link rel="icon" href="Vista/img/2.ico">
</head>
<body>

	<div id="contenedor">
		
	<div id="encabezado">
		</div>

		<ul id="menu">
			<li class="activa"><a href="index.php">Inicio</a></li>
			<li><a href="index.php?accion=asignar">Asignar cita</a></li>
			<li><a href="index.php?accion=consultar">Consultar cita</a></li>
			<li><a href="index.php?accion=cancelar">Cancelar cita</a></li>
		</ul>

		<div id="contenido">
		<?php $fila = $result->fetch_object();?>
			<h2>Informacion de la cita</h2>
			<table>
				<tr><th colspan="2">Datos del Paciente</th></tr>
				<tr>
					<td>Documento</td>
					<td><?php echo $fila->pacidentificacion;?></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><?php echo $fila->pacnombres." ".$fila->pacapellidos;?></td>
				</tr>
				<tr><th colspan="2">Datos del medico</th></tr>
				<tr>
					<td>Documento</td>
					<td><?php echo $fila->medidentificacion;?></td>
				</tr>
				<tr>
					<td>Nombre</td>
					<td><?php echo $fila->mednombres." ".$fila->medapellidos;?></td>
				</tr>
				<tr><th colspan="2">Datos de la cita</th></tr>
				<tr>
					<td>Numero</td>
					<td><?php echo $fila->citnumero;?></td>
				</tr>
				<tr>
					<td>Fecha</td>
					<td><?php echo $fila->citfecha;?></td>
				</tr>
				<tr>
					<td>Hora</td>
					<td><?php echo $fila->cithora;?></td>
				</tr>
				<tr>
					<td>Numero de consultorio</td>
					<td><?php echo $fila->connumero;?></td>
				</tr>
				<tr>
					<td>Estado</td>
					<td><?php echo $fila->citestado;?></td>
				</tr>
				<tr><td colspan="2"><a href="index.php?accion=reporte&numero=<?php echo $fila->citnumero;?>" target="blank">Generar Reporte</a></td></tr>
				<!-- <tr><td colspan="2"><a href="Vista/html/generarPDF.php" target="blank">Generar Reporte</a></td></tr> -->
			</table>
		</div>

	</div>
	
</body>
</html>
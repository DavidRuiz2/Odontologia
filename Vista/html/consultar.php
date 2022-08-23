<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Gestion Odontologica</title>
	<link rel="stylesheet" type="text/css" href="Vista/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="Vista/jquery/jquery-ui.css">
	<script type="text/javascript" src="Vista/jquery/jquery-1.11.3.min.js"></script>
	<script src="Vista/jquery/jquery-ui.js"></script>
	<script type="text/javascript" src="Vista/js/script.js"></script>
</head>
<body>

	<div id="contenedor">
		
		<div id="encabezado">
			<h1></h1>
		</div>

		<ul id="menu">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="index.php?accion=asignar">Asignar cita</a></li>
			<li class="activa"><a href="index.php?accion=consultar">Consultar cita</a></li>
			<li><a href="index.php?accion=cancelar">Cancelar cita</a></li>
		</ul>

		<div id="contenido">
			<h2>Consultar cita</h2>
			<form action="index.php?accion=consultarcita" method="post" id="frmconsultar">
				<table>
					<tr>
						<td>Documento del paciente</td>
						<td><input type="text" name="consultarDocumento" id="consultarDocumento"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" value="Consultar" onclick="consultarCita()">
						</td>
					</tr>
					<tr><td colspan="2"><div id="paciente2"></div></td></tr>
				</table>
			</form>
		</div>

	</div>
	
</body>
</html>
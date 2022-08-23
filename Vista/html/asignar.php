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
			<li class="activa"><a href="index.php?accion=asignar">Asignar cita</a></li>
			<li><a href="index.php?accion=consultar">Consultar cita</a></li>
			<li><a href="index.php?accion=cancelar">Cancelar cita</a></li>
		</ul>

		<div id="contenido">
			<h2>Asignar Cita</h2>
			<form action="index.php?accion=guardarCita" method="post" id="frmasignar">
				<table>
					<tr>
						<td>Documento del paciente</td>
						<td><input type="text" name="asignarDocumento" id="asignarDocumento"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" name="asignarConsultar" value="Consultar" id="asignarConsultar" onclick="consultarPaciente()"/>
						</td>
					</tr>
					<tr><td colspan="2"><div id="paciente"></div></td></tr>
					<tr>
						<td>Medico</td>
						<td>
							<select id="medico" name="medico">
								<option value="-1" selected="selected">---Seleccione el medico---</option>
								<?php 

									while ($fila = $result->fetch_object())
									{
								?>
								<option value="<?php echo $fila->medidentificacion?>">
									<?php echo $fila->medidentificacion." ".$fila->mednombres." ".$fila->medapellidos?>
								</option>
								<?php			
									}

								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Fecha</td>
						<td><input type="text" name="fecha" id="fecha" readonly="readonly"></td>
					</tr>
					<tr>
						<td>Hora</td>
                        <td>
                            <select id="hora" name="hora" onmousedown="seleccionarHora()">
                                <option value="-1" selected="selected">---Seleccione la hora---</option>
                                <option>08:00:00 </option>
                                <option>08:20:00 </option>
                                <option>08:40:00</option>
                                <option>09:00:00 </option>
								<option>09:20:00 </option>
								<option>09:40:00 </option>
								<option>10:00:00 </option>
                            </select>
                        </td>
                    </tr>
					</tr>
					<tr>
						<td>Consultorio</td>
						<td>
							<select id="consultorio" name="consultorio">
								<option value="-1" selected="selected">---Seleccione el consultorio---</option>
								<?php 

								while ($fila2 = $result2->fetch_object()) 
								{
								?>
								<option value="<?php echo $fila2->connumero?>">
								<?php echo $fila2->connumero." ".$fila2->connombre?>
								</option>
								<?php
								}

								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="asignarEnviar" value="Enviar" id="asignarEnviar">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>

	<div id="frmPaciente" title="Agregar nuevo paciente">
		<form id="agregarPaciente">
			<table>
				<tr>
					<td>Documento:</td>
					<td><input type="text" name="pacDocumento" id="pacDocumento" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Nombres</td>
					<td><input type="text" name="pacNombres" id="pacNombres"></td>
				</tr>
				<tr>
					<td>Apellidos</td>
					<td><input type="text" name="pacApellidos" id="pacApellidos"></td>
				</tr>
				<tr>
					<td>Fecha de Nacimiento</td>
					<td><input type="text" name="pacNacimiento" id="pacNacimiento" readonly="readonly"></td>
				</tr>
				<tr>
					<td>Sexo</td>
					<td>
						<select id="pacSexo" name="pacSexo">
							<option value="-1" selected="selected">---Seleccione el sexo---</option>
							<option>Masculino</option>
							<option>Femenino</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
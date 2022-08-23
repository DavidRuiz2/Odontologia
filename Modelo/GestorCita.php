<?php 

	class GestorCita {

		public function agregarCita(Cita $cita){

			$conexion = new Conexion();
			$conexion->abrir();

			$fecha = $cita->obtenerFecha();
			$hora = $cita->obtenerHora();
			$paciente = $cita->obtenerPaciente();
			$medico = $cita->obtenerMedico();
			$consultorio = $cita->obtenerConsultorio();
			$estado = $cita->obtenerEstado();
		
			
			$sql = "INSERT INTO citas VALUES (null,'$fecha','$hora','$paciente','$medico','$consultorio','$estado')";
			$conexion->consulta($sql);
			$citaId = $conexion->obtenerCitaId();
			$conexion->cerrar();
			return $citaId;

		}

		public function consultarCitaPorId($id){

			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT pacientes.*,medicos.*,consultorios.*,citas.* FROM pacientes,medicos,consultorios,citas WHERE citas.citpaciente = pacientes.pacidentificacion AND citas.citmedico = medicos.medidentificacion AND citas.citconsultorio = consultorios.connumero AND citas.citnumero = $id";
			$conexion->consulta($sql);
			$result = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result;

		}

		public function consultarCitasPorDocumento($doc){

			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT * FROM citas WHERE citpaciente ='$doc' AND citestado ='Solicitada'";
			$conexion->consulta($sql);
			$result = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result;
		}

		public function consultarPaciente($doc){
			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT * FROM pacientes WHERE pacidentificacion = '$doc'";
			$conexion->consulta($sql);
			$result = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result;
		}

		public function agregarPaciente(Paciente $paciente){

			$conexion = new Conexion();
			$conexion->abrir();
			$identificacion = $paciente->obtenerIdentificacion();
			$nombres = $paciente->obtenerNombres();
			$apellidos = $paciente->obtenerApellidos();
			$fecha = $paciente->obtenerFechaNacimiento();
			$sexo = $paciente->obtenerSexo();
			$sql = "INSERT INTO pacientes VALUES ('$identificacion','$nombres','$apellidos','$fecha','$sexo')";
			$conexion->consulta($sql);
			$filasAfectadas = $conexion->obtenerFilasAfectadas();
			$conexion->cerrar();
			return $filasAfectadas;

		}

		public function consultarMedicos(){

			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT * FROM medicos";
			$conexion->consulta($sql);
			$result = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result;

		}

		public function consultarHorasDisponibles($medico,$fecha){
			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT hora FROM horas WHERE hora NOT IN (SELECT cithora FROM citas WHERE citmedico ='$medico' AND citfecha='$fecha' AND citestado='Solicitada')";
			$conexion->consulta($sql);
			$result = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result;
		}

		public function consultarConsultorios(){

			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "SELECT * FROM consultorios";
			$conexion->consulta($sql);
			$result2 = $conexion->obtenerResult();
			$conexion->cerrar();
			return $result2;

		}

		public function cancelarCita($cita){
			$conexion = new Conexion();
			$conexion->abrir();
			$sql = "UPDATE citas SET citestado='Cancelada' WHERE citnumero=$cita";
			$conexion->consulta($sql);
			$filasAfectadas = $conexion->obtenerFilasAfectadas();
			$conexion->cerrar();
			return $filasAfectadas;
		}

	}

?>
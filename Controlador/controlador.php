<?php 

	class Controlador {

		public function verPagina($ruta){

			require_once $ruta;

		}

		public function agregarCita($doc,$med,$fec,$hor,$con){

			$cita = new Cita(null,$fec,$hor,$doc,$med,$con,"Solicitada","Ninguna");
			$gestorCita = new GestorCita();
			$id = $gestorCita->agregarCita($cita);
			$result = $gestorCita->consultarCitaPorId($id);
			require_once "Vista/html/confirmarCita.php";

		}

		public function consultarCitas($doc){

			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarCitasPorDocumento($doc);
			require_once "Vista/html/consultarCitas.php";

		}

		public function cancelarCitas($doc){

			$gestorCita = new GestorCita();
			$result = $gestorCita -> consultarCitasPorDocumento($doc);
			require_once "Vista/html/cancelarCitas.php";

		}

		public function consultarPaciente($doc){

			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarPaciente($doc);
			require_once "Vista/html/consultarPaciente.php";

		}

		public function agregarPaciente($doc,$nom,$ape,$fec,$sex){

			$paciente = new Paciente($doc,$nom,$ape,$fec,$sex);
			$gestorCita = new GestorCita();
			$registros = $gestorCita->agregarPaciente($paciente);

			if ($registros>0) {
				echo "Paciente insertado con exito";
			}
			else{
				echo "Error al insertar el paciente, intente de nuevo";
			}

		}

		public function cargarAsignar(){
			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarMedicos();
			$result2 = $gestorCita->consultarConsultorios();
			require_once "Vista/html/asignar.php";
		}

		public function consultarHorasDisponibles($medico,$fecha){
			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarHorasDisponibles($medico,$fecha);
			require_once "Vista/html/consultarHoras.php";
		}

		public function verCita($cita){
			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarCitaPorId($cita);
			require_once "Vista/html/confirmarCita.php";
		}

		public function confirmarCancelarCita($cita){
			$gestorCita = new GestorCita();
			$registros = $gestorCita->cancelarCita($cita);
			if ($registros>0) {
				?>

				<script>
				alert('Cancelacion Exitosa');
				window.location = 'idex.php?accion=cancelar';
				</script>
				<?php

			}

			else{
				echo "Error al cancelar cita, intente de nuevo";
			}
		}

		public function generarReporte($cita){
			$gestorCita = new GestorCita();
			$result = $gestorCita->consultarCitaPorId($cita);
			ob_start();
			require_once ('Vista/html/generarPDF.php');
			$content = ob_get_clean();
			require_once ('Vista/fpdf/fpdf.php');
			
			$pdf -> output();
		}
	}

?>
<?php 
	
	require_once 'Controlador/Controlador.php';
	require_once 'Modelo/GestorCita.php';
	require_once 'Modelo/Cita.php';
	require_once 'Modelo/Paciente.php';
	require_once 'Modelo/Conexion.php';


	$controlador = new Controlador();

	if (isset($_GET['accion'])) {
		
		if($_GET['accion']=="asignar") {
			$controlador->cargarAsignar();
		}

		elseif ($_GET['accion']=="consultar") {
			$controlador->verPagina("Vista/html/consultar.php");
		}

		elseif ($_GET['accion']=="cancelar") {
			$controlador->verPagina("Vista/html/cancelar.php");
		}

		elseif ($_GET['accion']=="guardarCita") {
			$controlador->agregarCita($_POST['asignarDocumento'],$_POST['medico'],$_POST['fecha'],$_POST['hora'],$_POST['consultorio']);

		}

		elseif ($_GET['accion']=="consultarcita") {
			$controlador->consultarCitas($_GET['consultarDocumento']);
		}

		elseif ($_GET['accion']=="cancelarCita") {
			$controlador->cancelarCitas($_GET["cancelarDocumento"]);
		}

		elseif ($_GET['accion']=="consultarpaciente") {
			$controlador->consultarPaciente($_GET['documento']);
		}

		elseif ($_GET['accion'] == "ingresarpaciente"){
			$controlador->agregarPaciente($_GET['pacDocumento'], $_GET['pacNombres'], 
				$_GET['pacApellidos'], $_GET['pacNacimiento'], $_GET['pacSexo']);
		}

		elseif ($_GET['accion'] == "consultarHora") {
			$controlador->consultarHorasDisponibles($_GET['medico'],$_GET['fecha']);
		}

		elseif ($_GET['accion']=="verCita") {
			$controlador->verCita($_GET['numero']);
		}

		elseif ($_GET['accion']=="confirmarCancelar") {
			$controlador->confirmarCancelarCita($_GET['numero']);
		}
		
		elseif ($_GET['accion']=="reporte") {
			$controlador->generarReporte($_GET['numero']);

		}


	}

	else{

		$controlador->verPagina("Vista/html/inicio.php");

	}

	
?>
	

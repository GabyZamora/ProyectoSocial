<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
	case 'li':
		$Form = 'presentacion/servicios/listar.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario para nuevos registros
		case 'nu':
		$Form = 'presentacion/servicios/nuevo.php';
		$FormValid = true;
		break;
	//Opción para abrir el archivo que agrega registros
		case 'ag':
		$Form = 'presentacion/servicios/agregar.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario para nuevos registros
		case 'ed':
		$Form = 'presentacion/servicios/editar.php';
		$FormValid = true;
		break;
	//Opción para abrir el archivo que actualiza los registros
		case 'ac':
		$Form = 'presentacion/servicios/actualizar.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario de detalle de los registros
		case 'de':
		$Form = 'presentacion/servicios/detalles.php';
		$FormValid = true;
		break;
	//Opción para abrir el archivo que elimina registros
		case 'el':
		$Form = 'presentacion/productos/eliminar.php';
		$FormValid = true;
		break;
	default:
		$FormValid = false;
		break;
}
//Llamadas a los archivos de formularios.
if ( $FormValid ){
	require_once $Form;
}
else {
	header('Location: error404.php');
}
?>
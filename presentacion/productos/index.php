<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
	case 'li':
		$Form = 'presentacion/productos/catalogo.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario para nuevos registros
		case 'nu':
		$Form = 'presentacion/productos/nuevo.php';
		$FormValid = true;
		break;
	//Opción para abrir el archivo que agrega registros
		case 'ag':
		$Form = 'presentacion/productos/agregar.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario para editar registros
		case 'ed':
		$Form = 'presentacion/productos/editar.php';
		$FormValid = true;
		break;
	//Opción para abrir el archivo que actualiza los registros
		case 'ac':
		$Form = 'presentacion/productos/actualizar.php';
		$FormValid = true;
		break;
	//Opción para abrir formulario de detalle de los registros
		case 'de':
		$Form = 'presentacion/productos/detalles.php';
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
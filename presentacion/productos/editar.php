<?php
require_once 'datos/datos.php';
require_once 'negocio/categoria.php';
include 'presentacion/navconf.php';
require_once 'negocio/productos.php';

$Obj_Categorias= new Categoria();
$DatosCategorias = $Obj_Categorias->ListarTodoCombos();
	$Obj_Productos = new Producto();
	//Cargamos el registro solicitado
	$DatosProductos = $Obj_Productos->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosProductos as $Fila ) {
	$DatosProductos = $Fila;
	}
?>
<!-- CSS -->
<head>
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">

<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="css/iconfont/material-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css"> 
	<link rel="stylesheet" href="css/body.css">
	<script src="https://kit.fontawesome.com/b1f3afb15c.js" crossorigin="anonymous"></script>
</head>
<form name="frmEditar" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="form-row">
					<div class="col-md-8">
						<h2>Editar Producto</h2>
					</div>
					<div class="col-md-6">
							<button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=prod&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
							<button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
						</div>
				</div>
			</div>
				<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
				<div class="form-group col-md-8">
					<label>Nombre del Producto: </label>
					<input type="text" class="form-control" id="txtNombreProd"
					name="txtNombreProd" value="<?php echo $Fila['NombreProducto']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId"
					value="<?php echo $Fila['IdProducto']; ?>">
				</div>
			</div>
	<!---------------------------- Fila 2 -------------------------- -->
			<div class="form-row">
				<div class="form-group col-md-8">
					<label>Descripcion: </label>
					<input type="text" class="form-control" id="txtDescripcion"
					name="txtDescripcion" value="<?php echo $Fila['Descripcion']; ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Categoria Producto: </label>
						<select id="cbxCateProd" name="cbxCateProd" class="form-control">
							<option value="<?php echo $Fila['IdCategoria']; ?>"><?php
					echo $Fila['NombreCategoria']; ?></option>
							<?php
							foreach ( $DatosCategorias as $FilaCategoria ) {
							?>
						<option value="<?php echo $FilaCategoria['IdCategoria']; ?>"><?php echo
						$FilaCategoria['Nombre']; ?></option>
							<?php
							}
							?>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
				<label>Estado: </label>
				<select id="cbxEliminado" name="cbxEliminado" class="form-control">
					<option value="<?php echo $Fila['Eliminado']; ?>">
					<option value="S">Si</option>
					<option value="N">No</option>
					</select> 
				</div>
			</div>
		</div> <!-- Cierre del Div table-wrapper -->
	</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos --------------------->
<script type="text/javascript">
	function ValidarEditar(){
		if ( !document.getElementById('txtNombreProd').value ) {
			alert('Ingrese el Nombre del Producto');
		}
		if ( !document.getElementById('txtDescripcion').value ) {
			alert('Ingrese la descripción');
		}
		
		else {
			document.forms.frmEditar.action = 'index.php?mod=prod&form=ac';
			document.forms.frmEditar.submit();
		}
	}
</script>
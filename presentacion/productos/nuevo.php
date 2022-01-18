<?php
require_once 'datos/datos.php';
require_once 'negocio/categoria.php';
include 'presentacion/navconf.php';
$Obj_Categoria= new Categoria();
$DatosCategoria = $Obj_Categoria->ListarTodoCombos();
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
	<script src="https://kit.fontawesome.com/b1f3afb15c.js" crossorigin="anonymous"></script>


<form name="frmNuevo" action="#" method="post" enctype="multipart/form-data">
	<div class="container">
		<div class="table-wrapper">
 			<div class="table-title">
 				<div class="form-row">
 					<div class="col-md-8">
 						<h2>Nuevo Producto</h2>
					</div>
 					<div class="col-md-4">
 						<button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=prod&form=cat');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
 						<button type="button" class="btn btn-success"
						onClick="ValidarNuevo();"><i class="material-icons">&#xe161;</i><span>Guardar</span></button>
 					</div>
				</div>
			</div>
			  <!-- -------------------------- Fila 1 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de producto: </label>
 					<input type="text" class="form-control" id="txtNombre"
					name="txtNombre">
 				</div>
 			</div>
 			<!-- -------------------------- Fila 2 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
 					<label>Descripción: </label>
					 <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"
					rows="3"></textarea>
 				</div>
 			</div>

 			<div class="form-row">
	 			<div class="form-group col-md-6">
		 			<label>Categoria: </label>
					 <select id="cbxCategoria" name="cbxCategoria" class="form-control">
						 <option value="">Seleccione...</option>
						 <?php
						 foreach ( $DatosCategoria as $FilaCategoria ) {
						 ?>
			 			<option value="<?php echo $FilaCategoria['IdCategoria']; ?>"><?php echo
						$FilaCategoria['Nombre']; ?></option>
						 <?php
						 }
						 ?>
		 			</select>
				</div>
            <div class="form-row">
 				<div class="form-group col-md-8">
					<label>Imagen de producto: </label>
 					<input type="file" class="form-control" id="Imagen"
					name="Imagen">
 				</div>
 			</div>
 		</div> <!-- Cierre del Div table-wrapper -->
	</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarNuevo(){
		 if ( !document.getElementById('txtNombreServ').value ) {
		 alert('Ingrese el nombre del producto');
		 }
		 else if (!document.getElementById('cbxCategoria').value) {
			 alert('Seleccione categoría de producto')
		 }
		 else {
		 document.forms.frmNuevo.action = 'index.php?mod=prod&form=ag';
		 document.forms.frmNuevo.submit();
		 }
	}
</script>
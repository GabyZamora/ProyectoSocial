<?php
include('presentacion/nav.php');

require_once 'datos/datos.php';

require_once 'negocio/productos.php';

$Obj_Productos = new Producto();

$DatosProductos = $Obj_Productos->BuscarPorId( $_GET['id'] );

foreach ( $DatosProductos as $Fila ) {
$DatosProductos = $Fila;
}
?>
<html lang="es">
<head>
<meta charset="utf-8">
<link href="https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@600&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css">
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/detalles.css">
<!-- JS -->
<script src="js/jquery-3.4.0.min.js"></script>
<script src="js/bootstrap-4.3.1.min.js"></script>
</head>
<body>
<div class="contain">
	<div class="col-md-6">
		<h2>Descripción</h2>
	</div>
	<div class="col-md-5">
		<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=prod&form=cat');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
	</div>
	<div class="col-md-4">
		<img src="data:image/png;base64, <?php echo base64_encode($Fila['Producto_imagen']); ?>">
	</div>
	<div class="col-md-4">
		<label>Nombre: </label>
		<input type="text" class="form-control" id="txtNombre" name="txtNombre" readonly value="<?php echo $Fila['Nombre']; ?>">
		<label>Descripcion: </label>
		<input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" readonly value="<?php echo $Fila['Descripcion']; ?>">
		<label>Categoria: </label>
		<input type="text" class="form-control" id="txtCategoria" name="txtCategoria" readonly value="<?php echo $Fila['NombreCategoria']; ?>">
	</div>	
</div> <!-- Cierre del Div container -->
</body>


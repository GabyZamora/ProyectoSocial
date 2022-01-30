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
<link rel="stylesheet" href="css/body.css">
<!-- JS -->
<script src="js/jquery-3.4.0.min.js"></script>
<script src="js/bootstrap-4.3.1.min.js"></script>
</head>
<body>
	<div class="containa">
		<div style="border: white 8px groove; border-radius:10px;"class="col-md-4">
			<img src="data:image/png;base64, <?php echo base64_encode($Fila['Producto_imagen']); ?>">
		</div>
		<div class="col-md-4">
			<h3 style="font-size: 30px; font-family: 'Bitter';"><b><?php echo $Fila['NombreProducto']; ?></b></h3>
			<h3> <?php echo $Fila['Descripcion']; ?> </h3>
			<h3><b>Categoría:</b> <?php echo $Fila['NombreCategoria']; ?></h3>
			<label>Para más información sobre este y más productos, consulta en nuestra página de facebook<br> <a href="https://www.facebook.com/NaturistaAura/">Productos Naturales Aura</a></label>
		</div>	
	</div> 
</body>


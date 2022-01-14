<?php
include('presentacion/nav.php');
?>
<head>
  <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet"> 
  <html lang="es">
  <link rel="stylesheet" href="css/iconfont/material-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@600&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="css/bootstrap-3.3.7.min.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/catalogo.css">


    <!-- JS -->
  <script src="js/jquery-3.4.0.min.js"></script>
  <script src="js/bootstrap-4.3.1.min.js"></script>
</head>
<body>
  <h2 class="title">Cátalogo de productos</h2>
  <div class="contain">
    <?php
    include('datos/conexion.php');
      $query="SELECT * FROM productos WHERE IdCategoria='7'";;
      $resultado=$conexion->query($query);
      while ($row=$resultado->fetch_assoc()){
        ?>
      <div class="card">
        <img src="data:image/png;base64, <?php echo base64_encode($row['Producto_imagen']); ?>">
        <h4><?php echo $row ['Nombre']; ?></h4>
        <p><?php echo $row['Descripcion']; ?></p>
        <a href="#">Ver más</a>
      </div>
      
      <?php
      }
      ?>

  </div>
</body>
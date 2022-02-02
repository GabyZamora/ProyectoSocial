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
  <link rel="stylesheet" href="css/body.css">


    <!-- JS -->
  <script src="js/jquery-3.4.0.min.js"></script>
  <script src="js/bootstrap-4.3.1.min.js"></script>
</head>
<body>
  <h2 class="title">Pildoras</h2>
  <div class="col-md-1">
    <section class="sidebar sidebar-right">
      <label>Categorias: </label>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=ja">Jarabes</a></li>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=cre">Cremas</a></li>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=pil">Pildoras</a></li>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=me">Medicamentos</a></li>
    </section>
  </div>
  <div class="contain">
  <?php
    include('datos/conexion.php');
      $query="SELECT * FROM productos WHERE IdCategoria='7'";
      $resultado=$conexion->query($query);
      while ($row=$resultado->fetch_assoc()){
        ?>
      <div class="card">
        <img src="data:image/png;base64, <?php echo base64_encode($row['Producto_imagen']); ?>">
        <h4><?php echo $row ['Nombre']; ?></h4>
        <a href="index.php?mod=prod&form=de&id=<?php echo $row['IdProducto']; ?>">Ver más</a>
      </div>
      
      <?php
      }
      ?>

  </div>
</body>
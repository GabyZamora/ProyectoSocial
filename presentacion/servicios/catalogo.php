<?php
include('presentacion/nav.php');

?>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/iconfont/material-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-3.3.7.min.css">
    <link rel="stylesheet" href="css/body.css">
    <!-- JS -->
    <script src="js/jquery-3.4.0.min.js"></script>
    <script src="js/bootstrap-4.3.1.min.js"></script>
</head>
<body>

<div class="serv">
<?php
    include('datos/conexion.php');
      $query="SELECT * FROM servicios";
      $resultado=$conexion->query($query);
      while ($row=$resultado->fetch_assoc()){
        ?>
      <div class="card">
        <img src="data:image/png;base64, <?php echo base64_encode($row['Servicio_Imagen']); ?>">
        <h4><?php echo $row ['Nombre']; ?></h4>
      </div>
      <?php
      }
      ?>

</div>
</body>


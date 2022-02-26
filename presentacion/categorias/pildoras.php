<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/productos.php';
require_once 'negocio/paginador.php';
include('presentacion/nav.php');
//Instanciamos las clases de la capa de negocio
$Obj_Paginador = new Paginador();
$Obj_Productos = new Producto();

//Asignamos los valores necesatrios a los atributos de la clase del paginador -----------------------------------------
$Obj_Paginador->Cadena = $Obj_Productos->Pildora( addslashes( @$_POST['txtBuscar'] ) );
$Obj_Paginador->CantTotalReg = $Obj_Productos->CantTotalRegistros( addslashes( @$_POST['txtBuscar']
) );
$Obj_Paginador->FilasPorPagina = 20; //Define la cantidad de registros mostrados por página
$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
$Obj_Paginador->EnlaceListar = "mod=cate&form=ja"; //Define el enlace al modulo y formulario listar de ese módulo
//Aplicamos la configuración al paginador
$Obj_Paginador->ConfPaginador();
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
  <h2 class="title">Píldoras</h2>
  <div class="col-md-1">
    <section class="sidebar sidebar-right">
      <label>Categorias: </label>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=ja">Jarabes</a></li>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=pil">Pildoras</a></li>
          <li class="list-group-item list-group-item_light"><a class="center-block" href="index.php?mod=cate&form=me">Medicamentos</a></li>
    </section>
  </div>
  <div class="contain">
      <?php
        foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
      ?>
      <div class="card">
        <img src="data:image/png;base64, <?php echo base64_encode($Fila['Producto_imagen']); ?>">
        <h4><?php echo utf8_encode($Fila ['NombreProducto']); ?></h4>
        <a href="index.php?mod=prod&form=de&id=<?php echo $Fila['IdProducto']; ?>">Ver más</a>
      </div>
      
      <?php
      }
      ?>
  </div>
</body>
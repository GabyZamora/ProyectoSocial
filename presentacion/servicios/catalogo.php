<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/servicios.php';
require_once 'negocio/paginador.php';
include('presentacion/nav.php');
//Instanciamos las clases de la capa de negocio
$Obj_Paginador = new Paginador();
$Obj_Servicios = new Servicios();

//Asignamos los valores necesatrios a los atributos de la clase del paginador -----------------------------------------
$Obj_Paginador->Cadena = $Obj_Servicios->ListarTodos( addslashes( @$_POST['txtBuscar'] ) );
$Obj_Paginador->CantTotalReg = $Obj_Servicios->CantTotalRegistros( addslashes( @$_POST['txtBuscar']
) );
$Obj_Paginador->FilasPorPagina = 20; //Define la cantidad de registros mostrados por página
$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
$Obj_Paginador->EnlaceListar = "mod=ser&form=cat"; //Define el enlace al modulo y formulario listar de ese módulo
//Aplicamos la configuración al paginador
$Obj_Paginador->ConfPaginador();
?>
<head>
    <html lang="es">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
    <h2 class="title">Nuestros servicios</h2>
    <div class="serv">
        <?php
            foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
        ?>
        <div class="card">
            <img src="data:image/png;base64, <?php echo base64_encode($Fila['Servicio_Imagen']); ?>">
            <h4><?php echo utf8_encode($Fila ['Nombre']); ?></h4>
            <p> <?php echo utf8_encode($Fila['Descripcion']); ?></p>
        </div>
        <?php
        }
        ?>
    </div>
</body>


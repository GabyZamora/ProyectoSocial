<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/categoria.php';

include 'presentacion/navconf.php';

//Instanciamos las clases de la capa de negocio
$Obj_Categorias = new Categoria();
//Cargamos el registro solicitado
$DatosCategorias = $Obj_Categorias->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCategorias as $Fila ) {
  $DatosCategorias = $Fila;
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
            <h2>Editar Categorías</h2>
          </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=cate&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarEditar();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>
        <!--Fila 1 -->
        <div class="form-row">
          <div class="form-group col-md-8">
            <label>Nombre: </label>
            <input type="text" class="form-control" id="txtNombreC" name="txtNombreC" value="<?php
            echo $Fila['Nombre']; ?>">
          </div>
          <div class="form-group col-md-4">
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
    <!-- Validaciones de ingreso de datos-->
    <script type="text/javascript">
    function ValidarEditar(){
      if ( !document.getElementById('txtNombreC').value ) {
        alert('Ingrese el nombre de la categoría');
      }
      else {
        document.forms.frmEditar.action = 'index.php?mod=cate&form=ac';
        document.forms.frmEditar.submit();
      }
    }
  </script>

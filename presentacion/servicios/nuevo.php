<?php
include ('presentacion/navconf.php');
?>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<link rel="stylesheet" href="css/body.css">
<form name="frmNuevo" action="" method="post">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="form-row">
                    <div class="col-md-8">
                        <h2>Nueva Categoría</h2>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-danger"
                        onClick="location.replace('index.php?mod=cate&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
                        <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
                        class="material-icons">&#xe161;</i><span>Guardar</span></button>
                    </div>
                </div>
            </div>
        <!--Fila 1 -->
        <div class="form-row">
            <div class="form-group col-md-8">
                <label>Nombre: </label>
                <input type="text" class="form-control" id="txtNombreS" name="txtNombreS">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label>Descripción: </label>
                <input type="text" class="form-control" id="txtDescripcionS" name="txtDescripcionS">
            </div>
        </div>
        <div class="form-group col-md-4">
            <label>Eliminado: </label>
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
  <!--  Validaciones de ingreso de datos --->
  <script type="text/javascript">
  function ValidarNuevo(){
    if ( !document.getElementById('txtNombreS').value ) {
      alert('Ingrese el nombre del nuevo servicio');
    }
    else {
      document.forms.frmNuevo.action = 'index.php?mod=ser&form=ag';
      document.forms.frmNuevo.submit();
    }
  }
</script>

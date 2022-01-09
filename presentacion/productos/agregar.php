<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/productos.php';
//Instanciamos la clase de la capa de negocio
$Obj_Productos = new Productos();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Productos->Nombre = $_POST['txtNombre'];
$Obj_Productos->IdCategoria = $_POST['cbxCategoria'];
$Obj_Productos->Descripcion = $_POST['txtDescripcion'];
$Obj_Productos->Imagen = $_POST['Imagen'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Productos->Agregar() ) {
  //Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
  echo "<script>location.replace('index.php?mod=prod&form=li&m=success');</script>";
}
else {
  //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
  echo "<script>location.replace('index.php?mod=prod&form=li&m=error');</script>";
}
?>

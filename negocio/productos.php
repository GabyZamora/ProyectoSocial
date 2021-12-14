<?php
  class productos extends Datos {
    //Atributos, corresponden a cada uno de los campos de la tabla de productos
    public $Nombre;
    public $Categoria;
    public $Descripcion;
    public $Precio;
    public $Imagen;

    public function CantTotalRegistros( $paBuscar ) {
      $Cadena = "SELECT COUNT(IdProducto) FROM productos WHERE
      (IdProducto LIKE '%".$paBuscar."%' OR Nombre LIKE '%".$paBuscar."%')
      AND Eliminado = 'N'";
      return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoCombos() {
      $Cadena = "SELECT * FROM productos WHERE
      Eliminado = 'N'
      ORDER BY Nombre ASC";
      return $this->EjecutarQuery( $Cadena );
    }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM productos WHERE IdProducto = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO productos (
      Nombre,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }
    public function Actualizar( $paId ) {
      $Cadena = "UPDATE productos SET
      Nombre = '".addslashes($this->Nombre)."'
      WHERE IdProducto = '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
    public function Eliminar( $paId ) {
      $Cadena = "UPDATE productos SET Eliminado = 'S' WHERE IdProducto=
      '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
  }
?>

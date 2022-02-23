<?php
  class Servicios extends Datos {
    //Atributos, corresponden a cada uno de los campos de la tabla de servicios
    public $Nombre;
    public $Descripcion;
    public $Servicio_Imagen;

    //Métodos
    public function ListarTodos( $paBuscar ) {
      $Cadena = "SELECT * FROM servicios WHERE
      (Nombre LIKE '%".$paBuscar."%') AND Eliminado = 'N'";
      return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
    }
    public function CantTotalRegistros( $paBuscar ) {
      $Cadena = "SELECT COUNT(IdServicio) FROM servicios WHERE
      (Nombre LIKE '%".$paBuscar."%')
      AND Eliminado = 'N'";
      return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoCombos() {
      $Cadena = "SELECT * FROM servicios WHERE
      Eliminado = 'N'
      ORDER BY Nombre ASC";
      return $this->EjecutarQuery( $Cadena );
    }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM servicios WHERE IdServicio = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO servicios (
      Nombre,
      Descripcion,
      Servicio_Imagen,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }
    public function Actualizar( $paId ) {
      $Cadena = "UPDATE servicios SET
      Nombre = '".addslashes($this->Nombre)."'
      WHERE IdServicio = '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
    public function Eliminar( $paId ) {
      $Cadena = "UPDATE servicios SET Eliminado = 'S' WHERE IdServicio=
      '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
  }
?>

<?php
  class Categoria extends Datos {
    //Atributos, corresponden a cada uno de los campos de la tabla de categorias
    public $Nombre;

    //Métodos
    public function ListarTodos( $paBuscar ) {
      $Cadena = "SELECT * FROM categorias WHERE
      (Nombre LIKE '%".$paBuscar."%') AND Eliminado = 'N'";
      return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
    }
    public function CantTotalRegistros( $paBuscar ) {
      $Cadena = "SELECT COUNT(IdCategoria) FROM categorias WHERE
      (Nombre LIKE '%".$paBuscar."%')
      AND Eliminado = 'N'";
      return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoCombos() {
      $Cadena = "SELECT * FROM categorias WHERE
      Eliminado = 'N'
      ORDER BY Nombre ASC";
      return $this->EjecutarQuery( $Cadena );
    }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM categorias WHERE IdCategoria = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO categorias (
      Nombre,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }
    public function Actualizar( $paId ) {
      $Cadena = "UPDATE categorias SET
      Nombre = '".addslashes($this->Nombre)."'
      WHERE IdCategoria = '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
    public function Eliminar( $paId ) {
      $Cadena = "UPDATE categorias SET Eliminado = 'S' WHERE IdCategoria=
      '".$paId."' ";
      return $this->EjecutarQuery( $Cadena );
    }
  }
?>

<?php
  class Producto extends Datos {
    //Atributos, corresponden a cada uno de los campos de la tabla de productos
    public $Nombre;
    public $Categoria;
    public $Descripcion;
    public $Imagen;

    public function ListarTodos( $paBuscar ) {
      $Cadena = "SELECT
      productos.IdProducto,
      productos.Nombre AS NombreProducto,
      productos.IdCategoria,
      categorias.Nombre AS NombreCategoria,
      productos.descripcion AS Descripcion, 
      productos.Producto_imagen
      FROM 
      productos 
      INNER JOIN categorias ON productos.IdCategoria = categorias.IdCategoria
      WHERE (productos.IdProducto LIKE '%".$paBuscar."%')
      AND productos.eliminado='N' ";
      return $Cadena; 
      }

    public function CantTotalRegistros( $paBuscar ) {
      $Cadena = "SELECT COUNT(IdProducto) FROM productos WHERE
      (IdProducto LIKE '%".$paBuscar."%' OR Nombre LIKE '%".$paBuscar."%')
      AND Eliminado = 'N'";
      return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function BuscarCate( $paCategoria ){
      $Cadena = "SELECT
      productos.IdProducto,
      productos.Nombre AS NombreProducto,
      productos.IdCategoria,
      categorias.Nombre AS NombreCategoria,
      productos.Producto_imagen
      FROM 
      productos 
      INNER JOIN categorias ON productos.IdCategoria = categorias.IdCategoria
      WHERE productos.IdCategoria = '".$paCategoria."' ";
      return $this->EjecutarQuery( $Cadena );
    }
    public function ListarTodoCombos() {
      $Cadena = "SELECT * FROM productos WHERE
      Eliminado = 'N'
      ORDER BY Nombre ASC";
      return $this->EjecutarQuery( $Cadena );
    }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    productos.IdProducto,
    productos.Nombre AS NombreProducto,
    productos.IdCategoria,
    categorias.Nombre AS NombreCategoria,
    productos.descripcion AS Descripcion, 
    productos.Producto_imagen
    FROM 
    productos 
    INNER JOIN categorias ON productos.IdCategoria = categorias.IdCategoria
    WHERE IdProducto = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO productos (
      Nombre,
      IdCategoria,
      Descripcion,
      Producto_imagen,
      Eliminado )
      VALUES (
        '".addslashes($this->Nombre)."',
        '".addslashes($this->Categoria)."',
        '".addslashes($this->Descripcion)."',
        '".addslashes(file_get_contents($_FILES['Imagen']['tmp_name']))."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
      }

      public function ListarCat(){
        $Cadena = "SELECT * FROM productos WHERE IdCategoria = 'Medicamento'";
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

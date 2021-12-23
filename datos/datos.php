<?php
class Datos {
  private $Server;
  private $User;
  private $Password;
  private $DataBase;
  private $Conexion;
  private $ResultadoQuery;

  public function __construct() {
    //Local
    $this->Server = "localhost"; //Puede ser también la direccion 'IP' de localhost
    $this->User = "root";
    $this->Password = "root"; //Acá irá el password de su servidor MySQL
    $this->DataBase = "naturista_aura";
  }
  protected function Conectar() {
    @$this->Conexion = mysqli_connect($this->Server, $this->User, $this->Password, $this->DataBase) or die("<br><br>No se puede establecer conexión");
    return $this->Conexion;
  }
  protected function CerrarConexion() {
    return mysqli_close( $this->Conexion );
  }
  public function EjecutarQuery( $paCadena ) {
    $this->ResultadoQuery = mysqli_query( $this->Conectar(), $paCadena ) or
    die( "Error en consulta<br>Mysql dice: ".mysqli_error( $this->Conexion ) );
    $this->CerrarConexion();
    return $this->ResultadoQuery;
  }
}
?>
<?php
function crearConexionBd(){
  $host = "localhost";
  $base_datos="next_u";
  $user="root";
  $password="";
  $conexion=mysql_connect($host,$user,$password);
  if($conexion){
    mysql_set_charset('utf8',$conexion);
    $seleccion_bd = mysql_select_db($base_datos,$conexion);
    if($seleccion_bd){
      return $conexion;
    }else{
      return false;
    }
  }else{
    return false;
  }
}
?>
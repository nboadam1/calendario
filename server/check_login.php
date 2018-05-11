<?php
session_start();
require_once('connect_bd.php');
$conexion_bd = crearConexionBd();
if($conexion_bd){
	$usuario=$_POST["username"];
	$contrasena=$_POST["password"];
	if(isset($usuario) && !empty($usuario) && isset($contrasena) && !empty($contrasena)){
		$usuario=mysql_real_escape_string($usuario);
		$usuario=str_replace(" ","",$usuario);
		$contrasena=mysql_real_escape_string($contrasena);
		$SqlQuery="SELECT * FROM `usuarios` WHERE correo='".$usuario."' ";
		$SqlQuery.="AND contrasena=SHA1('".$contrasena."') AND estado=1";
		$CscQuery=mysql_query($SqlQuery,$conexion_bd);
		if($CscQuery){
			if(mysql_num_rows($CscQuery)!=0){
				$row=mysql_fetch_assoc($CscQuery);
				$_SESSION["cod_usuario"]=$row["id"];
				$_SESSION["correo_usuario"]=$row["correo"];
				$mensaje="OK";
			}else{
				$mensaje="Usuario no encontrado. Verifique que su usuario o contraseña sean correctos.";
			}
			
		}else{
			$mensaje="Consulta erronea - validar credenciales de acceso.";
		}

	}else{
		$mensaje="Parametros de acceso incompletos. Verifique";
	}
}else{
	$mensaje="Error conexion bd.";
}
echo json_encode(array('msg' => $mensaje));
?>

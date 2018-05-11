<?php
session_start();
require_once('connect_bd.php');
$conexion_bd = crearConexionBd();
if($conexion_bd){
	if(isset($_SESSION["cod_usuario"]) && !empty($_SESSION["cod_usuario"])){
		$SqlQuery="UPDATE `eventos` SET estado=2,fecha_actualizacion='".date("Y-m-d H:i:s")."' WHERE ";
		$SqlQuery.="id='".$_POST["id"]."' AND usuario_creador='".$_SESSION["cod_usuario"]."'";
		$CscQuery=mysql_query($SqlQuery,$conexion_bd);
		if($CscQuery){
			if(mysql_affected_rows($conexion_bd)!=0){
				$mensaje="OK";
			}else{
				$mensaje="No se logro eliminar el registro del evento.";
			}
			
		}else{
			$mensaje="Consulta erronea - eliminar evento.";
		}

	}else{
		$mensaje="Parametro sesión no identificado.";
	}
}else{
	$mensaje="Error conexion bd.";
}
echo json_encode(array('msg' => $mensaje));
?>
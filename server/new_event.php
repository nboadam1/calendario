<?php
session_start();
require_once('connect_bd.php');
$conexion_bd = crearConexionBd();
if($conexion_bd){
	if(isset($_SESSION["cod_usuario"]) && !empty($_SESSION["cod_usuario"])){
		$_POST["titulo"]=mysql_real_escape_string($_POST["titulo"]);
		$_POST["start_date"]=mysql_real_escape_string($_POST["start_date"]);
		$_POST["end_hour"]=mysql_real_escape_string($_POST["end_hour"]);
		$_POST["allDay"]=mysql_real_escape_string($_POST["allDay"]);
		$_POST["end_date"]=mysql_real_escape_string($_POST["end_date"]);
		$_POST["start_hour"]=mysql_real_escape_string($_POST["start_hour"]);
		$SqlQuery="INSERT INTO `eventos` (titulo,fecha_inicio,hora_inicio,fecha_finalizacion,hora_finalizacion,dia_completo,usuario_creador) ";
		$SqlQuery.="VALUES ('".$_POST["titulo"]."','".$_POST["start_date"]."','".$_POST["start_hour"]."','".$_POST["end_date"]."',";
		$SqlQuery.="'".$_POST["end_hour"]."','".$_POST["allDay"]."','".$_SESSION["cod_usuario"]."'); ";
		$CscQuery=mysql_query($SqlQuery,$conexion_bd);
		if($CscQuery){
			if(mysql_affected_rows($conexion_bd)!=0){
				$mensaje="OK";
			}else{
				$mensaje="No se logro guardar el registro en la base de datos.";
			}
			
		}else{
			$mensaje="Consulta erronea - guardar registro evento.";
		}


	}else{
		$mensaje="Parametro sesión no identificado.";
	}
}else{
	$mensaje="Error conexion bd.";
}
echo json_encode(array('msg' => $mensaje));


?>

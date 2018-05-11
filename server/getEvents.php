<?php
session_start();
require_once('connect_bd.php');
$conexion_bd = crearConexionBd();
$arrCalendario=[];
if($conexion_bd){
	if(isset($_SESSION["cod_usuario"]) && !empty($_SESSION["cod_usuario"])){
		$SqlQuery="SELECT * FROM `eventos` WHERE usuario_creador='".$_SESSION["cod_usuario"]."' AND estado=1;";
		$CscQuery=mysql_query($SqlQuery,$conexion_bd);
		if($CscQuery){
				while ($row=mysql_fetch_assoc($CscQuery)) {
					$arrEvento=[];
					$arrEvento["id"]=$row["id"];
					$arrEvento["name"]=$row["titulo"];
					$arrEvento["title"]=$row["titulo"];
					$arrEvento["allDay"]=$row["dia_completo"];
					if($arrEvento["allDay"]=="false"){
						$arrEvento["end"]=$row["fecha_finalizacion"]."T".$row["hora_finalizacion"];
						$arrEvento["start"]=$row["fecha_inicio"]."T".$row["hora_inicio"];
						$arrEvento["allDay"]=false;
					}else{
						$arrEvento["start"]=$row["fecha_inicio"];
						$arrEvento["allDay"]=true;
					}
					
					array_push($arrCalendario, $arrEvento);
				}
				$mensaje="OK";
		}else{
			$mensaje="Consulta erronea - validar credenciales de acceso.";
		}
	}else{
		$mensaje="Parametro sesión no identificado.";
	}
}else{
	$mensaje="Error conexion bd.";
}
echo json_encode(array('msg' => $mensaje,'eventos' => $arrCalendario));
?>

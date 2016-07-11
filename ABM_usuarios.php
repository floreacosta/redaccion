<?php

include_once('clases/BaseDatos.php');
include_once('clases/Administrador.php');
$bd = new BaseDatos();
////////////////////////USUARIOS//////
///////////////////////ELIMINACION////
	if(isset($_GET['id_administrativo']) && isset($_GET['funcion']))
		{	
			if($_GET['funcion'] == 3){
			$id_administrativo = $_GET['id_administrativo'];

			$strSql = 
					"DELETE FROM usuarioadministrativo
					WHERE idUsuarioAdmin = $id_administrativo";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			$admin=new Administrador();
			$admin->listarUsuariosAdministrativos();
			}
		}
		
	if(isset($_GET['id_lector']) && isset($_GET['funcion']))
		{	
			if($_GET['funcion'] == 3){
			$id_lector = $_GET['id_lector'];

			$strSql = 
					"DELETE FROM usuariolector
					WHERE idUsuariolector = $id_lector";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			$admin=new Administrador();
			$admin->listarUsuariosLectores();
			}
		}
		
////////////////////////////////////////			
////////////////////CAMBIAR ESTADO//////
	if(isset($_GET['id_administrativo']) && isset($_GET['id_estado']))
		{	
			$id_administrativo = $_GET['id_administrativo'];
			$id_estado = $_GET['id_estado'];

			if($id_estado == 2){
			$strSql = 
					"UPDATE usuarioadministrativo UA SET idEstado = '1'
					WHERE UA.idUsuarioAdmin = $id_administrativo";
			}else{
			$strSql = 
					"UPDATE usuarioadministrativo UA SET idEstado = '2'
					WHERE UA.idUsuarioAdmin = $id_administrativo";
			}
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			///////////////
			$strSqlFinal = 
						"SELECT ES.descripcion FROM estado ES
						INNER JOIN usuarioadministrativo UA ON UA.idEstado = ES.idEstado
						WHERE UA.idUsuarioAdmin = $id_administrativo";
			
			$consultaFinal = mysqli_query($bd->getEnlace(), $strSqlFinal);
			
				while($estado = mysqli_fetch_assoc($consultaFinal)){
					$estadoActual = $estado['descripcion'];
				}
				echo $estadoActual;
			}
?>
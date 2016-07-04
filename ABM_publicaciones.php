<?php

include_once('clases/BaseDatos.php');
include_once('clases/Administrador.php');
$bd = new BaseDatos();
////////////////////////PUBLICACIONES///////////////////////////
///////////////////////BAJA PUBLICACION (BAJA TODAS LAS EDICIONES QUE TIENE)/////////////////////////

if(isset($_GET['idPublicacion']) && isset($_GET['activo'])){
	
			$activo = $_GET['activo'];
			$idPublicacion = $_GET['idPublicacion'];
			
			if($activo == 1){
			$strSql = 
					"UPDATE publicacion AS PU
					INNER JOIN edicion ED
					ON ED.idPublicacion = PU.idPublicacion
					SET ED.activo = 0, PU.activo= 0
					WHERE PU.idPublicacion = $idPublicacion";		
			}else if($activo == 0){
			$strSql = 
					"UPDATE publicacion AS PU
					INNER JOIN edicion ED
					ON ED.idPublicacion = PU.idPublicacion
					SET ED.activo = 1, PU.activo= 1
					WHERE PU.idPublicacion = $idPublicacion";
			}
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			///////////////
			$strSqlFinal = 
						"SELECT activo FROM publicacion
						WHERE idPublicacion = $idPublicacion";
			
			$consultaFinal = mysqli_query($bd->getEnlace(), $strSqlFinal);
			
				while($rta = mysqli_fetch_assoc($consultaFinal)){
					$activoActual = $rta['activo'];
				}
				echo $activoActual;
			}
			
////////////////////////EDICIONES///////////////////////////
///////////////////////VER EDICIONES/////////////////////////
if(isset($_GET['idPublicacion']) && isset($_GET['funcion'])){	
	
	if($_GET['funcion'] == 0){
	
		$idPublicacion = $_GET["idPublicacion"];
		$alta = 1;
		$modificacion = 2;
		$baja = 3;

		echo 
		"<table>
			<thead>
				<tr>
					<th data-field='id'>Id Edición</th>
					<th data-field='price'>Título</th>
					<th data-field='price'>Fecha</th>
					<th data-field='price'>Precio</th>
					<th data-field='price'>Activa</th>
					<th class='btnAccion' data-field='price'></th>
				</tr>
			</thead>";

		
		$strSql = "
			SELECT *
			FROM publicacion PB
			JOIN edicion ED ON PB.idPublicacion=ED.idPublicacion 
			WHERE ED.idPublicacion=".$idPublicacion;
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$nombre = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($nombre);
		echo "Ediciones de la publicacion ".$aux['nombre'] ;

		echo "<tbody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idEdicion = $edicion['idEdicion'];
			$tituloEdicion = $edicion['tituloEdicion'];
			$fecha = $edicion['fecha'];
			$precio = $edicion['precio'];
			$activo = $edicion['activo'];
			echo 
				"
					<tr>
						<td>$idEdicion</td>
						<td>$tituloEdicion</td>
						<td>$fecha</td>
						<td>$precio</td>
			<td id='activo_$idEdicion'>$activo</td>
			<td class='btnAccion-td'><button type='submit' title='Dar de baja edicion' name='bajaEdicion'  class='bajaEdicion'  onClick='ABMDesactivarEdicion($idEdicion,$activo)'>w</button></td>
					</tr>
				";
			echo "</tbody>";
		}
	}
}
////////////////////////////////////////////////////////////////////////////////		
///////////////////////////////////BAJA EDICION/////////////////////////////

	if(isset($_GET['idEdicion']) && isset($_GET['activo'])){
	
			$activo = $_GET['activo'];
			$idEdicion = $_GET['idEdicion'];
			
			if($activo == 1){
			$strSql = 
					"UPDATE edicion SET activo = 0
					WHERE idEdicion = $idEdicion";
			}else if($activo == 0){
			$strSql = 
					"UPDATE edicion SET activo = 1
					WHERE idEdicion = $idEdicion";
			}
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			///////////////
			$strSqlFinal = 
						"SELECT activo FROM edicion
						WHERE idEdicion = $idEdicion";
			
			$consultaFinal = mysqli_query($bd->getEnlace(), $strSqlFinal);
			
				while($rta = mysqli_fetch_assoc($consultaFinal)){
					$activoActual = $rta['activo'];
				}
				echo $activoActual;
			}
?>
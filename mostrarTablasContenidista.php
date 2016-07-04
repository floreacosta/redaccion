<?php

///////////////////////////////////////////////////////////////////////////////////////////MUESTRA EDICIONES

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	$idPublicacion = $_GET["idPublicacion"];
	
		echo 
		"
		<div id='modificarEdicion' style='display:none; margin:0.5em;'></div>
		<div id='crearEdicion' style='display:none; margin:0.5em;'></div>
		<table>
			<thead>
				<tr>
					<th data-field='id'>Id Edición</th>
					<th data-field='price'>Título</th>
					<th data-field='price'>Fecha</th>
					<th data-field='price'>Precio</th>
					<th class='btnAccion' data-field='price'></th>
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

		echo "<tablebody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idEdicion = $edicion['idEdicion'];
			$tituloEdicion = $edicion['tituloEdicion'];
			$fecha = $edicion['fecha'];
			$precio = $edicion['precio'];
			
			echo 
				"
					<tr>
						<td>$idEdicion</td>
						<td>$tituloEdicion</td>
						<td>$fecha</td>
						<td>$precio</td>
						<td class='btnAccion-td'><button type='submit' id='modificar' class='modifEdicion' onclick='modificarEdicion($idEdicion)'>e</button></td>
						<td class='btnAccion-td'><button type='submit' id='verPublicacion' class='verPublicacion' onclick='mostrarSecciones($idEdicion)' >E</button></td>
					</tr>
				";
		}
				
			echo 
			"
			</tablebody>
			</table>";
			
			//mostrar tabla (que tenga boton ver, borrar y modificar)
		echo "<a href='#' class='altaContenido' onclick='crearEdicion($idPublicacion)'>+</a>";
}
	
///////////////////////////////////////////////////////////////////////////////////////////MUESTRA SECCIONES
	
if (isset($_GET["idEdicion"])){

	$idEdicion = $_GET["idEdicion"];

		echo 
		"
		<div id='modificarSeccion' style='display:none; margin:0.5em;'></div>
		<div id='crearSeccion' style='display:none; margin:0.5em;'></div>
		<table>
			<thead>
				<tr>
					<th data-field='id'>Id Sección</th>
					<th data-field='price'>Nombre</th>
					<th data-field='price'>Descripcion</th>
					<th class='btnAccion' data-field='price'></th>
					<th class='btnAccion' data-field='price'></th>
				</tr>
			</thead>";

		
		$strSql = "
			SELECT *
			FROM publicacion PB
			JOIN edicion ED ON PB.idPublicacion=ED.idPublicacion 
			JOIN seccionporedicion SE ON ED.idEdicion=SE.idEdicion
			JOIN seccion SC ON SE.idSeccion=SC.idSeccion
			WHERE ED.idEdicion=".$idEdicion;
			
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$tituloEdicion = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($tituloEdicion);
		echo "Secciones de la edición ".$aux['tituloEdicion'] ;

		echo "<tablebody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idSeccion = $edicion['idSeccion'];
			$nombre = $edicion['nombre'];
			$descripcion = $edicion['descripcion'];

			echo 
				"
					<tr>
						<td>$idSeccion</td>
						<td>$nombre</td>
						<td>$descripcion</td>
						<td class='btnAccion-td'><button type='submit' id='modificar' class='modifEdicion' onclick='modificarSeccion($idEdicion)'>e</button></td>
						<td class='btnAccion-td'><button type='submit' id='verPublicacion' class='verPublicacion' onclick='mostrarNotas($idEdicion)' >E</button></td>
					</tr>
				";
		}
				
			echo 
			"
			</tablebody>
			</table>";
			
			//mostrar tabla (que tenga boton ver, borrar y modificar)
		echo "<a href='#' class='altaContenido' onclick='crearSeccion($idEdicion)'>+</a>";
}

///////////////////////////////////////////////////////////////////////////////////////////MUESTRA NOTAS

if (isset($_GET["idSeccion"])){

	$idEdicion = $_GET["idSeccion"];
	//var geocoder = new google.maps.Geocoder();

		echo 
		"<table>
			<thead>
				<tr>
					<th data-field='id'>Id Nota</th>
					<th data-field='price'>Título</th>
					<th data-field='price'>Volanta</th>
					<th data-field='price'>Copete</th>
					<th data-field='price'>Texto</th>
					<th data-field='price'>Ubicación</th>
					<th class='btnAccion' data-field='price'></th>
					<th class='btnAccion' data-field='price'></th>
				</tr>
			</thead>";

		
		$strSql = "
			SELECT *
			FROM publicacion PB
			JOIN edicion ED ON PB.idPublicacion=ED.idPublicacion 
			LEFT JOIN seccionporedicion SE ON ED.idEdicion=SE.idEdicion
			JOIN seccion SC ON SE.idSeccion=SC.idSeccion
			JOIN nota NT ON SE.idSeccionPorEdicion=NT.idSeccionPorEdicion
			WHERE ED.idEdicion=".$idEdicion;
			
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$tituloSeccion = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($tituloSeccion);
		echo "Notas de la sección ".$aux['nombre'] ;

		echo "<tablebody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idNota = $edicion['idNota'];
			$tituloNota = $edicion['titulo'];
			$volantaNota = $edicion['volanta'];
			$copeteNota = $edicion['copete'];
			$textoNota = $edicion['texto'];
			$latitudNota = $edicion['latitud'];
			$longitudNota = $edicion['longitud'];
			
			

			echo 
				"
					<tr>
						<td>$idNota</td>
						<td>$tituloNota</td>
						<td>$volantaNota</td>
						<td>$copeteNota</td>
						<td>$textoNota</td>
						<td>$latitudNota</td>
						<td>$longitudNota</td>
						<td class='btnAccion-td'><button type='submit' id='modificar' class='modifPublicacion'>e</button></td>
						<td class='btnAccion-td'><button type='submit' id='verPublicacion' class='verPublicacion' onclick='mostrarSecciones($idEdicion)'>E</button></td>
					</tr>
				";
		}
				
			echo 
			"
			</tablebody>
			</table>";
			
			//mostrar tabla (que tenga boton ver, borrar y modificar)
		echo "<a href='#' class='altaContenido'>+</a>";
}
			 
?>
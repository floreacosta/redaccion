<?php

///////////////////////////////////////////////////////////////////////////////////////////MUESTRA EDICIONES

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	echo 
		"
		<form action='editarContenidoTablas.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='id'>Id de publicación</th>
						<th data-field='name'>Nombre de publicación</th>
						<th data-field='price'>Tipo de publicación</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
				</thead>";

		
		$strSql = "
			SELECT *
			FROM publicacion 
			WHERE idPublicacion=".$idPublicacion;
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$nombre = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($nombre);
		echo "Modificacion de la publicacion ".$aux['nombre'] ;

		echo "<tablebody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idEdicion = $edicion['idEdicion'];
			
			echo 
				"
					<tr>
						<td>$idEdicion</td>
						<td><input type='text' id='nombre'></td>
						<td><input type='date' id='fecha'></td>
						<td><input type='text' id='descripcion'></td>
						<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion' onclick='modificarSecciones($idEdicion)'>e</button></td>
						<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion' onclick='mostrarSecciones($idEdicion)' >E</button></td>
					</tr>
				";
		}
				
			echo 
			"
			</tablebody>
			</table>";
			
			//mostrar tabla (que tenga boton ver, borrar y modificar)
		echo "<a href='#' class='altaContenido'>+</a>";

?>
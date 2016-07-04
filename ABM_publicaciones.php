<?php

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	$idPublicacion = $_GET["idPublicacion"];
	
		echo 
		"<table>
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
						<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion' onclick='ABMModificarEdicion($idEdicion)'>e</button></td>
						<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion' onclick='ABMEliminarEdicion($idEdicion)' >X</button></td>
					</tr>
				";
		}
				
			echo 
			"
			</tablebody>
			</table>";
}
?>
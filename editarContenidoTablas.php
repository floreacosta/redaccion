<?php
///////////////////////////////////////////////////////////////////////////////////////////EDITAR PUBLICACION

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	$idPublicacion=$_GET["idPublicacion"];
	
	echo 
		"
		<form action='confirmarEdicionContenidista.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='id'>Id de publicación</th>
						<th data-field='name'>Nombre de publicación</th>
						<th data-field='price'>Descipción</th>
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
		echo "Modificacion de la publicación ".$aux['nombre'] ;

		echo "<tablebody>";
		
		while($publicacion=mysqli_fetch_assoc($consulta)){
			
			$idPublicacion = $publicacion['idPublicacion'];
			
			echo 
				"
					<tr>
						<td><input type='text' name='idPublicacion' value='".$publicacion['idPublicacion']."' readonly/></td>
						<td><input type='text' name='nombre' value='".$publicacion['nombre']."'/></td>
						<td><textarea type='text' name='descripcion'>".$publicacion['descripcion']." </textarea></td>
						<td class='btnAccion-td'><button type='submit' id='confirmarPublicacion' name='confirmarPublicacion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarModificarPublicacion()'>x</button></td>
					</tr>
				";
		}
				
		echo 
		"
		</tablebody>
		</table>
		</form>";

}

////////////////////////////////////////////////////////////////////////////////EDITAR EDICION

if (isset($_GET["idEdicion"])){
	
	$idEdicion=$_GET["idEdicion"];
	
	echo 
		"
		<form action='confirmarEdicionContenidista.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='id'>Id Edición</th>
						<th data-field='price'>Título</th>
						<th data-field='price'>Fecha</th>
						<th data-field='price'>Url Imagen tapa</th>
						<th data-field='price'>Precio</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
				</thead>";

		
		$strSql = "
			SELECT *
			FROM publicacion PB
			JOIN edicion ED ON PB.idPublicacion=ED.idPublicacion 
			WHERE ED.idEdicion=".$idEdicion;
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$nombre = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($nombre);
		echo "Modificacion de la edición ".$aux['tituloEdicion'] ;

		echo "<tablebody>";
		
		while($edicion=mysqli_fetch_assoc($consulta)){
			
			$idEdicion = $edicion['idEdicion'];
			
			echo 
				"
					<tr>
						<td><input type='text' name='idEdicion' value='".$edicion['idEdicion']."' readonly/></td>
						<td><input type='text' name='titulo' value='".$edicion['tituloEdicion']."'/></td>
						<td><input type='text' name='fecha' value=".$edicion['fecha']." /></td>
						<td><input type='text' name='imagen' value=".$edicion['imagenTapaEdicion']." /></td>
						<td><input type='text' name='precio' value=".$edicion['precio']." /></td>
						<td class='btnAccion-td'><button type='submit' id='confirmarEdicion' name='confirmarEdicion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarModificarEdicion()'>x</button></td>
					</tr>
				";
		}
				
		echo 
		"
		</tablebody>
		</table>
		</form>";

}


////////////////////////////////////////////////////////////////////////////////

if (isset($_GET["idSeccion"])){
	
	$idSeccion=$_GET["idSeccion"];
	
	echo 
		"
		<form action='confirmarEdicionContenidista.php' method='post'>
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
			FROM seccion
			WHERE idSeccion=".$idSeccion;
		
		$consulta = mysqli_query($bd->getEnlace(), $strSql);
		$nombre = mysqli_query($bd->getEnlace(), $strSql);
		
		$aux=mysqli_fetch_assoc($nombre);
		echo "Modificacion de la sección ".$aux['nombre'] ;

		echo "<tablebody>";
		
		while($seccion=mysqli_fetch_assoc($consulta)){
			
			
			echo 
				"
					<tr>
						<td><input type='text' name='idSeccion' value='".$seccion['idSeccion']."' readonly/></td>
						<td><input type='text' name='nombre' value='".$seccion['nombre']."'/></td>
						<td><textarea type='text' name='descripcion'>".$seccion['descripcion']."</textarea></td>
						<td class='btnAccion-td'><button type='submit' id='confirmarSeccion' name='confirmarSeccion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarModificarSeccion()'>x</button></td>
					</tr>
				";
		}
				
		echo 
		"
		</tablebody>
		</table>
		</form>";

}


?>
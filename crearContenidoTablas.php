<?php
///////////////////////////////////////////////////////////////////////////////////////////CREAR EDICIONES

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	$idPublicacion=$_GET["idPublicacion"];
	echo "Crear Nueva Edición";
	
	echo 
		"
		<form action='confirmarEdicionContenidista.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='price'>Título</th>
						<th data-field='price'>Fecha</th>
						<th data-field='price'>Url Imagen tapa</th>
						<th data-field='price'>Precio</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
					
					<tr>
						<input type='hidden' name='idPublicacion' value='$idPublicacion' />
						<td><input type='text' name='titulo' placeholder='titulo de la edición' /></td>
						<td><input type='date' name='fecha'/></td>
						<td><input type='text' name='imagen' placeholder='url imagen tapa' /></td>
						<td><input type='text' name='precio' placeholder='precio de la edicion' /></td>
						<td class='btnAccion-td'><button type='submit' id='crearEdicion' name='crearEdicion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearEdicion()'>x</button></td>
					</tr>
				</thead>
			</table>
		</form>
		";

}

//////////////////////////////////////////////////////////////////////////////// CREA SECCIONES

if (isset($_GET["idEdicion"])){
	
	$idEdicion=$_GET["idEdicion"];
	echo "Crear Nueva Sección";
	
	echo 
		"
		<form action='confirmarEdicionContenidista.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='price'>Nombre</th>
						<th data-field='price'>Descripcion</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
					
					<tr>
						<input type='hidden' name='idEdicion' value='$idEdicion'/>
						<td><input type='text' name='nombre' placeholder='nombre de la sección' /></td>
						<td><textarea type='text' name='descripcion' placeholder='descripción de la sección' ></textarea></td>
						<td class='btnAccion-td'><button type='submit' id='crearSeccion' name='crearSeccion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearSeccion()'>x</button></td>
					</tr>
				</thead>
			</table>
		</form>
		";

}



?>
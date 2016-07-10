<?php
///////////////////////////////////////////////////////////////////////////////////////////CREAR EDICIONES

include_once('clases/BaseDatos.php');
$bd = new BaseDatos();

if (isset($_GET["idPublicacion"])){
	
	$idPublicacion=$_GET["idPublicacion"];
	echo "Crear Nueva Edición";
	
	echo 
		"
		<a id='crearEdicionAncla' name='crearNotaAncla'></a>
		<form enctype='multipart/form-data' action='confirmarEdicionContenidista.php' method='post'>
			<table>
				<thead>
					<tr>
						<th data-field='price'>Título</th>
						<th data-field='price'>Fecha</th>
						<th data-field='price'>Imagen tapa</th>
						<th data-field='price'>Precio</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
					
					<tr>
						<input type='hidden' name='idPublicacion' value='$idPublicacion' />
						<td><input title='Solo se admiten letras y números' type='text' name='titulo' placeholder='titulo de la edición' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/></td>
						<td><input type='date' name='fecha' required/></td>
						<td><input type='file' name='imagen'/></td>
						<td><input type='number' name='precio' placeholder='precio de la edicion' required/></td>
						<td class='btnAccion-td'><button type='submit' id='crearEdicion' name='crearEdicion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearEdicion()'>x</button></td>
					</tr>
				</thead>
			</table>
		</form>
		";

}

//////////////////////////////////////////////////////////////////////////////// CREA SECCIONES

if (isset($_GET["idEdicion"]) && !isset($_GET["idSeccion"])){
	
	$idEdicion=$_GET["idEdicion"];
	echo "Crear Nueva Sección";
	
	echo 
		"
		<a id='crearSeccionAncla' name='crearNotaAncla'></a>
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
						<td><input title='Solo se admiten letras y números' type='text' name='nombre' placeholder='nombre de la sección' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
						<td><textarea title='Solo se admiten letras y números' type='text' name='descripcion' placeholder='descripción de la sección' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required ></textarea></td>
						<td class='btnAccion-td'><button type='submit' id='crearSeccion' name='crearSeccion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearSeccion()'>x</button></td>
					</tr>
				</thead>
			</table>
		</form>
		";

}

?>
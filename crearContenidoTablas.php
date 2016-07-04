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
						<th data-field='price'>Imagen tapa</th>
						<th data-field='price'>Precio</th>
						<th class='btnAccion' data-field='price'></th>
						<th class='btnAccion' data-field='price'></th>
					</tr>
					
					<tr>
						<input type='hidden' name='idPublicacion' value='$idPublicacion' />
						<td><input title='Solo se admiten letras y números' type='text' name='titulo' placeholder='titulo de la edición' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/></td>
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
						<td><input title='Solo se admiten letras y números' type='text' name='nombre' placeholder='nombre de la sección' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
						<td><textarea title='Solo se admiten letras y números' type='text' name='descripcion' placeholder='descripción de la sección' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required ></textarea></td>
						<td class='btnAccion-td'><button type='submit' id='crearSeccion' name='crearSeccion'>%</button></td>
						<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearSeccion()'>x</button></td>
					</tr>
				</thead>
			</table>
		</form>
		";

}

///////////////////////////////////////////////////////////////////////////////////////////CREA NOTAS

if (isset($_GET["idEdicion"]) && isset($_GET["idSeccion"])){

	$idSeccion = $_GET["idSeccion"];
	$idEdicion = $_GET["idEdicion"];
	
		echo 
		"
			Crear Nota
			<form action='confirmarEdicionContenidista.php' method='post'>
			    <table>
					<input type='hidden' name='idSeccion' value='".$idSeccion."'>
					<input type='hidden' name='idEdicion' value='".$idEdicion."'>
					<tr>
						<td>Volanta:<input title='Solo se admiten letras y números' type='text' name='volanta' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required /></td>
					</tr>
					<tr>
						<td>Título:<input title='Solo se admiten letras y números' type='text' name='titulo' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
					</tr>
					<tr>
						<td>Copete:<input title='Solo se admiten letras y números' type='text' name='copete' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required /></td>
					</tr>
					<tr>
						<td>Imagen de la nota: <input type='file' name='imagen' /></td>
					</tr>
					<tr>
						<td>Descipción de la imagen de la nota: <input title='Solo se admiten letras y números' type='text' name='detalleImagen' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
					</tr>
					<tr>
						<td>Autor de la nota: <input title='Solo se admiten letras y números' type='text' name='autor' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
					</tr>
					<tr>
						<td>contenido de la nota: <textarea title='Solo se admiten letras y números' type='text' name='texto' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,1000}' required></textarea></td>
					</tr>
					<tr>
						<td>Pie de nota: <input title='Solo se admiten letras y números' type='text' name='pie' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required /></td>
					</tr>
					<tr>
						<td>Url del video: <input type='text' name='video' placeholder='Ingrese url del video'/></td>
					</tr>
					<tr>
						<td>Latitud Nota: <input type='text' name='latitud'/></td>
					</tr>
					<tr>
						<td>Longitud Nota: <input type='text' name='longitud'/></td>
					</tr>
					<tr></tr>
					
					<tr>
						<td class='btnAccion-td'>
							<button type='submit' id='confirmarNota' name='crearNota'>%</button>
							<button type='button' id='cancelar' onClick='ocultarMostrarNota()'>x</button>
						</td>
					
					</tr>
				</table>
		";
}



?>
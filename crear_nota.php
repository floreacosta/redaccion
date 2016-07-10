<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		include_once('clases/Usuarios.php');
	?>
	
	<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyDCgRMJBiPR1sOrUZzJFXo2WLl8iXx3-E8&sensor=true'></script>
	<script type='text/javascript' src='js/google-map.js'></script>
	
	<body>
	
		<?php 
		
			include_once('include/header_body.php'); 
			if (ISSET($_POST['idSeccion']) && ISSET($_POST['idEdicion'])){
				$idSeccion = $_POST["idSeccion"];
				$idEdicion = $_POST["idEdicion"];
			}
		?>
		
		<section id='crearNota' class='perfil content'>
		
		
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href='perfil_contenidista.php'>perfil de Usuario</a> <span class='separacion'>></span> <a class='here' href='crearNota.php'>Crear Nota</a> </p> 
			</div>
			
			<div id='crearNota' class='formularioUsuario'>
				
				<h2>Crear Nota</h2>
				
				<form enctype='multipart/form-data' action='confirmarEdicionContenidista.php' method='post'>

					<input type='hidden' name='idSeccion' value="<?php echo $idSeccion; ?>"/>
					<input type='hidden' name='idEdicion' value="<?php echo $idEdicion; ?>"/>
					<label>Volanta</label>
					<input title='Solo se admiten letras y números' type='text' name='volanta' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required />
					<label>T&iacute;tulo</label>
					<input title='Solo se admiten letras y números' type='text' name='titulo' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Copete</label>
					<input title='Solo se admiten letras y números' type='text' name='copete' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required />
					<label>Imagen de la nota: </label>
					<input type='file' name='imagen' />
					<label>Descipci&oacute;n de la imagen</label>
					<input title='Solo se admiten letras y números' type='text' name='detalleImagen' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Autor de la nota: </label>
					<input title='Solo se admiten letras y números' type='text' name='autor' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Contenido de la nota: </label>
					<textarea id='texto' type='text' name='texto' required></textarea>
					<script>
						CKEDITOR.replace( 'texto' );
					</script>
					<label>Pie de nota: </label>
					<input title='Solo se admiten letras y números' type='text' name='pie' pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Url del video: </label>
					<input type='text' name='video' placeholder='Ingrese url del video'/>
					<label>Ubicaci&oacute;n de la nota: </label>
					<input type='text' id='direccion' name='direccion' placeholder='Ramos Mej&iacute;a' required/>
					<input type='button' id='pasar' value='Pasar valor en mapa' style='width:20%; margin-top:2em; margin-bottom:2em; color: white; background:#e08200;' required></input>
					<div id='map_canvas' style='width:450px;height:300px;'></div>
					<label>Latitud Nota: </label>
					<input id='lat' type='text' name='latitud' value='' readonly required/>
					<label>Longitud nota: </label>
					<input id='long' type='text' name='longitud' value='' readonly required/>

					<input type='submit' id='confirmarNota' value='Enviar' name='crearNota' style='width:20%;'></button>
				
				</form>
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>
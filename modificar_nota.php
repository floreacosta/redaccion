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
			$bd=new BaseDatos();
			$idNota = $_POST["idNota"];
			

			$sqlNota = "
				SELECT *
				FROM nota 
				WHERE idNota=".$idNota;
			
			$sqlImagen = "
				SELECT *
				FROM imagennota  
				WHERE idNota=".$idNota;
				
			$sqlVideo = "
				SELECT *
				FROM videonota
				WHERE idNota=".$idNota;
			
		
			$consultaNota = mysqli_query($bd->getEnlace(), $sqlNota);
			$consultaImagen = mysqli_query($bd->getEnlace(), $sqlImagen);
			$consultaVideo = mysqli_query($bd->getEnlace(), $sqlVideo);
			
			$nota=mysqli_fetch_assoc($consultaNota);
			$imagen=mysqli_fetch_assoc($consultaImagen);
			$video=mysqli_fetch_assoc($consultaVideo);
				
			$tituloNota = $nota['titulo'];
			$volantaNota = $nota['volanta'];
			$copeteNota = $nota['copete'];
			$textoNota = $nota['texto'];
			$autorNota = $nota['autor'];
			$pieNota = $nota['pieNota'];
			$latitudNota = $nota['latitud'];
			$longitudNota = $nota['longitud'];
			$imagenNota = $imagen['descripcion'];
			$detalleImgNota = $imagen['detalleImagen'];
			$urlVideoNota =$video['descripcion'];
			
		?>
		
		<section class='perfil content'>
		
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href='perfil_contenidista.php'>perfil de Usuario</a> <span class='separacion'>></span> <a class='here' href='modificarNota.php'>Editar Nota</a> </p> 
			</div>
			
			<div class='perfil'><a name="salida_graficos"></a>
				<?php 
					$usuario = new Usuarios();
					$usuario->encabezadoPerfil();
				?>
			</div>
			
			<div id='crearNota' class='formularioUsuario'>
				
				<h2>Crear Nota</h2>
				
				<form enctype='multipart/form-data' action='confirmarEdicionContenidista.php' method='post'>

					<input type='hidden' name='idNota' value="<?php echo $idNota; ?>" />
					<label>Volanta</label>
					<input title='Solo se admiten letras y números' type='text' name='volanta' value="<?php echo $volantaNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s.]{2,140}' required />
					<label>T&iacute;tulo</label>
					<input title='Solo se admiten letras y números' type='text' name='titulo' value="<?php echo $tituloNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s.]{2,60}' required />
					<label>Copete</label>
					<input title='Solo se admiten letras y números' type='text' name='copete' value="<?php echo $copeteNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s.]{2,300}' required />
					<label>Subir otra imágen para la nota: </label>
					<input type='file' name='imagen' />
					<label>Descipci&oacute;n de la imagen</label>
					<input title='Solo se admiten letras y números' type='text' name='detalleImagen' value="<?php echo $detalleImgNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Autor de la nota: </label>
					<input title='Solo se admiten letras y números' type='text' name='autor' value="<?php echo $autorNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Contenido de la nota: </label>
					<textarea id='texto' type='text' name='texto' required><?php echo $textoNota; ?></textarea>
					<script>
						CKEDITOR.replace( 'texto' );
					</script>
					<label>Pie de nota: </label>
					<input title='Solo se admiten letras y números' type='text' name='pie' value="<?php echo $pieNota; ?>" pattern='[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required />
					<label>Url del video: </label>
					<input type='text' name='video' value="<?php echo $urlVideoNota; ?>"/>
					<label>Nueva Ubicaci&oacute;n de la nota: </label>
					<input type='text' id='direccion' name='direccion' placeholder='Ramos Mej&iacute;a' required/>
					<input type='button' id='pasar' value='Pasar valor en mapa' style='width:20%; margin-top:2em; margin-bottom:2em; color: white; background:#e08200;'></input>
					<div id='map_canvas' style='width:450px;height:300px;'></div>
					<label>Latitud Nota: </label>
					<input id='lat' type='text' name='latitud' value="<?php echo $latitudNota; ?>" readonly required/>
					<label>Longitud nota: </label>
					<input id='long' type='text' name='longitud' value="<?php echo $longitudNota; ?>" readonly required/>

					<input type='submit' id='confirmarNota' value='Enviar' name='confirmarNota' style='width:20%;'></button>
				
				</form>
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>
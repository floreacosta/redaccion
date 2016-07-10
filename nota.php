<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		$publicacion = new Publicacion();
	?>
	
	<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyDCgRMJBiPR1sOrUZzJFXo2WLl8iXx3-E8&sensor=true'></script>
	<script type='text/javascript' src='js/google-map.js'></script>
	
	<body>
		<?php
			include_once('include/header_body.php');
			if (ISSET($_GET['nota']) && $_GET['nota'] != ""){
				$datos = $publicacion->datosDeNota($_GET['nota']);
			}else{
				header('Location: error.php');
			}
			
		?>
	
		<section class='introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href='edicion.php?edicion=<?php echo $_GET['edicion'] ?>'>Edición</a> <span class='separacion'>></span> <a class='here' href=''>Nota</a></p>
			</div>
			
			<div class='nota'>
			
				<h3><?php echo $datos['volanta']; ?></h3>
				<h1><?php echo $datos['titulo']; ?></h1>
				<h2><?php echo $datos['copete']; ?></h2>
				
				<figure class='imagenNota'>
					<img src="img/imagenNota/<?php echo $datos['imagen']; ?>"/>
					<figcaption><?php echo $datos['detalleImagen']; ?></figcaption>
				</figure>
				
				<span class='autor'>Por <i><?php echo $datos['autor']; ?></i></span>
				
				<div class='textoNota'>
					<?php echo $datos['texto']; ?>
				</div>
				
				<?php
					if (ISSET($datos['videoNota']) && $datos['videoNota'] != ""){
						echo "<figure class='videoNota'>
							<iframe width='560' height='315' src='".$datos['videoNota']."?>'  allowfullscreen></iframe>
						</figure>";
					}
				?>
				<figcaption><?php echo $datos['pieNota']; ?></figcaption></br></br>
				
				<div class='ubicacionNota'>
					Ubicación de la nota: 
					<div id='map_canvas' style='width:450px;height:300px;'></div>
					<form>
						<input id='lat' type='hidden' name='latitud' value="<?php echo $datos['latitud']; ?>" />
						<input id='long' type='hidden' name='longitud' value="<?php echo $datos['longitud']; ?>"/>
					</form>
				</div>

			</div>

		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

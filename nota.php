<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		$publicacion = new Publicacion();
	?>
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
				
				<figure class='videoNota'>
					<video></video>
					<figcaption><?php echo $datos['pieNota']; ?></figcaption>
				</figure>
				
				<div class='ubicacionNota'>
					<h3>Ubicación</h3>
					<span>Latitud: <?php echo $datos['latitud'] ?> Longitud: <?php echo $datos['longitud'] ?></span>
					<div class='googleMap'></div>
				</div>
			</div>

		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

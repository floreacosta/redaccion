<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php
			include_once('include/header_body.php');
		?>
	
		<section class='introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href=''>Edición</a></p>
			</div>
			
			<div class='tituloEdicion'>
				<figure class='columna'>
					<div class='tapaEdicion'>
						<img src='img/thumbs-publicacion/9010_ilustradoresReconocidos.png'/>
					</div>
					<figcaption class='columna'>
						<div>
							<h1>90 + 10</h1>
							<h5>Publicada: ".$edicion['fecha']."</h5>
							<h2>Nombre de la edición Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h2>
						</div>
						<div class='secciones'>
							<span>Humor</span>
							<span>Ciencia</span>
							<span>Economía</span>
							<span>Política</span>
						</div>
					</figcaption>
				</figure>
			</div>
			<div class='seccionesNotas'>
				<h2>Humor</h2>
				<figure class='col'>
					<a href='nota.php'>
						<h3>Volanta</h3>
						<h1>Título de la nota: Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h1>
					</a>
				</figure>
				<figure class='col'>
					<a href='nota.php'>
						<h3>Volanta</h3>
						<h1>Título de la nota: Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h1>
					</a>
				</figure>
				<figure class='col'>
					<a href='nota.php'>
						<h3>Volanta</h3>
						<h1>Título de la nota: Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h1>
					</a>
				</figure>
				<figure class='col'>
					<a href='nota.php'>
						<h3>Volanta</h3>
						<h1>Título de la nota: Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h1>
					</a>
				</figure>
				<figure class='col'>
					<a href='nota.php'>
						<h3>Volanta</h3>
						<h1>Título de la nota: Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</h1>
					</a>
				</figure>
				</a>
			</div>
		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

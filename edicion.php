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
		?>
	
		<section class='introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href='perfil_lector.php'>Perfil de usuario</a> <span class='separacion'>></span> <a class='here' href=''>Edición</a></p>
			</div>
			
			<div class='tituloEdicion'>
				<figure class='columna'>
					
					<?php
						if (ISSET($_GET['edicion']) && $_GET['edicion'] != ""){
							$publicacion->verEdicion($_GET['edicion']);
						}
					?>
					
				</figure>
			</div>
			<div class='seccionesNotas' id='seccion'>
				
			</div>
		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

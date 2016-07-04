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
	
		<section class='verSuscripcion introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a><span class='separacion'>></span><a href='perfil_lector.php'>Perfil</a><span class='separacion'>></span><a class='here' href='ver_suscripcion.php'>Ver Suscripción</a></p>
			</div>
			<?php
				if (ISSET($_GET['suscripcion']) && $_GET['suscripcion']){
					$publicacion = new Publicacion();
					$publicacion->buscarSuscripcion($_GET['suscripcion']);
				}
			?>			
		</section>	
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

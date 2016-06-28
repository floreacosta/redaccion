<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php include_once('include/header_body.php'); ?>
		
		<section class='perfil content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_lector.php'>Perfil de usuario</a></p>
			</div>
			
			<div class='perfil'>
				<img class='fotoPerfil' src='#'/>
				<div class='datosPerfil'>
					<h2>Bienvenido/a</h2>
					<h1>Carlos Alberto  <a class='iconModificar' title='Modificar datos de perfil' href='perfil_modificacion.php'>r</a></h1>
				</div>
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>

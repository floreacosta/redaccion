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
	
		<section class='error introduccion content'>
			<?php
			if(ISSET($_GET['mensaje']) && $_GET['mensaje'] != ""){
				switch ($_GET['mensaje']){
					case 1:
						echo"
							<div class='errorLogueo'>
								<h2>Error</h2>
								<h3>Error al intentar loguearse. El usuario ingresado y/o la clave estan mal</h3>
								<a href='index.php'>Volver al inicio</a>
							</div>
						";
						break;
					case 2:
						echo"
							<div class='errorAcceso'>
								<h2>Error</h2>
								<h3>No tiene permisos para acceder a esta sección.</h3>
								<a href='index.php'>Volver al inicio</a>
							</div>
						";
						break;
					case 3:
						echo"
							<div class='errorPosteo'>
								<h2>Error</h2>
								<h3>No puede cerrar la edición. No todas las notas están terminadas.</h3>
								<a href='index.php'>Volver al inicio</a>
							</div>
						";
						break;
					case 4:
						echo"
							<div class='errorPosteo'>
								<h2>Error</h2>
								<h3>Error Inesperado al intentar cargar la pagina. Vuelva a intentarlo</h3>
								<a href='index.php'>Volver al inicio</a>
							</div>
						";
						break;
				}
						
			}	
			?>
		</section>	
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

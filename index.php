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
			<div class='fechaLogin'>
				<div class='fecha'>
					<h1><span>Hoy,</span></h1>
					<h1>23 de Mayo, 2016</h1>
				</div>
				<li class='login loginEscritorio'>
					<?php
					imprimirLogeo();
					?>
				</li>
			</div>
			
			<h4>¿Qué leer hoy? Te recomendamos:</h4>
			
			<div class='publicacionRandom'>
				<div class='contenedor'>
					<div class='random contenido'>
						<?php
							$publicacion = new Publicacion();
							$publicacion->edicionRandom();
						?>
					</div>
				</div>
				<div class='clima'></div>
			</div>
		</section>

		<section class='publicacion content'>
			<h2>Publicaciones disponibles</h2>
			<div class='contenidoPublicacion'><!--INICIO PUBLICACIONES-->
				<?php
					$publicacion->mostrarPublicaciones(0);
				?>
			</div><!--FIN PUBLICACIONES-->
			<div class='cargarMas noFlote'>
				<a href='#'>Cargar más</a>
			</div>

		</section>	
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

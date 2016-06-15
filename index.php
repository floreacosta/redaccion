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
		
		<section class='introduccion'>
		
			<div class='fechaLogin'>
				<div class='fecha'>
					<h1><span>Hoy,</span></h1>
					<h1>23 de Mayo, 2016</h1>
				</div>
				<div class='loginEscritorio'>
					<span>Login</span>
					<div>
						<button id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Soy Lector</button>
						<button id='redactor' name='redactor' value='redactor' onClick='modalOpenRedactor();'>Soy Redactor</button>
					</div>
				</div>
			</div>
			
			<h4>¿Qué leer hoy? Te recomendamos:</h4>
			
			<div class='publicacionRandom'>
				<div class='random'>
					<figure>
						<div class='imgPublicacion'>
							<img src='img/thumbs-publicacion/revista1.png'/>
						</div>
					</figure>
					<figcaption>
						<div>
							<h1>90 + 10</h1>
							<h5>Publicada: 10/05/2016</h5>
							<p>Tres ilustradores: Irma Gruenhalz / Car Pintos / Chris Buzeli.</p>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$45.00</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</div>
				<div class='clima'></div>
			</div>
		</section>

		<section class='publicacion'>
			<h2>Publicaciones disponibles</h2>
			<div class='contenidoPublicacion'><!--INICIO PUBLICACIONES-->
				<?php
					$publicacion = new Publicacion();
					$publicacion->mostrarPublicaciones(0);
				?>
			</div><!--FIN PUBLICACIONES-->
			<div class='cargarMas'>
				<a href='#'>Cargar más</a>
			</div>

		</section>
		
		<?php 
		include_once('include/footer.php');
		?>
		
	</body>
</html>

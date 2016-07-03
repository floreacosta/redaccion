<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		$publicacion = new Publicacion();
		if (ISSET($_SESSION['usuariolector'])){
			if(ISSET($_POST['enviarCompra'])){
				$publicacion->comprarEdicion($_POST['numEdicion']);
				header('Location: perfil_lector.php');
			}else if(ISSET($_GET['enviarSuscripcion'])){
				$publicacion->comprarSuscripcion($_GET['suscripcionesDisponibles'],$_GET['periodoSuscripcion']);
				header('Location: perfil_lector.php');
			}
		}else if(!ISSET($_SESSION['usuariolector']) && ISSET($_GET['enviarSuscripcion'])){
			echo"
				<script>
					$( function(){ 
						modalOpenLector();
					});
				</script>
			";
		}
	?>
	<body>
		<?php
			include_once('include/header_body.php');
		?>
	
		<section class='introduccion content'>
			<div class='fechaLogin'>
				<div class='fecha'>
					<h1><span>Hoy,</span></h1>
					<h1><?php echo date("d F , Y"); ?></h1>
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
							$publicacion->edicionRandom();
						?>
					</div>
				</div>
				<div class='clima'></div>
			</div>
		</section>
		<section class='suscripciones publicacion content'>
			<a name="suscripciones"></a><h2>Suscripciones disponibles</h2>
			<form class='suscripcion' action='index.php' enctype='' method='GET'>
				
				<?php
					$publicacion->datosSuscripcion();
				?>

				<div class='precio'>
					<h3 id='importe'></h3>
				</div>
				<input type='submit' id='enviarSuscripcion' name='enviarSuscripcion' value='Suscribirme'></input><!--BOTON COMPRAR -->
			</form>
			
		</section>
		<section class='publicacion content'>
			<a name="publicaciones"></a><h2>Publicaciones disponibles</h2>
			<div class='contenidoPublicacion'><!--INICIO PUBLICACIONES-->
				<?php
					if (!ISSET($_GET['desde'])){
						$desde = 0;
					}else{
						$desde = $_GET['desde'];
					}			
					$publicacion->mostrarPublicaciones($desde);		
				?>
			</div><!--FIN PUBLICACIONES-->
		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

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
			$bd=new BaseDatos();
			$idNota = $_POST["idNota"];
			

			$sqlNota = "
				SELECT *
				FROM nota 
				WHERE idNota=".$idNota;
			
			$sqlImagen = "
				SELECT *
				FROM imagennota  
				WHERE idNota=".$idNota;
				
			$sqlVideo = "
				SELECT *
				FROM videonota
				WHERE idNota=".$idNota;
			
		
			$consultaNota = mysqli_query($bd->getEnlace(), $sqlNota);
			$consultaImagen = mysqli_query($bd->getEnlace(), $sqlImagen);
			$consultaVideo = mysqli_query($bd->getEnlace(), $sqlVideo);
			
			$nota=mysqli_fetch_assoc($consultaNota);
			$imagen=mysqli_fetch_assoc($consultaImagen);
			$video=mysqli_fetch_assoc($consultaVideo);
				
			$tituloNota = $nota['titulo'];
			$volantaNota = $nota['volanta'];
			$copeteNota = $nota['copete'];
			$textoNota = $nota['texto'];
			$autorNota = $nota['autor'];
			$pieNota = $nota['pieNota'];
			$latitudNota = $nota['latitud'];
			$longitudNota = $nota['longitud'];
			$imagenNota = 'img/imagenNota/'.$imagen['descripcion'];
			$detalleImgNota = $imagen['detalleImagen'];
			$urlVideoNota =$video['descripcion'];
			
		?>
	
		<section class='introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href='perfil_contenidista.php'>perfil de Usuario</a> <span class='separacion'>></span> <a class='here' href='mostrarNota.php'>Ver Nota</a> </p> 
			</div>
			
			<div class='perfil'><a name="salida_graficos"></a>
				<?php 
					$usuario = new Usuarios();
					$usuario->encabezadoPerfil();
				?>
			</div>
			
			<div class='nota'>
				
				<h3><?php echo $volantaNota; ?></h3>
				<h1><?php echo $tituloNota; ?></h1>
				<h2><?php echo $copeteNota; ?></h2>
				
				<figure class='imagenNota'>
					<img src="<?php echo $imagenNota;?>" ></img>
					<figcaption><?php echo $detalleImgNota; ?></figcaption>
				</figure>
				
				<span class='autor'>Por <i><?php echo$autorNota;?></i></span>
				
				<div class='textoNota'>
					<?php echo $textoNota; ?>
				</div>
				
				<?php
					if (ISSET($urlVideoNota) && $urlVideoNota != ""){
						echo "<figure class='videoNota'>
							<iframe width='560' height='315' src='".$urlVideoNota."' frameborder='0' allowfullscreen></iframe>
						</figure>";
					}
				?>
				<figcaption><?php echo $pieNota;?></figcaption></br></br>
				
				<div class='ubicacionNota'>
					Ubicaci&oacute;n de la nota: 
					<div id='map_canvas' style='width:450px;height:300px;'></div>
					<form>
						<input id='lat' type='hidden' name='latitud' value="<?php echo $latitudNota; ?>" />
						<input id='long' type='hidden' name='longitud' value="<?php echo $longitudNota; ?>"/>
					</form>
				</div>
				
			</div>

		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

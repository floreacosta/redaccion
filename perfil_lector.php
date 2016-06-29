<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php include_once('include/header_body.php');?>
		
		<section class='perfil content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_lector.php'>Perfil de usuario</a></p>
			</div>
			
			<div class='perfil'>
				<img class='fotoPerfil' src='#'/>
				<div class='datosPerfil'>
					<h2>Bienvenido/a Carlos Alberto!</h2>
					<h1><a class='iconModificar' title='Modificar datos de perfil' href='perfil_modificacion.php'>r</a></h1>
				</div>
			</div>
			
			<div class='comprasUsuario'>
				<h2 class='tituloCompras'>Mis compras</h2>
				<figure class='col'><!-- Item Compra 1 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<img class='tapaRevista' src='img/thumbs-publicacion/revista1.png'/>
						<div class='informacionEdicion'>
							<p class='fechaEdicion'>10/10/2015</p>
							<h3>Nombre de la edición</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de compra: 10/15/2016</p>
					<p class='costoCompra'>Precio: $45.00</p>
				</figure>
				<figure class='col'><!-- Item Compra 2 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<img class='tapaRevista' src='img/thumbs-publicacion/revista1.png'/>
						<div class='informacionEdicion'>
							<p class='fechaEdicion'>10/10/2015</p>
							<h3>Nombre de la edición</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de compra: 10/15/2016</p>
					<p class='costoCompra'>Precio: $45.00</p>
				</figure>
				<figure class='col'><!-- Item Compra 3 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<img class='tapaRevista' src='img/thumbs-publicacion/revista1.png'/>
						<div class='informacionEdicion'>
							<p class='fechaEdicion'>10/10/2015</p>
							<h3>Nombre de la edición</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de compra: 10/15/2016</p>
					<p class='costoCompra'>Precio: $45.00</p>
				</figure>
				<figure class='col'><!-- Item Compra 4 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<img class='tapaRevista' src='img/thumbs-publicacion/revista1.png'/>
						<div class='informacionEdicion'>
							<p class='fechaEdicion'>10/10/2015</p>
							<h3>Nombre de la edición</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de compra: 10/15/2016</p>
					<p class='costoCompra'>Precio: $45.00</p>
				</figure>
				<figure class='col'><!-- Item Compra 5 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<img class='tapaRevista' src='img/thumbs-publicacion/revista1.png'/>
						<div class='informacionEdicion'>
							<p class='fechaEdicion'>10/10/2015</p>
							<h3>Nombre de la edición</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de compra: 10/15/2016</p>
					<p class='costoCompra'>Precio: $45.00</p>
				</figure>
			</div>
			
			<div class='suscripcionUsuario'>
				<h2 class='tituloSuscripcion'>Mis suscripciones</h2>
				<figure class='col'><!-- Item Compra 1 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<div class='informacionEdicion'>
							<h3>Nombre de la Revista</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de inicio: 10/15/2016</p>
					<p class='fechaCompra'>Fecha de fin: 10/15/2016</p>
					<p class='costoSuscripcion'>Precio: $45.00</p>
					<a class='cancelarSuscripcion' href='#'>Cancelar suscripción</a>
				</figure>
				<figure class='col'><!-- Item Compra 2 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<div class='informacionEdicion'>
							<h3>Nombre de la Revista</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de inicio: 10/15/2016</p>
					<p class='fechaCompra'>Fecha de fin: 10/15/2016</p>
					<p class='costoSuscripcion'>Precio: $45.00</p>
					<a class='cancelarSuscripcion' href='#'>Cancelar suscripción</a>
				</figure>
				<figure class='col'><!-- Item Compra 3 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<div class='informacionEdicion'>
							<h3>Nombre de la Revista</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de inicio: 10/15/2016</p>
					<p class='fechaCompra'>Fecha de fin: 10/15/2016</p>
					<p class='costoSuscripcion'>Precio: $45.00</p>
					<a class='cancelarSuscripcion' href='#'>Cancelar suscripción</a>
				</figure>
				<figure class='col'><!-- Item Compra 4 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<div class='informacionEdicion'>
							<h3>Nombre de la Revista</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de inicio: 10/15/2016</p>
					<p class='fechaCompra'>Fecha de fin: 10/15/2016</p>
					<p class='costoSuscripcion'>Precio: $45.00</p>
					<a class='cancelarSuscripcion' href='#'>Cancelar suscripción</a>
				</figure>
				<figure class='col'><!-- Item Compra 5 -->
					<p class='numCompra'>N°: 001</p>
					<div class='informacion'>
						<div class='informacionEdicion'>
							<h3>Nombre de la Revista</h3>
						</div>
					</div>
					<p class='fechaCompra'>Fecha de inicio: 10/15/2016</p>
					<p class='fechaCompra'>Fecha de fin: 10/15/2016</p>
					<p class='costoSuscripcion'>Precio: $45.00</p>
					<a class='cancelarSuscripcion' href='#'>Cancelar suscripción</a>
				</figure>

			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>

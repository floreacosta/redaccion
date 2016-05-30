<?php
	session_start();
	include_once('clases/usuario.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Redacción</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/> 
		<meta name="expires" content="-1"/>
		<meta name="description" content="Tp final - Programación Web II" />
		<meta name="author" content="Acosta, Florencia / Orieta, Romina / Giani, Nahuel / Muñoz, Fernando." />
		<meta name="keywords" content="redaccion, revista"/>
		
		<!--<link rel="shortcut icon" href="img/style/favicon.ico">-->
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
		<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
		<script src='js/query.js'></script>
		<link rel="stylesheet" href="css/style.css">
	<head>
	<body>
		<header>
			<div class='logo'>
				<img class='imgLogo' src='img/logo.png' />
			</div>
			
			<div class='menuDesplegable'>
				<div class='iconMenu'><img class='icon' src='img/icon-menu-mbl.png'/></div>
				<div class='menu'>
					<ul>
						<li class='buscar'>
							<form action='search.php' method='POST' enctype='multipart/form-data'>
								<input type='text' id='search' name='search' placeholder='Buscar' value=''></input>
								<input type='submit' id='btnSearch' name='btnSearch' value='Enviar'></input>
							</form>
						</li>
						<li class='login'>
							<?php
							imprimirLogeo();
							?>
						</li>
					</ul>
				</div>
			</div>
		</header>
		
		<div class='login none lectorBox' id='soyLector'>
			<form action='index.php' method='POST' enctype='multipart/form-data' class='lector'>
				<a href='#' onClick='modalCloseLector();'>x</a>
				<img src='img/iconLogin-user.png'/>
				<div class='in'>
					<input type='text' id='userLector' name='userLector' placeholder='Usuario' value=''></input>
					<input type='text' id='passLector' name='passLector' placeholder='Contraseña' value=''></input>
					<input type='submit' id='ingresarLogin' name='ingresarLogin' value='LogIn'></input>
				</div>
				<ul class='aclaracion'>
					<li><a href='#'>Quiero registrarme.</a></li>
					<li><a href='#'>Olvidé mi usuario y/o contraseña.</a></li>
				</ul>
			</form>
		</div>

		<div class='login none redactorBox' id='soyRedactor' >
			<form action='index.php' method='POST' enctype='multipart/form-data'class='redactor'>
				<a href='#' onClick='modalCloseRedactor();'>x</a>
				<img src='img/iconLogin-trabajadores.png'/>
				<div class='in'>
					<input type='text' id='userRedactor' name='userRedactor' placeholder='Usuario' value=''></input>
					<input type='text' id='passRedactor' name='passRedactor' placeholder='Contraseña' value=''></input>
					<input type='submit' id='ingresarLogin' name='ingresarLogin' value='LogIn'></input>
				</div>
				<ul class='aclaracion'>
					<div><a href='#'>Contactar al administrador.</a></div>
					<div><a href='#'>Olvidé mi usuario y/o contraseña.</a></div>
				</ul>
			</form>
		</div>
		
		<section class='introduccion'></section>
		<section class='publicacion'>
			<h2>Publicaciones disponibles</h2>
			<div class='contenidoPublicacion'><!--INICIO PUBLICACIONES-->
				<figure><!--publicacion-->
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/revista1.png'/>
					</div>
					<figcaption>
						<div>
							<h4>Mayo 2016, 18</h4>
							<h3>Ilustradores reconocidos</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$XXX</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</figure>
				<figure><!--publicacion-->
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/revista2.png'/>
					</div>
					<figcaption>
						<div>
							<h4>Mayo 2016, 18</h4>
							<h3>Ilustradores reconocidos</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$XXX</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</figure>
				<figure><!--publicacion-->
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/revista3.png'/>
					</div>
					<figcaption>
						<div>
							<h4>Mayo 2016, 18</h4>
							<h3>Ilustradores reconocidos</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$XXX</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</figure>
				<figure><!--publicacion-->
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/revista4.png'/>
					</div>
					<figcaption>
						<div>
							<h4>Mayo 2016, 18</h4>
							<h3>Ilustradores reconocidos</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$XXX</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</figure>
				<figure><!--publicacion-->
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/revista1.png'/>
					</div>
					<figcaption>
						<div>
							<h4>Mayo 2016, 18</h4>
							<h3>Ilustradores reconocidos</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$XXX</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
							</div>
						</div>
					</figcaption>
				</figure>
			</div><!--FIN PUBLICACIONES-->
		</section>
		<footer>
			<div class='siteMap'>
				<h3>Mapa del sitio</h3>
				<p>
					<a href='#'>Index</a>
					<a href='#'>Primer link</a>
					<a href='#'>Segundo link</a>
					<a href='#'>Tercer link</a>
					<a href='#'>Usuarios</a>
					<a href='#'>Suscriptores</a>
				</p>
			</div>
			<div class='redesSociales'>
				<p class='fb'>/laredaccion</p>
				<p class='tw'>@laredaccion</p>
			</div>
			<div class='contacto'>
				<address>
					<a href="mailto:contacto@laredaccion.com.ar">contacto@laredaccion.com.ar</a>
					<p>+ (011) 4639 1256</p>
				</address>
				<address>
					<h3>Oficina central</h3>
					<p>Av. de mayo | CABA</p>
				</address>
			</div>
		</footer>
		
	</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php include_once('include/header_body.php'); ?>
		
		<section class='modificacionDatos content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a><span class='separacion'>></span><a class='here' href='perfil_lector.php'>Perfil de usuario</a><span class='separacion'>></span><a class='here' href='perfil_modificacion.php'>Modificacion/Alta de usuario</a></p>
			</div>
			<div class='formularioUsuario'>
				<h2>Modifique o cree un usuario</h2>
				<form action='perfil_usuario.php' method='POST' enctype=''>
					<label for='nombreUsuario'>Nombre</label>
					<input type='text' name='nombreUsuario' placeholder='Carlos' value=''/>

					<label for='nombreUsuario'>Apellido</label>
					<input type='text' name='apellidoUsuario' placeholder='Menendez' value=''/>

					<label for='dniUsuario'>Dni</label>
					<input type='text' name='dniUsuario' placeholder='9 dígitos' value=''/>

					<label for='fechaUsuario'>Fecha de nacimiento</label>
					<input type='date' name='fechaUsuario' placeholder='' value=''/>

					<label for='mailUsuario'>Correo electrónico</label>
					<input type='email' name='mailUsuario' placeholder='xxx@ejemplo.com' value=''/>

					<label for='paisUsuario'>País</label>
					<select name='paisUsuario'>
						<option value='' selected>Seleccionar país</option>
						<option value='1'>Argentina</option>
						<option value='2'>Brasil</option>
					<select/>

					<label for='provinciaUsuario'>Provincia</label>
					<select name='provinciaUsuario'>
						<option value='' selected>Seleccionar provincia</option>
						<option value='1'>Buenos Aires</option>
						<option value='2'>Entre Ríos</option>
					<select/>

					<label for='localidadUsuario'>Localidad</label>
					<select name='localidadUsuario'>
						<option value='' selected>Seleccionar localidad</option>
						<option value='1'>Hurlingham</option>
						<option value='2'>Morón</option>
					<select/>

					<label for='passUsuario'>Contraseña</label>
					<input type='password' name='passUsuario' placeholder='contraseña' value=''/>

					<label for='passRepetirUsuario'>Repetir Contraseña</label>
					<input type='password' name='passRepetirUsuario' placeholder='contraseña' value=''/>
					
					<input type='submit' name='enviarUsuario' value='Enviar'/>
				</form>
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>

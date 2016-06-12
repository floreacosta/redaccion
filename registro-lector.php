<?php
	session_start();
	include_once('clases/usuario.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
	include_once('include/head.php');
	?>
	<body>
	
		<?php
			include_once('include/header_body.php');
		?>
		<section class='introduccion'></section>
		
		<section class='registroLector' >
			<h2>Complete el siguiente formulario</h2></br>
			
			<form action='registro-lector.php' method='POST' enctype='multipart/form-data'>
			
				Nombre de usuario: </br> <input type='text' id='nombreUsuario' name='nombreUsuario' placeholder='Nombre de Usuario' size='21' required=''></input></br>
				Contraseña: </br> <input type='password' id='clave' name='clave' placeholder='Contraseña' size='21' required=''></input> </br>
				Repita su contraseña: </br> <input type='password' id='reClave' name='reClave'size='21' required=''></input>	</br>
				Nombre: </br> <input type='text' id='nombre' name='nombre' placeholder='Nombre' size='21' required=''></input> </br>
				Apellido: </br> <input type='text' id='apellido' name='apellido' placeholder='Apellido' size='21' required=''></input> </br>
				Fecha Nacimiento: </br> <input type='date' id='fechaNacimiento' name='fechaNacimiento' max='1919-12-31' required=''></input> </br>
				Email: </br> <input type='email' id='email' name='email' required=''></input> </br></br>
				
				<input type='submit' id='enviar' name='enviar'></input>
				
				<?php
					$registro= new usuario();
					$registro->altaUsuarioLector($_POST['nombreUsuario'],$_POST['clave'],$_POST['nombre'],$_POST['apellido'],$_POST['nombreUsuario'])
				
			</form>
		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>
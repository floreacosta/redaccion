<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/_1999/xhtml" xml:lang="en" lang="en">
    <?php
					
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		
		if(isset($_POST['enviar'])){

		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$fechaNacimiento = $_POST['fechaNacimiento'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$pais = $_POST['pais'];
//			$_SESSION['provincia'] = $_POST['provincia'];
//			$_SESSION['localidad'] = $_POST['localidad'];
		$calle = $_POST['calle'];
		$numero = $_POST['nro'];
		$estado = 2; //Apenas termina el registro, le ponemos el 2 para ya dejarlo "online"
			
		$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
		$strSqlValid = "
			SELECT UL.idUsuarioLector FROM usuariolector UL
			WHERE UL.usuario = $usuario;
		";
		$resultadoValid = mysqli_query($bd->getEnlace(), $strSqlValid);
			
			if($resultadoValid == FALSE){	//Si el usuario ya existe nos tira al ultimo else		
				$strSql = "
					INSERT INTO usuariolector(apellido,nombre,fechaNacimiento,calle,numero,telefono,mail,idEstado,usuario,clave)
					VALUES ('$apellido','$nombre','$fechaNacimiento','$calle',$numero,$tel,'$email',$estado,'$usuario','$clave');
				";
				$resultado = mysqli_query($bd->getEnlace(), $strSql);
				
					if($resultado!= FALSE){		
						$_SESSION['usuario'] = $usuario;
						echo"<section class='introduccion content'>
									<h1>El usuario '$usuario' se ha creado satisfactoriamente un nuevo usuario!</h1><br></br><br></br>				
									<a href='/redaccion/index.php'>Volver al inicio</a><br></br>
									<a href='/redaccion/perfil_lector.php'>Ir a mi perfil</a>
								</section>";	
						}
					else
						{
						echo "<section class='introduccion content'>
								<h1>ERROR: No pudo registrarse</h1><br></br><br></br>
								<a href='/redaccion/index.php'>Volver al inicio</a><br></br>
								<a href='/redaccion/perfil_modificacion.php'>Volver al registro</a>
							</section>";		
						}
			}else{
				echo "
					<section class='introduccion content'>
						<h1>ERROR: El usuario ya existe</h1><br></br><br></br>		
						<a href='/redaccion/index.php'>Volver al inicio</a><br></br>
						<a href='/redaccion/perfil_modificacion.php'>Volver al registro</a>
					</section>";
				}
		}else{
			echo "<h1>ERROR: El formulario no se recibió correctamente</h1>";
			header('location:/redaccion/perfil_modificacion.php');
		}
				
	?>
	<body>
		<?php
			include_once('include/header_body.php');
		?>
	

		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/_1999/xhtml" xml:lang="en" lang="en">
    <?php				
		include_once('include/head.php');
		include_once('clases/Publicacion.php');		
	?>
	<body>
		<?php
			include_once('include/header_body.php');
				
			if(isset($_POST['enviar'])){
				$idUsuario = $_POST['idUsuario'];
				$usuario = $_POST['usuario'];
				$clave =  md5(trim($_POST['clave']));
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				if(ISSET($_FILES['fotoPerfil']['tmp_name']) && $_FILES['fotoPerfil']['tmp_name'] != ''){
					move_uploaded_file($_FILES['fotoPerfil']['tmp_name'],'img/perfil/'.$usuario.".jpg");
					$fotoPerfil = $usuario.".jpg";
				}else{
					if (ISSET($_SESSION['usuariolector'])){
						$fotoPerfil = "Default.png";
					}else{
						$fotoPerfil = "DefaultAdmin.png";
					}
				}
				$documento = $_POST['dni'];
				$fechaNacimiento = $_POST['fechaNacimiento'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$idPais = $_POST['pais'];
				$idProvincia = $_POST['provinciaUsuario'];
				$idLocalidad = $_POST['localidadUsuario'];
				$calle = $_POST['calle'];
				$numero = $_POST['nro'];
				$estado = 1;
				if(ISSET($_POST['tipo_usuario'])){
					$tipo_usuario = $_POST['tipo_usuario'];
				}
				$bd = new BaseDatos();
				
				if(isset($tipo_usuario)){
						
					$strSqlValid = "
					SELECT UA.idUsuarioAdmin FROM usuarioadministrativo UA
					WHERE UA.usuario = $usuario;
					";
					$resultadoValid = mysqli_query($bd->getEnlace(), $strSqlValid);
						
					if($resultadoValid == FALSE){
					
						$strSql = "INSERT INTO usuarioadministrativo(idtipousuario,apellido,nombre,documento,fechaNacimiento,calle,numero,telefono,mail,idLocalidad,
											idProvincia,idPais,idEstado,usuario,clave,imagenPerfil)
									VALUES ($tipo_usuario,'$apellido','$nombre','$documento','$fechaNacimiento','$calle',$numero,$tel,'$email',$idLocalidad,
									$idProvincia,$idPais,$estado,'$usuario','$clave','$fotoPerfil');
									";
							
						if($resultado = mysqli_query($bd->getEnlace(), $strSql)){		
							echo"
								<section class='introduccion content'>
									<h1>El usuario administrativo '$usuario' se ha creado satisfactoriamente!</h1><br></br><br></br>				
									<a href='index.php'>Volver al inicio</a><br></br>
								</section>
							";	
						}else{
							echo "
								<section class='introduccion content'>
									<h1>ERROR: No pudo registrarse</h1><br></br><br></br>
									<a href='index.php'>Volver al inicio</a><br></br>
								</section>
								";		
						}
					}else{
						echo "	<section class='introduccion content'>
								<h1>ERROR: El usuario administrativo ya existe</h1><br></br><br></br>		
								<a href='index.php'>Volver al inicio</a><br></br>
								</section>";
					}
				} else if (!(ISSET($idUsuario) && $idUsuario != "")){
					$strSqlValid = "
						SELECT UL.idUsuarioLector FROM usuariolector UL
						WHERE UL.usuario = $usuario;
					";
					$resultadoValid = mysqli_query($bd->getEnlace(), $strSqlValid);
							
					if($resultadoValid == FALSE){	//Si el usuario ya existe nos tira al ultimo else		
						$strSql = "
							INSERT INTO usuariolector(apellido,nombre,documento,fechaNacimiento,calle,numero,telefono,mail,idLocalidad,
													  idProvincia,idPais,idEstado,usuario,clave,imagenPerfil)
							VALUES ('$apellido','$nombre','$documento','$fechaNacimiento','$calle',$numero,$tel,'$email',$idLocalidad,
									$idProvincia,$idPais,$estado,'$usuario','$clave','$fotoPerfil');
						";
						if($resultado = mysqli_query($bd->getEnlace(), $strSql)){		
							echo"
								<section class='introduccion content'>
									<h1>El usuario '$usuario' se ha creado satisfactoriamente!</h1><br></br><br></br>				
									<a href='index.php'>Volver al inicio</a><br></br>
								</section>
							";	
						}
						else{
							echo "
								<section class='introduccion content'>
									<h1>ERROR: No pudo registrarse</h1><br></br><br></br>
									<a href='index.php'>Volver al inicio</a><br></br>
								</section>
							";		
						}
					}else{
						echo "
							<section class='introduccion content'>
								<h1>ERROR: El usuario ya existe</h1><br></br><br></br>		
								<a href='index.php'>Volver al inicio</a><br></br>
							</section>
						";
					}
				}else{
					IF (ISSET($_SESSION['usuariolector'])){
						$strSql = "
							UPDATE usuariolector
							SET apellido = '$apellido',
								nombre = '$nombre',
								documento = '$documento',
								fechaNacimiento = '$fechaNacimiento',
								calle = '$calle',
								numero = $numero,
								telefono = '$tel',
								mail = '$email',
								idLocalidad = $idLocalidad,
								idProvincia = $idProvincia,
								idPais = $idPais,
								idEstado = $estado,
								usuario = '$usuario',
								clave = '$clave',
								imagenPerfil = '$fotoPerfil'
							WHERE idUsuarioLector = $idUsuario
						";
					}else{
						$strSql = "
							UPDATE usuarioadministrativo
							SET apellido = '$apellido',
								nombre = '$nombre',
								documento = '$documento',
								fechaNacimiento = '$fechaNacimiento',
								calle = '$calle',
								numero = $numero,
								telefono = '$tel',
								mail = '$email',
								idLocalidad = $idLocalidad,
								idProvincia = $idProvincia,
								idPais = $idPais,
								idEstado = $estado,
								usuario = '$usuario',
								clave = '$clave',
								imagenPerfil = '$fotoPerfil'
							WHERE idUsuarioAdmin = $idUsuario
						";
					}
					if($resultado = mysqli_query($bd->getEnlace(), $strSql)){
						session_destroy();
						echo"
							<section class='introduccion content'>
								<h1>El usuario '$usuario' se ha Modificado satisfactoriamente! debe volver a iniciar sesion</h1><br></br><br></br>				
								<a href='index.php'>Volver al inicio</a><br></br>
							</section>
						";	
					}else{
						echo "
							<section class='introduccion content'>
								<h1>ERROR: No pudo modificarse</h1><br></br><br></br>
								<a href='index.php'>Volver al inicio</a><br></br>
							</section>
						";		
					}
				}
			}else{
				echo "<h1>ERROR: El formulario no se recibió correctamente</h1>";
				header('location:perfil_modificacion.php');
			}
			include_once('include/footer.php');
		?>
	</body>
</html>
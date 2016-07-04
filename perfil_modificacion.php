<?php
	include_once('clases/Usuarios.php');
	include_once('clases/BaseDatos.php');
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
			
			if (ISSET($_GET['edit']) && ($_GET['edit'] == 1)){
				IF(ISSET($_SESSION['idUsuario']) && ISSET($_SESSION['usuariolector'])){
					$datos = $usuario->cargarDatosUsuario($_SESSION['idUsuario']);
				}else IF(ISSET($_SESSION['idUsuario']) && ISSET($_SESSION['usuarioadministrativo'])){
					$datos = $usuario->cargarDatosUsuarioAdmin($_SESSION['idUsuario']);	
				}else{
					$datos =$usuario->limpiarDatos();
				}
				
			}else{
				$datos =$usuario->limpiarDatos();
			}
		?>
		
		<section class='modificacionDatos content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a><span class='separacion'>></span><a class='here' href='perfil_lector.php'>Perfil de usuario</a>
				<?php
					if (ISSET($_GET['edit']) && ($_GET['edit'] == 1) && 
						((ISSET($_SESSION['idUsuario']) && ISSET($_SESSION['usuariolector'])) ||
						  ISSET($_SESSION['idUsuario']) && ISSET($_SESSION['usuarioadministrativo']))){
						echo"<span class='separacion'>></span><a class='here' href='perfil_modificacion.php'>Modificacion de usuario</a></p>";
					}else{
						echo"<span class='separacion'>></span><a class='here' href='perfil_modificacion.php'>Alta de usuario</a></p>";
					}
				?>
			</div>
            <div class='formularioUsuario'>
			
				<form id='formLector' action='usuario_registrado.php' method='POST' enctype='multipart/form-data'>				
					<label>Nombre de usuario</label> 
					<input  type='hidden' value='<?php echo $datos['idUsuario'];?>' id='idUsuario' name='idUsuario'></input>
					<input value='<?php echo $datos['usuario'];?>' title='Solo letras, números y guiones' type='text' id='usuario' name='usuario' placeholder='Nombre de Usuario' pattern='[A-Za-z0-9_-]{1,15}' onchange='buscaUsuario(this.value)' required/>
					<span id='usuarioOcupado' style='font-size:0.8em; color:red;'></span>
					
					<label>Contraseña</label>
					<input title='Letras y números, entre 4 y 8 caracteres' type='password' id='clave' name='clave' placeholder='Contraseña' pattern='[A-Za-z0-9]{4,8}' required/>
					
					<label>Repita su contraseña</label>
					<input type='password' id='reClave' name='reClave' placeholder='Repita contraseña' required/></br>
					
					<label>Nombre</label>
					<input value='<?php echo $datos['nombre'];?>' title='Solo se admiten letras' type='text' id='nombre' name='nombre' placeholder='Nombre' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/></br>
					
					<label>Apellido</label>
					<input value='<?php  echo $datos['apellido'];?>' title='Solo se admiten letras' type='text' id='apellido' name='apellido' placeholder='Apellido'  pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/></br>
					
					<label>Foto de perfil</label>
					<input value='<?php  echo $datos['fotoPerfil'];?>' type='file' id='fotoPerfil' name='fotoPerfil'/></br>
					
					<label>DNI</label>
					<input value='<?php echo $datos['documento'];?>' type='text' id='dni' name='dni' placeholder='8 digitos' pattern='[0-9]{8}' required/></br>

					<label>Fecha Nacimiento</label>
					<input value='<?php echo $datos['fechaNacimiento'];?>' type='date' id='fechaNacimiento' name='fechaNacimiento' max='31-12-1919' required/></br>

					<label>Email</label>					
					<input value='<?php echo $datos['mail'];?>' placeholder='xxx@xxx.com' type='email' id='email' name='email'/></br>

					<label>Teléfono</label>
					<input value='<?php echo $datos['telefono'];?>' type='text' id='tel' name='tel' placeholder='ej. 4432-2342' pattern='[0-9_-]{8,20}' required/><br>

					<label>País</label>
					<?php
						$bd= new BaseDatos();
						$sql = "SELECT * FROM pais;";
						$resultado = mysqli_query($bd->getEnlace(), $sql);
						echo "<select name='pais' onchange='buscaProvincia(this.value)'>";
						echo "<option value='".$datos['idPais']."'>".$datos['pais']."</option>";
						while($fila = mysqli_fetch_assoc($resultado)){
							echo "<option value='"  . $fila["idPais"] . "'>" . $fila["nombre"] . "</option>";
						}
						echo "</select>";
					?>
					
					<label>Provincia</label>
					<?php
						echo "
						<select id='provincia' name='provinciaUsuario' onchange='buscaLocalidad(this.value)'>
							<option value='".$datos['idProvincia']."'>".$datos['provincia']."</option>
						</select>
						";
					?>
					
					<label>Localidad</label>
					<?php
						echo "
						<select id='localidad' name='localidadUsuario'>
							<option value='".$datos['idLocalidad']."'>".$datos['localidad']."</option>
						</select>
						";
					?>
					
					<label>Calle</label>
					<input value='<?php echo $datos['calle'];?>' type='text' id='calle' name='calle' placeholder='calle' size='21' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/>
					
					<label>Número</label>
					<input value='<?php echo $datos['numero'];?>' type='text' id='nro' name='nro' placeholder='numero' size='21' pattern='[0-9]{1,5}' required/>
					
					<input type='submit' id='enviar' name='enviar'></input>
					
					<?php
						if(isset($_POST['enviar'])){
							//$registro= new Usuarios();
							//$registro->altaUsuarioLecto($_POST['apellido'],$_POST['nombre'],$_POST['fechaNacimiento'],$_POST['calle'],$_POST['numero'],$_POST['telefono'],$_POST['mail'],$_POST['localidad'],$_POST['provincia'],$_POST['pais'],$_POST['usuario'],$_POST['clave']);
						}
					?>
					<script type='text/javascript'>
						var clave = document.getElementById("clave")
						, reClave = document.getElementById("reClave");

						function validarClave(){
							if(clave.value != reClave.value) {
								reClave.setCustomValidity("Las contraseñas no coinciden");
							}else{
								reClave.setCustomValidity('');
							}
						}

						clave.onchange = validarClave;
						reClave.onkeyup = validarClave;
					</Script>
				</form>
			</div>
		</section>

		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

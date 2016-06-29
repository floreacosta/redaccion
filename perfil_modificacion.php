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
		?>
		
		<section class='modificacionDatos content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a><span class='separacion'>></span><a class='here' href='perfil_lector.php'>Perfil de usuario</a><span class='separacion'>></span><a class='here' href='perfil_modificacion.php'>Modificacion/Alta de usuario</a></p>
			</div>
            <div class='formularioUsuario'>
			
				<form id='formLector' action='/redaccion/usuario_registrado.php' method='POST' class="" enctype='multipart/form-data'>
				
				
					<label>Nombre de usuario</label> 
					<input title='Solo letras, numeros y guiones' type='text' id='usuario' name='usuario' placeholder='Nombre de Usuario' pattern='^[A-Za-z0-9_]{1,15}$' onchange='buscaUsuario(this.value)' required/>
					<span id='usuarioOcupado'></span>
					<label>Contraseña</label>
					<input title='Solo letras y numeros' type='password' id='clave' name='clave' placeholder='Contraseña' pattern='^[A-Za-z0-9]{1,15}$' required/>
					<label>Repita su contraseña</label></br> <input type='password' id='reClave' name='reClave' required/></br>
					<label>Nombre</label>
					<input title='Solo se admiten letras' type='text' id='nombre' name='nombre' placeholder='Nombre' pattern='^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}$' required/></br>
					<label>Apellido</label>
					<input title='Solo se admiten letras' type='text' id='apellido' name='apellido' placeholder='Apellido' pattern='^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}$' required/></br>
					<label>Fecha Nacimiento</label>
					<input type='date' id='fechaNacimiento' name='fechaNacimiento' min='1916-12-31' required/></br>
					<label>Email</label>
					<input type='email' id='email' name='email' required/></br>
					<label>Tel&eacute;fono</label> 
					<input type='tel' id='tel' name='tel' placeholder='numero telef&oacute;nico' required/><br>
					<label>Pa&iacute;s</label>
					<?php
						$bd= new BaseDatos('localhost', 'root', '', 'dbredaccion');
						$sql = "SELECT * FROM pais;";
						$resultado = mysqli_query($bd->getEnlace(), $sql);
						echo "<select name='pais' onchange='buscaProvincia(this.value)'>";
						echo "<option value=''>Seleccionar</option>";
						while($fila = mysqli_fetch_assoc($resultado)){
							echo "<option value='"  . $fila["idPais"] . "'>" . $fila["nombre"] . "</option>";
						}
						echo "</select>";
					?>
					<label>Provincia</label>
					<?php
						echo "<select id='provincia' onchange='buscaLocalidad(this.value)'>
						<option value=''>Seleccionar</option>
						</select>";
					?>
					<label>Localidad</label>
					<?php
						echo "<select id='localidad'>
						<option value=''>Seleccionar</option>
						</select>";
					?>
					<label>Calle</label>
					<input type='text' id='calle' name='calle' placeholder='calle' size='21' pattern='^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}$' required/>
					<label>N&uacute;mero</label>
					<input type='text' id='nro' name='nro' placeholder='numero' size='21' pattern='^[0-9]{1,5}$' required/>
					
					<input type='submit' id='enviar' name='enviar'></input>
					
					<?php
						if(isset($_POST['enviar'])){
							//$registro= new Usuarios();
							//$registro->altaUsuarioLecto($_POST['apellido'],$_POST['nombre'],$_POST['fechaNacimiento'],$_POST['calle'],$_POST['numero'],$_POST['telefono'],$_POST['mail'],$_POST['localidad'],$_POST['provincia'],$_POST['pais'],$_POST['usuario'],$_POST['clave']);
						}
					?>
					<script>
						var clave = document.getElementById("clave")
						, reClave = document.getElementById("reClave");

						function validarClave(){
						if(clave.value != reClave.value) {
						reClave.setCustomValidity("Las contraseñas no coinciden");
						} else {
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

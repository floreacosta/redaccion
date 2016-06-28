<?php
	include_once('clases/Usuarios.php');
	include_once('clases/BaseDatos.php');
	
//NO PUDE PONER LAS VALIDACIONES EN EL JS PORQUE NO ME LAS TOMABA AUN-FALTA FORMATO
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
			
			<form id='formLector' action='' method='POST' enctype='multipart/form-data' novalidate>
			    
				<div id="ok"></div></br>
			
				Nombre de usuario: </br> <input type='text' id='nombreUsuario' name='nombreUsuario' placeholder='Nombre de Usuario' size='21' required/><br>
				Contraseña: </br> <input type='password' id='clave' name='clave' placeholder='Contraseña' size='21' required/></br>
				Repita su contraseña: </br> <input type='password' id='reClave' name='reClave'size='21' required/></br>
				Nombre: </br> <input type='text' id='nombre' name='nombre' placeholder='Nombre' size='21' required/></br>
				Apellido: </br> <input type='text' id='apellido' name='apellido' placeholder='Apellido' size='21' required/></br>
				Fecha Nacimiento: </br> <input type='date' id='fechaNacimiento' name='fechaNacimiento' max='1919-12-31' required/></br>
				Email: </br> <input type='email' id='email' name='email' required/></br>
				Tel&eacute;fono:</br> <input type='text' id='tel' name='tel' placeholder='numero telef&oacute;nico' size='21' required/><br>
				Pais:</br>
				<?php
					$bd= new BaseDatos('localhost', 'root', '', 'dbredaccion');
			        $sql = "SELECT * FROM pais;";
					$resultado = mysqli_query($bd->getEnlace(), $sql);
					echo "<select name='pais' onchange='buscaProvincia(this.value)'>";
					echo "<option value=''>Seleccionar</option>";
					while($fila = mysqli_fetch_assoc($resultado)){
						echo "<option value='"  . $fila["idPais"] . "'>" . $fila["nombre"] . "</option>";
					}
					echo "</select></br>";
				?>
				Provincia:</br>
				<?php
					echo "<select id='provincia' onchange='buscaLocalidad(this.value)'>
					<option value=''>Seleccionar</option>
					</select></br>";
				?>
				Localidad:</br>
				<?php
					echo "<select id='localidad'>
					<option value=''>Seleccionar</option>
					</select></br>";
				?>
				Calle:</br> <input type='text' id='calle' name='calle' placeholder='calle' size='21' required/><br>
				Numero:</br> <input type='text' id='nro' name='nro' placeholder='numero' size='21' required/><br></br>
				
				<input type='submit' id='enviar' name='enviar'></input></br></br>
				
				<?php
				    if(isset($_POST['enviar'])){
						//$registro= new Usuarios();
						//$registro->altaUsuarioLecto($_POST['apellido'],$_POST['nombre'],$_POST['fechaNacimiento'],$_POST['calle'],$_POST['numero'],$_POST['telefono'],$_POST['mail'],$_POST['localidad'],$_POST['provincia'],$_POST['pais'],$_POST['usuario'],$_POST['clave']);
					}
				?>
				
			</form>
			<script>
				$("#formLector").validate({
					rules: {
						nombreUsuario: {
						required: true,
						//remote: "php/algoquevalidaqueelusuarionoexista.php"
						},
						clave: {
						required: true,
						},
						reClave: {
						required: true,
						equalTo: clave
						},
						nombre: {
						required: true,
						lettersonly: true
						},
						apellido: {
						required: true,
						lettersonly: true
						},
						email: {
						required: true,
						email: true,
						},
						tel: {
						required: true,
						digits: true,
						minlength: 9,
						maxlength: 9
						},
						calle: {
						required: true,
						lettersonly: true
						},
						nro: {
						required: true,
						digits: true
						},
				
					},
					messages: {
						 
						nombreUsuario: {
						remote: "El usuario ya esta en uso."
						},
						reClave: {
						equalTo: "Las claves no coinciden."
						},
						nombre: {
						lettersonly:"Solo se admiten letras."
						},
						apellido: {
						lettersonly:"Solo se admiten letras."
						},
						email: {
						email:"Itroduzca un email valido."
						},
						tel: {
						digits:"Itroduzca un telefono valido."
						},
						calle: {
						lettersonly:"Solo se admiten letras."
						},
						nro: {
						digits:"Solo se permiten numeros"
						}
					},
					submitHandler: function() {
						alert("formulario enviado");
					}
				});

			</script>
		
		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

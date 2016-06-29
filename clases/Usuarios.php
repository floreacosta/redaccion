<?php
	class Usuarios{
		private $usuario;
		
		/*
		function __construct($usuario, $pass, $nombreApellido, $fotoPerfil, $dni, $localidad, $provincia, $pais){
			$this->usuario = $usuario;
			$this->pass = $pass;
			$this->nombreApellido = $nombreApellido;
			$this->fotoPerfil = $fotoPerfil;
			$this->dni = $dni;
			$this->localidad = $localidad;
			$this->provincia = $provincia;
			$this->pais = $pais;
		}
		
		
		public function imprimirFormulario(){
			echo"
				<form action='' method='POST' enctype=''>

					<div>
						<label for='user'>Usuario</label>
						<input type='text' name='usuario' value='' placeholder='pedro123'></input>
					</div>

					<div>
						<label for='pass'>Contraseña</label>
						<input type='text' name='clave' value='' placeholder=''></input>
					</div>

					<div>
						<label for='pass'>Repita Contraseña</label>
						<input type='text' name='reingresoClave' value='' placeholder=''></input>
					</div>
					
					<div>
						<label for='nombreApellido'>Nombre y apellido</label>
						<input type='text' name='nombreApellido' value='' placeholder='Ernesto Juarez'></input>
					</div>

					<div>
						<label for='fotoPerfil'>Foto de perfil</label>
						<input type='file' name='fotoPerfil' value='' placeholder='mifoto.jpg o mifoto.png'></input>
					</div>

					<div>
						<label for='dni'>Número de documento</label>
						<input type='text' name='dni' value='' placeholder='9 dígitos'></input>
					</div>

					<div>
						<select name='provincia'>
							<option value='' disable selected>Provincia...</option>
						</select>
					</div>

					<div>
						<select name='localidad'>
							<option value='' disable selected>Localidad...</option>
						</select>
					</div>
					
					<div>
						<input type='submit' name='enviar' value='enviar'></input>
					</div>
				</form>
			";
		}
		*/
		
		public function login($usuario, $pass){
			$this->usuario = $usuario;
			
			if(ISSET($_POST['ingresarLoginLector'])){
				$tablaUsuario = "usuariolector";
				
			}else if(ISSET($_POST['ingresarLoginRedactor']) || ISSET($_POST['ingresarLoginAdministrador'])){
				$tablaUsuario = "usuarioadministrativo";				
			}else{
				exit();
			}


			if(ISSET($this->usuario) && $this->usuario != '' && ISSET($pass) && $pass != ''){
				$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
				$strSql = "SELECT US.nombre
						   FROM $tablaUsuario US
						   WHERE usuario = '".$this->usuario."' AND clave = '".$pass."'";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
				
				if($resultado = mysqli_fetch_assoc($consulta)){
					$_SESSION['usuario'] = $resultado['nombre'];
					
					Header('Location: index.php');
				}else{
					echo'<h1>Error de Logueo.</h1>';
				}
			}	
		}//fin public function login();
		
		//validaciones
		
		public function validacionUsuario($usuario){
			if($usuario != '' && ISSET($usuario)){
				if(preg_match('/^[a-z\d_]{4,15}$/i', $usuario)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		public function validacionNombre($nombreApellido){
			if($nombreApellido != '' && ISSET($nombreApellido)){
				if(preg_match('/^[a-z\d_]{4,15}$/i', $nombreApellido)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		
		public function validacionPass($pass){
			if($pass != '' && ISSET($pass)){
				if(preg_match('(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$', $pass)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
		/*
		De esta forma comprobaremos:
		Contraseñas que contengan al menos una letra mayúscula.
		Contraseñas que contengan al menos una letra minúscula.
		Contraseñas que contengan al menos un número o caracter especial.
		Contraseñas cuya longitud sea como mínimo 8 caracteres.
		Contraseñas cuya longitud máxima no debe ser arbitrariamente limitada.		
		*/
		
		//fin validaciones
		
		public function altaUsuario($usuario, $pass, $nombreApellido, $fotoPerfil, $dni, $localidad, $provincia, $pais){
			
		}
		
		public function cerrarSesion(){
			if(ISSET($_POST['cerrarSesion'])){
				session_destroy();
				Header('Location: index.php');		
			}
		}
	
	}//fin class
	
?>
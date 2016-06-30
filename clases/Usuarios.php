<?php
	class Usuarios{
		private $usuario;
		
		public function encabezadoPerfil(){
			if (ISSET($_SESSION['idUsuario'])){
				if(ISSET($_SESSION['usuariolector'])){
					$tablaUsuario = "usuariolector";
					$campoId ="idUsuarioLector";
				}else if(ISSET($_SESSION['usuarioadministrativo'])){
					$tablaUsuario = "usuarioadministrativo";
					$campoId = "idUsuarioAdmin";
				}
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT UL.nombre, UL.apellido,UL.imagenPerfil
					FROM ".$tablaUsuario." UL
					WHERE UL.".$campoId." = ".$_SESSION['idUsuario']." 
				";
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					echo "
						<img class='fotoPerfil' src='img/perfil/".$resultado['imagenPerfil']."'/>
						<div class='datosPerfil'>
							<h2>Bienvenido/a</h2>
							<h1>".$resultado['nombre']." ".$resultado['apellido']." <a class='iconModificar' title='Modificar datos de perfil' href='perfil_modificacion.php'>r</a></h1>
						</div>
					";
				}
			}
		}		
		
		public function login($usuario, $pass){
			$this->usuario = $usuario;
			if(ISSET($_POST['ingresarLoginLector'])){
				$tablaUsuario = "usuariolector";
				$campoId ="idUsuarioLector";
			}else if(ISSET($_POST['ingresarLoginRedactor']) || ISSET($_POST['ingresarLoginAdministrador'])){
				$tablaUsuario = "usuarioadministrativo";
				$campoId = "idUsuarioAdmin";
			}else{
				exit();
			}


			if(ISSET($this->usuario) && $this->usuario != '' && ISSET($pass) && $pass != ''){
				$bd = new BaseDatos();
				$strSql = "SELECT US.nombre,US.".$campoId.",US.imagenPerfil
						   FROM $tablaUsuario US
						   WHERE usuario = '".$this->usuario."' AND clave = '".$pass."'";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
				
				if($resultado = mysqli_fetch_assoc($consulta)){
					$_SESSION["$tablaUsuario"] = $resultado['nombre'];
					$_SESSION['idUsuario'] = $resultado["$campoId"];
					$_SESSION['Perfil'] = $resultado['imagenPerfil'] ;
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
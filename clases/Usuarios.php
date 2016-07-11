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
							<h1>".$resultado['nombre']." ".$resultado['apellido']." <a class='iconModificar' title='Modificar datos de perfil' href='perfil_modificacion.php?edit=1'>r</a></h1>
							<div class='datosPerfil'>
								<form action='index.php' enctype='' method='POST'>
								<input type='submit' id='cerrarSesion' name='cerrarSesion' value='Cerrar Sesion'></input>	
							</div>
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
			$pass =  md5(trim($pass));

			if(ISSET($this->usuario) && $this->usuario != '' && ISSET($pass) && $pass != ''){
				$bd = new BaseDatos();
				$strSql = "SELECT US.nombre, US.apellido, US.".$campoId.", US.imagenPerfil
						   FROM $tablaUsuario US
						   WHERE usuario = '".$this->usuario."' AND clave = '".$pass."' AND idEstado = 1";
				echo $strSql;
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
				
				if($resultado = mysqli_fetch_assoc($consulta)){
					$_SESSION["$tablaUsuario"] = $resultado['nombre']." ".$resultado['apellido'];
					$_SESSION['idUsuario'] = $resultado["$campoId"];
					$_SESSION['Perfil'] = $resultado['imagenPerfil'] ;
					header('Location: index.php');
				}else{
					//header('Location: mensaje.php?mensaje=1');
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
		
		public function cargarDatosUsuario($idUsuario){
			if (ISSET($idUsuario)){
				$bd = new BaseDatos();
				$strSql = "
					SELECT UL.usuario,UL.apellido,UL.nombre,UL.documento,UL.fechaNacimiento,UL.mail,UL.telefono,UL.calle,UL.numero, UL.imagenPerfil,
						   PA.idPais, PA.nombre pais, PR.idProvincia, PR.nombre provincia, LO.idLocalidad, LO.nombre localidad
					FROM (((usuariolector UL JOIN Pais PA ON UL.idPais=PA.idPais)
										  JOIN Provincia PR ON UL.idProvincia = PR.idProvincia)
										  JOIN Localidad LO ON UL.idLocalidad= LO.idLocalidad)
					WHERE UL.idUsuarioLector = ".$idUsuario." 
				";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					$datos['idUsuario'] = $idUsuario;
					$datos["usuario"] = $resultado['usuario'];
					$datos["apellido"] = $resultado['apellido'];
					$datos["nombre"] = $resultado['nombre'];
					$datos["fotoPerfil"] = $resultado['imagenPerfil'];
					$datos["documento"] = $resultado['documento'];
					$datos["fechaNacimiento"] = $resultado['fechaNacimiento'];
					$datos["mail"] = $resultado['mail'];
					$datos["telefono"] = $resultado['telefono'];
					$datos["idPais"] = $resultado['idPais'];
					$datos["pais"] = $resultado['pais'];
					$datos["idProvincia"] = $resultado['idProvincia'];
					$datos["provincia"] = $resultado['provincia'];
					$datos["idLocalidad"] = $resultado['idLocalidad'];
					$datos["localidad"] = $resultado['localidad'];
					$datos["calle"] = $resultado['calle'];
					$datos["numero"] = $resultado['numero'];
					return $datos;
				}
			}
			
		}
		
		public function cargarDatosUsuarioAdmin($idUsuario){
			if (ISSET($idUsuario)){
				$bd = new BaseDatos();
				$strSql = "
					SELECT UA.usuario,UA.idTipoUsuario,UA.apellido,UA.nombre,UA.documento,UA.fechaNacimiento,UA.mail,UA.telefono,UA.calle,UA.numero, UA.imagenPerfil,
						   PA.idPais, PA.nombre pais, PR.idProvincia, PR.nombre provincia, LO.idLocalidad, LO.nombre localidad
					FROM usuarioAdministrativo UA INNER JOIN Pais PA ON UA.idPais=PA.idPais
										  INNER JOIN Provincia PR ON UA.idProvincia = PR.idProvincia
										  INNER JOIN Localidad LO ON UA.idLocalidad= LO.idLocalidad
					WHERE UA.idUsuarioAdmin = ".$idUsuario;
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					$datos['idUsuario'] = $idUsuario;
					$datos["usuario"] = $resultado['usuario'];
					$datos["apellido"] = $resultado['apellido'];
					$datos["nombre"] = $resultado['nombre'];
					$datos["fotoPerfil"] = $resultado['imagenPerfil'];
					$datos["documento"] = $resultado['documento'];
					$datos["fechaNacimiento"] = $resultado['fechaNacimiento'];
					$datos["mail"] = $resultado['mail'];
					$datos["telefono"] = $resultado['telefono'];
					$datos["idPais"] = $resultado['idPais'];
					$datos["pais"] = $resultado['pais'];
					$datos["idProvincia"] = $resultado['idProvincia'];
					$datos["provincia"] = $resultado['provincia'];
					$datos["idLocalidad"] = $resultado['idLocalidad'];
					$datos["localidad"] = $resultado['localidad'];
					$datos["calle"] = $resultado['calle'];
					$datos["numero"] = $resultado['numero'];
					$datos["tipoUsuario"] = $resultado['idTipoUsuario'];
					return $datos;
				}
			}
		}

		public function limpiarDatos(){
			$datos['idUsuario'] ="";
			$datos["usuario"] ="";
			$datos["apellido"] ="";
			$datos["nombre"] ="";
			$datos["fotoPerfil"] = "";
			$datos["documento"] ="";
			$datos["fechaNacimiento"] ="";
			$datos["mail"] ="";
			$datos["telefono"] ="";
			$datos["idPais"] ="";
			$datos["pais"] ="Seleccionar";
			$datos["idProvincia"] ="";
			$datos["provincia"] ="Seleccionar";
			$datos["idLocalidad"] ="";
			$datos["localidad"] ="Seleccionar";
			$datos["calle"] ="";
			$datos["numero"] ="";
			return $datos;
		}

		public function consultarPermisoLector($idUsuario,$seccion){
			$seccionPublica = "index.php";
			$seccionMensaje = "mensaje.php";
			
			if($seccion != $seccionPublica &&
			   $seccion != $seccionMensaje	){
				   
				if (ISSET($idUsuario) && ISSET($seccion) && 
					ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
					switch ($seccion){
						case 'resultado_busqueda.php':
							break;
						case 'perfil_lector.php':
							break;
						case 'perfil_modificacion.php':
							break;
						case 'usuario_registrado.php':
							break;
						case 'edicion.php':
							if(ISSET($_GET['edicion']) && $_GET['edicion'] != ""){
								$idEdicion = $_GET['edicion'];
								$bd = new BaseDatos();
								
								$strSql = "
									SELECT 1
									FROM compras 
									WHERE idUsuarioLector = ".$_SESSION['idUsuario']." 
									  AND idEdicion = ".$idEdicion."
								";
								
								$consulta = mysqli_query($bd->getEnlace(), $strSql);
								
								if($comprada = mysqli_fetch_assoc($consulta)){
									
									break;
								}else{
									$strSql = "
											SELECT idPublicacion, fecha fechaEdicion
											FROM edicion
											WHERE idEdicion = ".$idEdicion."
									";
									$consulta = mysqli_query($bd->getEnlace(), $strSql);
									$mirar = FALSE;
									IF($comprada = mysqli_fetch_assoc($consulta)){
										$fechaEdicion = $comprada['fechaEdicion'];
										$strSql = "
												SELECT SU.fecha fechaSuscripcion, TS.tiempoEnMeses
												FROM (suscripcion SU JOIN tiempoSuscripcion TS ON SU.idTiempoSuscripcion=TS.idTiempoSuscripcion)
												WHERE SU.idPublicacion = ".$comprada['idPublicacion']."
												  AND su.idUsuarioLector = ".$_SESSION['idUsuario']."
										";
										
										$consulta = mysqli_query($bd->getEnlace(), $strSql);
										
										while($comprada = mysqli_fetch_assoc($consulta)){
											$fechaCompra = $comprada['fechaSuscripcion'];
											$fechaVencimiento = strtotime ( "+".$comprada['tiempoEnMeses']." month" , strtotime ( $fechaCompra ) ) ;
											$fechaVencimiento = date ( 'Y-m-j' , $fechaVencimiento );
											
											if ((date('Y-m-j') > date('Y-m-j',strtotime("$fechaCompra"))) && (date('Y-m-j') <= strtotime("$fechaVencimiento")) ){
												$mirar = TRUE;
											}
										}
									}
									if($mirar == TRUE){
										break;
									}else{
										header('Location: mensaje.php?mensaje=2');
									}
								}
							}else{
								header('Location: mensaje.php?mensaje=2');
							}
							break;
						case 'nota.php':
							if(ISSET($_GET['edicion']) && $_GET['edicion'] != "" &&
							   ISSET($_GET['nota']) && $_GET['nota'] != "" ){
								$idEdicion = $_GET['edicion'];
								$nota = $_GET['nota'];
								$bd = new BaseDatos();
								
								$strSql = "
									SELECT SPE.idSeccionPorEdicion
									FROM ((compras CO JOIN seccionPorEdicion SPE ON CO.idEdicion = SPE.idEdicion)
													JOIN nota NO ON SPE.idSeccionPorEdicion = NO.idSeccionPorEdicion)
									WHERE CO.idUsuarioLector = ".$_SESSION['idUsuario']." 
									  AND CO.idEdicion = ".$idEdicion."
									  AND NO.idNota = ".$nota."
								";

								$consulta = mysqli_query($bd->getEnlace(), $strSql);
								
								if($comprada = mysqli_fetch_assoc($consulta)){
									break;
								}else{
									
									$strSql = "
											SELECT ED.idPublicacion, ED.fecha fechaEdicion
											FROM ((edicion ED JOIN seccionPorEdicion SPE ON ED.idEdicion = SPE.idEdicion)
															JOIN nota NO ON SPE.idSeccionPorEdicion = SPE.idSeccionPorEdicion)
											WHERE ED.idEdicion = ".$idEdicion."
											  AND NO.idNota = ".$nota."
									";
									
									$consulta = mysqli_query($bd->getEnlace(), $strSql);
									$mirar = FALSE;
									IF($comprada = mysqli_fetch_assoc($consulta)){
									
										$fechaEdicion = $comprada['fechaEdicion'];
										$strSql = "
												SELECT SU.idSuscripcion, SU.fecha fechaSuscripcion, TS.tiempoEnMeses
												FROM (suscripcion SU JOIN tiempoSuscripcion TS ON SU.idTiempoSuscripcion=TS.idTiempoSuscripcion)
												WHERE SU.idPublicacion = ".$comprada['idPublicacion']."
												  AND su.idUsuarioLector = ".$_SESSION['idUsuario']."
										";
										
										$consulta = mysqli_query($bd->getEnlace(), $strSql);
										
										while($comprada = mysqli_fetch_assoc($consulta)){
											$fechaCompra = $comprada['fechaSuscripcion'];
											$fechaVencimiento = strtotime ( "+".$comprada['tiempoEnMeses']." month" , strtotime ( $fechaCompra ) ) ;
											$fechaVencimiento = date ( 'Y-m-j' , $fechaVencimiento );
											
											if ((date('Y-m-j') > date('Y-m-j',strtotime("$fechaCompra"))) && (date('Y-m-j') <= strtotime("$fechaVencimiento")) ){
												$mirar = TRUE;
											}
										}
									}
									if($mirar == TRUE){
										break;
									}else{
										header('Location: mensaje.php?mensaje=2');
									}
								}
							}else{
								header('Location: mensaje.php?mensaje=2');
							}
							break;
						case 'ver_suscripcion.php':
							break;
						default:
							header('Location: mensaje.php?mensaje=2');
							break;
					}
				}
			}
		}
		public function consultarPermisoAdministrativo($idUsuario,$seccion){
			$seccionPublica = "index.php";
			$seccionMensaje = "mensaje.php";
			
			if($seccion != $seccionPublica &&
			   $seccion != $seccionMensaje	){
				if (ISSET($idUsuario) && ISSET($seccion) && ISSET($_SESSION['idUsuario'])){
					$bd = new BaseDatos();
					
					$strSql = "
						SELECT 1
						FROM (((usuarioAdministrativo UA JOIN tipoUsuarioAdministrativo TUA 
														ON UA.idTipoUsuario = TUA.idTipoUsuarioAdmin)
													  JOIN permisoUsuario PU 
														ON TUA.idTipoUsuarioAdmin = PU.idTipoUsuarioAdmin)
													  JOIN seccionSistema SS 
														ON PU.idSeccionSistema = SS.idSeccionSistema)
						WHERE UA.idUsuarioAdmin = ".$_SESSION['idUsuario']." 
						  AND SS.nombre = '".$seccion."'
					";
					$consulta = mysqli_query($bd->getEnlace(), $strSql);
				
					if(!($resultado = mysqli_fetch_assoc($consulta))){
						header('Location: mensaje.php?mensaje=2');
					}
				}else {
					header('Location: mensaje.php?mensaje=2');
				}
			}
		}
		public function consultarPermisoPublico($seccion){
			$seccionPublica = "index.php";
			$seccionMensaje = "mensaje.php";
			$seccionBusqueda ="resultado_busqueda.php";
			$seccionCrearUsuario = "perfil_modificacion.php";
			if ($seccion != $seccionPublica && 
				$seccion != $seccionBusqueda &&
				$seccion != $seccionMensaje &&
				$seccion != $seccionCrearUsuario){
				header('Location: mensaje.php?mensaje=2');
			}
		}
		public function consultarTipoUsuarioAdministrativo($idUsuario){
			if (ISSET($idUsuario) && ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
				
				$strSql = "
					SELECT idTipoUsuario
					FROM usuarioAdministrativo 
					WHERE idUsuarioAdmin = ".$_SESSION['idUsuario'];
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					return $resultado['idTipoUsuario'];
				}else{
					return 0;
				}

			}
		}
	}//fin class
	
?>
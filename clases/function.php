<?php

	/*Impresion por pantalla de pestaña logeo*/
	function pestañaLogin(){
		echo"
			<span>Login</span>
			<div>
				<button id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Lector</button>
				<button id='redactor' name='redactor' value='redactor' onClick='modalOpenRedactor();'>Contenidista</button>
				<button id='administrador' name='administrador' value='administrador' onClick='modalOpenAdministrador();'>Administrador</button>
			</div>
		";
	}
	
	function usuarioLogeado(){
 		echo"
 			<form action='index.php' enctype='' method='POST'>
				<div>
		";	
			if(ISSET($_SESSION['Perfil']) ){
				echo "
					<img class='perfil' src='img/perfil/".$_SESSION['Perfil']."'/>
				";
				if(ISSET($_SESSION['usuariolector'])){
					echo "
						<a title='Ver Perfil' href='perfil_lector.php'><p>".$_SESSION['usuariolector']." <span class='verPerfil'>E</span></p></a>
					";

				}else if(ISSET($_SESSION['usuarioadministrativo'])){
					include_once('clases/Usuarios.php');
					$usuario = new Usuarios();
					$tipo = $usuario->consultarTipoUsuarioAdministrativo($_SESSION['idUsuario']);
					if ($tipo == 1){ 
						echo "
							<a title='Ver Perfil' href='perfil_contenidista.php'><p>".$_SESSION['usuarioadministrativo']."</p></a>
						";
					}else if ($tipo == 2){
						echo "
							<a title='Ver Perfil' href='perfil_administrador.php'><p>".$_SESSION['usuarioadministrativo']."</p></a>
						";
					}
				}
			}
			echo "
				<input type='submit' id='cerrarSesion' name='cerrarSesion' value='Cerrar Sesion'></input>
			";
			echo"</div>
 			</form>
 		";
	}
	//usar funcion de CERRAR SESION (en clase Usuarios)
	
	function imprimirLogeo(){
		if(ISSET($_SESSION['usuariolector']) || ISSET($_SESSION['usuarioadministrativo'])){
			usuarioLogeado();
		}else{
			pestañaLogin();
		}
	}
	
	function imprimirBotonBusqueda(){
		echo"
			<form action='resultado_busqueda.php' method='GET' enctype='multipart/form-data'>
				<input type='text' id='search' name='search' placeholder='Buscar' value=''></input>
				<input type='submit' id='btnSearch' name='btnSearch' value='s'></input>
			</form>
		";
	}
	/*FIN Impresion por pantalla de pestaña logeo*/
?>
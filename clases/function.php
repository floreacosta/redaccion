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
				<div>";
					if(ISSET($_SESSION['usuariolector'])){
						echo "<img class='perfil' src='img/iconLogin-user.png'/>
							  <a href='perfil_lector.php'><p>".$_SESSION['usuariolector']."</p></a>";
					}else if(ISSET($_SESSION['usuarioadministrativo'])){
						echo "<img class='perfil' src='img/iconLogin-trabajadores.png'/>
							  <a href='perfil_contenidista.php'><p>".$_SESSION['usuarioadministrativo']."</p></a>";
					}
				echo "<input type='submit' id='cerrarSesion' name='cerrarSesion' value='Cerrar Sesion'></input>
				</div>
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
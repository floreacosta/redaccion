<?php

	/*Impresion por pantalla de pestaña logeo*/
	function pestañaLogin(){
		echo"
			<span>Login</span>
			<div>
				<button id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Soy Lector</button>
				<button id='redactor' name='redactor' value='redactor' onClick='modalOpenRedactor();'>Soy Redactor</button>
			</div>
		";
	}
	
	function usuarioLogeado(){
		echo"
			<form action='index.php' enctype='' method='POST'>
				<div>
					<img class='perfil' src='#'/>
					<a href='perfil.php'><p>".$_SESSION['usuarioLector']."</p></a>
					<input type='submit' id='cerrarSesion' name='cerrarSesion' value='Cerrar Sesion'></input>
				</div>
			</form>
		";
	}
	
	//usar funcion de CERRAR SESION (en clase Usuarios)
	
	function imprimirLogeo(){
		if(ISSET($_SESSION['usuarioLector'])){
			usuarioLogeado();
		}else{
			pestañaLogin();
		}
	}
	/*FIN Impresion por pantalla de pestaña logeo*/
?>
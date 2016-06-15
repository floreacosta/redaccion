<?php

	/*Impresion por pantalla de pestaña logeo*/
	function pestañaLogin(){
		echo"
			<span>Login</span>
			<button id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Soy Lector</button>
			<button id='redactor' name='redactor' value='redactor' onClick='modalOpenRedactor();'>Soy Redactor</button>
		";
	}
	
	function usuarioLogeado(){
		echo"
			<form action='' enctype='' method=''>
				<div>
					<img class='perfil' src='#'/>
					<p>".$_SESSION['usuarioLector']."</p>
				</div>
				<input type='submit' id='cerrarSesion' name='cerrarSesion' value='Cerrar Sesion'></input>
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
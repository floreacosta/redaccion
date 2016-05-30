<?php
	/*Busqueda de usuario y contrase�a en bd.*/
	function loginUsuario(){
		//chequear el uso de cookies. hay que crearlas.
		//chequear si esta funcion no corre tambien para los empleados de la redaccion consultando con if algunas cosas.
		
		if(ISSET($_POST['userLector']) && $_POST['userLector'] != ''){
			$conexion = bd();
			$strSql = 'Aca va la consulta con $_POST["userLector"] como variable para buscar el usuario. Pido que traiga nombre de usuario y contrase�a.';
			$consulta = mysqli_query($conexion, $strSql);
			if($resultado = mysqli_fetch_assoc($consulta)){
				 $userLector = $resultado['usuario'];
				 $passLector = $resultado['password'];
			
				if(ISSET($_POST['passLector']) && $_POST['passLector'] != ''){
					if($_POST['passLector'] == $passLector){
						$_SESSION['userLector'] = $userLector;
						$_SESSION['passLector'] = $passLector;
						
						Header('Location: index.php');
					}else{
						echo'<h1>Contrase�a inv�lida.</h1>';
					}
				}else{
					echo'<h1>Ingrese una contrase�a v�lida.</h1>';
				}

			}

		}else{
			echo'<h1>Ingrese un usuario v�lido.</h1>';
		}
	}
	
	/*Alta de un nuevo usuario.*/
	function altaUsuario(){
		//usuario: solo letras y numeros. sin caracteres especiales.
		//contrase�a: solo letras y numeros. sin caracteres especiales. minimo de 10 caracteres.
		//nombre y apellido: solo letras, sin tildes.
		//foto de perfil (puede tener o no, no deberia pesar mas de tantos mb?)
		//dni: solo numeros, 9.
		//localidad
		//provincia
		//pais
	}
	
	/*Modificaci�n de perfil*/
	function modificacionUsuario(){
		//que pueda modificar alguno de los datos ingresados en la bd?
	}
	
	/*Salir del usuario*/
	function salirUsuario(){
		//chequear el uso de cookies. hay que hacerlas expirar.
		session_destroy();
		Header('Location: index.php');
	}
	
	/*en duda*/
	function eliminarUsuario(){
		//deberia tener la posibilidad de eliminar usuario para no tener que volver a entrar y nosotros pasarlo a una tabla que guarde usuarios eliminados para no perder el registro.
	}
	
	/*Impresion por pantalla de pesta�a logeo*/
	function pesta�aLogin(){
		echo"
			<span>Login</span>
			<button id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Soy Lector</button>
			<button id='redactor' name='redactor' value='redactor' onClick='modalOpenRedactor();'>Soy Redactor</button>
		";
	}
	
	function usuarioLogeado(){
		echo"Usuario ya ingres�.";
	}
	
	function imprimirLogeo(){
		if(ISSET($_SESSION['userLector']) && ISSET($_SESSION['passLector'])){
			usuarioLogeado();
		}else{
			pesta�aLogin();
		}
	}
	/*FIN Impresion por pantalla de pesta�a logeo*/
?>
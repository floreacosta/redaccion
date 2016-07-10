<?php
	session_start();
	include_once('clases/function.php');
	include_once('clases/BaseDatos.php');
	include_once('clases/Usuarios.php');
	$usuario = new Usuarios();
	
	if(ISSET($_POST['ingresarLoginLector'])){
		$usuario->login($_POST['userLector'], $_POST['passLector']);		
	}else if(ISSET($_POST['ingresarLoginRedactor'])){
		$usuario->login($_POST['userRedactor'], $_POST['passRedactor']);				
	}else if(ISSET($_POST['ingresarLoginAdministrador'])){
-		$usuario->login($_POST['userAdministrador'], $_POST['passAdministrador']);	
 	}
	
	seguridad
	$variable = explode('/', $_SERVER['PHP_SELF'] );
	if (ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
		$usuario->consultarPermisoLector($_SESSION['idUsuario'],array_pop( $variable ));
	}else if (ISSET($_SESSION['usuarioadministrativo']) && ISSET($_SESSION['idUsuario'])){
		$usuario->consultarPermisoAdministrativo($_SESSION['idUsuario'],array_pop( $variable ));
	}else{
		$usuario->consultarPermisoPublico(array_pop( $variable ));
	}
	
	$usuario->cerrarSesion();
?>

<head>
		<title>La Redacción</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/> 
		<meta name="expires" content="-1"/>
		<meta name="description" content="Tp final - Programación Web II" />
		<meta name="author" content="Acosta, Florencia / Orieta, Romina / Giani, Nahuel / Muñoz, Fernando." />
		<meta name="keywords" content="redaccion, revista"/>
		
		<!--<link rel="shortcut icon" href="img/style/favicon.ico">-->
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
		<script src='js/jquery-3.0.0.js'></script>
		<script src='js/query.js'></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript" src='js/graficos.js'></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
		<link rel="stylesheet" href="css/style.css">

</head>
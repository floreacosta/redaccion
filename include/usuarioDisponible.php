<?php
	include_once('../clases/BaseDatos.php');
	$usuario = $_GET["usuario"];
	$bd= new BaseDatos('localhost', 'root', '', 'dbredaccion');
	$sql = "
	SELECT *
	FROM usuarioLector";
	$resultado = mysqli_query($bd->getEnlace(), $sql);
	while($fila = mysqli_fetch_assoc($resultado)){
		if($fila["usuario"]==$usuario){
			echo"El nombre de usuario ".$usuario." no est&aacute; disponible";
		}
		else{
		}
	}
?>

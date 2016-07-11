<?php
	include_once('../clases/BaseDatos.php');
	if (ISSET($_GET['idPublicacion']) && ISSET($_GET['idPeriodo']) &&
		($_GET['idPublicacion'] != "") && ($_GET['idPeriodo'] != "")){
		$bd= new BaseDatos();

		$sql = "
				SELECT ED.precio
				FROM edicion ED 
				WHERE idPublicacion = ".$_GET['idPublicacion']."
				ORDER BY ED.idEdicion DESC LIMIT 1";
		$consulta = mysqli_query($bd->getEnlace(), $sql);
		
		IF($resultado = mysqli_fetch_assoc($consulta)){
			$precio = $resultado['precio'];
			$sql = "
				SELECT TS.tiempoEnMeses, TS.porcentajeDescuento
				FROM tiemposuscripcion TS
				WHERE idTiempoSuscripcion = ".$_GET['idPeriodo'];	
			
			$consulta = mysqli_query($bd->getEnlace(), $sql);
			
			IF($resultado = mysqli_fetch_assoc($consulta)){
				$porcentaje =floatval($resultado['porcentajeDescuento'] /100);
				$meses = $resultado['tiempoEnMeses'];
				$precio = ((floatval($precio) - ($precio * $porcentaje)) * intval($meses));
				$precio = sprintf("%.2f", $precio);
				echo "$ ".$precio;			
			}
		}
	}else{
		echo "";
	}
	/*$usuario = $_GET["usuario"];
	$bd= new BaseDatos();

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
	}*/
?>

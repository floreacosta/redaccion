<?php
	include_once('../clases/BaseDatos.php');

	$idEdicion = $_GET["idEdicion"];
	$bd= new BaseDatos();

	$sql = "
			SELECT tituloEdicion, precio
			FROM edicion
			WHERE idEdicion = ".$idEdicion;
	$resultado = mysqli_query($bd->getEnlace(), $sql);

	if($fila = mysqli_fetch_assoc($resultado)){
		$idEdicion = sprintf("%03d", $idEdicion);
		echo"
			<h2>Compra</h2>
			<input type='text'  id='numEdicion' name='numEdicion' value='".$idEdicion."'  hidden/>
			<h3 class='numEdicionCompra'>Edición n°: ".$idEdicion."'</h3>
			<h3 class='titEdicionCompra'>".$fila['tituloEdicion']."</h3>
			<h3 class='precioCompra'>$".$fila['precio'].",00</h3>
			<input type='submit' id='enviarCompra' name='enviarCompra' value='Comprar'></input><!--BOTON COMPRAR -->
		";
	}
?>

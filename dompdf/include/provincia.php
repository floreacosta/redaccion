<?php
	include_once('../clases/BaseDatos.php');
	
	$pais = $_GET["pais"];
	$bd = new BaseDatos('');
	
	$sql = "
			SELECT *
			FROM provincia 
			WHERE idPais = " . $pais;
			
	$resultado = mysqli_query($bd->getEnlace(), $sql);
	
	echo "<option value=''>Seleccionar</option>";
	
	while($fila = mysqli_fetch_assoc($resultado)){
		echo "<option value='" . $fila["idProvincia"] . "'>" . $fila["nombre"] . "</option>";
	}
?>
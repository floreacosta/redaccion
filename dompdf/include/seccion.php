<?php
	include_once('../clases/BaseDatos.php');

	$idSeccion = $_GET["idSeccion"];
	$idEdicion = $_GET["edicion"];
	
	$bd= new BaseDatos();

	$sql = "
			SELECT NO.volanta, NO.titulo, NO.idNota, SE.nombre nombreSeccion
			FROM nota NO JOIN seccionPorEdicion SPE ON NO.idSeccionPorEdicion=SPE.idSeccionPorEdicion
						 JOIN seccion SE ON SPE.idSeccion=SE.idSeccion
			WHERE NO.idSeccionPorEdicion = ".$idSeccion;

	$resultado = mysqli_query($bd->getEnlace(), $sql);

	if($fila = mysqli_fetch_assoc($resultado)){
		echo"
			<h2>".$fila['nombreSeccion']."</h2>
		";
		do{
			echo"
				<figure class='col'>
					<a href='nota.php?edicion=".$idEdicion."&nota=".$fila['idNota']."'>
						<h3>".$fila['volanta']."</h3>
						<h1>".$fila['titulo']."</h1>
					</a><br>
					<a href='notaPDF.php?edicion=".$idEdicion."&nota=".$fila['idNota']."'>
						exportar a Pdf
					</a>
				</figure>
				
			";
		}while($fila = mysqli_fetch_assoc($resultado));
	}
?>
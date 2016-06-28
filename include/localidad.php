<?php
include_once('../clases/BaseDatos.php');
$provincia = $_GET["provincia"];
$bd= new BaseDatos('localhost', 'root', '', 'dbredaccion');
$sql = "
SELECT * 
FROM localidad 
WHERE idProvincia = " . $provincia;
$resultado = mysqli_query($bd->getEnlace(), $sql);
while($fila = mysqli_fetch_assoc($resultado)){
    echo "<option value='" . $fila["idLocalidad"] . "'>" . $fila["nombre"] . "</option>";
}
?>
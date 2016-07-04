<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		include_once('clases/Usuarios.php');
	?>
	<body>
		<?php include_once('include/header_body.php'); ?>
		
		<section class='perfil content'>
			<a href='perfil_contenidista.php'>Volver a mi perfil</a>
			</br></br></br></br></br></br>
			<?php
			
			$bd=new BaseDatos();
			
			if(isset($_POST['confirmarPublicacion'])){
				
				$idPublicacion=$_POST['idPublicacion'];
				$nombre=$_POST['nombre'];
				$descripcion=$_POST['descripcion'];
				
				$sql="
				UPDATE publicacion
				SET nombre='$nombre', descripcion='$descripcion'
				WHERE idPublicacion=".$idPublicacion;
			    
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			else if(isset($_POST['confirmarEdicion'])){
				
				$idEdicion=$_POST['idEdicion'];
				$titulo=$_POST['titulo'];
				$fecha=$_POST['fecha'];
				$imagen=$_POST['imagen'];
				$precio=$_POST['precio'];
				
				
				$sql="
				UPDATE edicion
				SET tituloEdicion='$titulo', imagenTapaEdicion='$imagen', fecha='$fecha', precio='$precio'
				WHERE idEdicion=".$idEdicion;
			    
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			if(isset($_POST['confirmarSeccion'])){
				
				$idSeccion=$_POST['idSeccion'];
				$nombre=$_POST['nombre'];
				$descripcion=$_POST['descripcion'];
				
				$sql="
				UPDATE seccion
				SET nombre='$nombre', descripcion='$descripcion'
				WHERE idSeccion=".$idSeccion;
			    
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			else if(isset($_POST['crearPublicacion'])){

				$nombre=$_POST['nombre'];
				$descripcion=$_POST['descripcion'];
				$tipo=$_POST['tipo'];
				$emisiones=$_POST['emisiones'];
				
				
				$sql="
				INSERT INTO publicacion (nombre,descripcion,idTipoPublicacion,cantidadEmisionPorMes)
				VALUES ('$nombre', '$descripcion', '$tipo', '$emisiones')";
			    
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			if(isset($_POST['crearEdicion'])){
				
				$idPublicacion=$_POST['idPublicacion'];
				$titulo=$_POST['titulo'];
				$fecha=$_POST['fecha'];
				$imagen=$_POST['imagen'];
				$precio=$_POST['precio'];
				
				
				$sql="
				INSERT INTO edicion (idPublicacion,tituloEdicion,imagenTapaEdicion,fecha,precio)
				VALUES ('$idPublicacion','$titulo','$imagen','$fecha','$precio')";
			    
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			else if(isset($_POST['crearSeccion'])){
				
				$idEdicion=$_POST['idEdicion'];
				$nombre=$_POST['nombre'];
				$descripcion=$_POST['descripcion'];
				
				$sql="
				INSERT INTO seccion (nombre,descripcion)
				VALUES ('$nombre','$descripcion')";
				
				$consulta=mysqli_query($bd->getEnlace(), $sql);
				
				$idSeccion=mysqli_insert_id($bd->getEnlace());
				
				$sql2="
				INSERT INTO seccionPorEdicion (idSeccion,idEdicion)
				VALUES ('$idSeccion','$idEdicion')";
				
				$consulta2=mysqli_query($bd->getEnlace(), $sql2);
	
				if($consulta==false){
					echo"No se pudieron actualizar los datos, vuelva a intentarlo </br></br>";
				}
				else{
					echo"Datos actualizados satisfactoriamente</br></br>";
				}
			}
			
			?>

		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
	
</html>
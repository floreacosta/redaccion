<?php

	class Administrador{	
		
		public function listarUsuariosAdministrativos(){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT UA.idUsuarioAdmin as id_administrativo, UA.nombre, UA.apellido, TUA.nombre as rol, UA.usuario, UA.mail, UA.clave, UA.idEstado as id_estado, ES.descripcion 	as estado
				FROM usuarioadministrativo UA 
                INNER JOIN estado ES on ES.idEstado = UA.idEstado
                INNER JOIN tipousuarioadministrativo TUA on TUA.idTipoUsuarioAdmin = UA.idTipoUsuario
				ORDER BY UA.idUsuarioAdmin";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			echo "<tbody>";
			
			while($administrativo = mysqli_fetch_assoc($consulta)){
				$id_administrativo = $administrativo['id_administrativo'];
				$nombre = $administrativo['nombre'];
				$apellido = $administrativo['apellido'];
				$rol = $administrativo['rol'];
				$usuario = $administrativo['usuario'];
				$mail = $administrativo['mail'];
				$clave = $administrativo['clave'];
				$id_estado = $administrativo['id_estado'];
				$estado = $administrativo['estado'];
				
				echo "<tr id=$id_administrativo>
						<td>$nombre</td>
						<td>$apellido</td>
						<td>$rol</td>
						<td>$usuario</td>
						<td>$mail</td>
						<td>$clave</td>
						<td>$estado</td>
						<td class='btnAccion-td'><button type='submit' id='modifEstado' name='modifEstado' class='modifEstado' onClick='cambiarEstado($id_administrativo,$id_estado)'>w</button></td>
					</tr>";
			}
			
			echo "</tablebody>";	
		}
	
	///////////////////
	public function ABMpublicaciones(){
			$bd = new BaseDatos();
			
			$sql= "SELECT * FROM publicacion";
			$consulta = mysqli_query($bd->getEnlace(), $sql);
			$numeroRegistros = mysqli_num_rows($consulta);
			
			$tamanoPagina = 10;
			
			if (!isset($_GET["pagina"])) {
			   $inicio = 0;
			   $pagina = 1;
			}
			else {
			   $pagina = $_GET["pagina"];
			   $inicio = ($pagina - 1) * $tamanoPagina;
			}
		
			$totalPaginas = ceil($numeroRegistros / $tamanoPagina);
			
			$strSql = "
				SELECT PUB.idPublicacion, PUB.nombre, PUB.descripcion
				FROM publicacion PUB 
				ORDER BY PUB.idPublicacion
				LIMIT $inicio,$tamanoPagina";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($publicacion = mysqli_fetch_assoc($consulta)){
				$idPublicacion = $publicacion['idPublicacion'];
				$nombre = $publicacion['nombre'];
				$descripcion = $publicacion['descripcion'];
				
				echo 
					"
				<tbody>
				<tr>
					<td id='idPublicacion'>$idPublicacion</td>
					<td>$nombre</td>
					<td>$descripcion</td>
					<td class='btnAccion-td'><button type='submit' id='verEdiciones' name='verEdiciones' class='verEdiciones' onClick='ABMEdiciones($idPublicacion)'>E</button></td>			
					<td class='btnAccion-td'><button type='submit' id='modificarPublicacion' name='modificarPublicacion' class='modificarPublicacion' onClick='ABMModificarPublicacion($idPublicacion)'>e</button></td>
					<td class='btnAccion-td' title='Eliminar publicacion'><button type='submit' id='eliminarPub' name='eliminarPub' class='eliminarPub' onClick='ABMEliminarPublicacion($idPublicacion)'>x</button></td>
				</tr>";
			}
			
			echo "</tbody>";
			
			$url="perfil_administrador.php";
			
		
			echo"<div style='background-color:black; width:20%; color:grey; margin:0.5em;'>";
			
			for ($i=1;$i<=$totalPaginas;$i++) {
				if ($pagina == $i){
					echo "&nbsp;&nbsp;".$pagina;
				}
				else{
					echo '<a href="'.$url.'?pagina='.$i.'">&nbsp;&nbsp;'.$i.'</a>';
				}
			}
			
			echo"</div>";
		}
		
	/////////////////////
	public function modificacionPublicacion(){
	if (isset($_GET["idPublicacion"])){
		
		echo 
			"
			<form action='editarContenidoTablas.php' method='post'>
				<table>
					<thead>
						<tr>
							<th data-field='id'>Id de publicación</th>
							<th data-field='name'>Nombre de publicación</th>
							<th data-field='price'>Tipo de publicación</th>
							<th class='btnAccion' data-field='price'></th>
							<th class='btnAccion' data-field='price'></th>
						</tr>
					</thead>";

			
			$strSql = "
				SELECT *
				FROM publicacion 
				WHERE idPublicacion=".$idPublicacion;
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			$nombre = mysqli_query($bd->getEnlace(), $strSql);
			
			$aux=mysqli_fetch_assoc($nombre);
			echo "Modificacion de la publicacion ".$aux['nombre'] ;

			echo "<tablebody>";
			
			while($edicion=mysqli_fetch_assoc($consulta)){
				
				$idEdicion = $edicion['idEdicion'];
				
				echo 
					"
						<tr>
							<td>$idEdicion</td>
							<td><input type='text' id='nombre'></td>
							<td><input type='date' id='fecha'></td>
							<td><input type='text' id='descripcion'></td>
							<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion' onclick='modificarSecciones($idEdicion)'>e</button></td>
							<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion' onclick='mostrarSecciones($idEdicion)' >E</button></td>
						</tr>
					";
			}
					
				echo 
				"
				</tablebody>
				</table>";
				
				//mostrar tabla (que tenga boton ver, borrar y modificar)
			echo "<a href='#' class='altaContenido'>+</a>";
			}
		}
	}
?>
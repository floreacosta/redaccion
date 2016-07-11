<?php
	class Administrador{	
		
		public function listarUsuariosAdministrativos(){
			$bd = new BaseDatos();
			$alta = 1;
			$modificacion = 2;
			$baja = 3;
			$strSql = "
				SELECT UA.idUsuarioAdmin as id_administrativo, UA.nombre, UA.apellido, TUA.nombre as rol, 
				UA.usuario, UA.mail, UA.clave, UA.idEstado as id_estado, ES.descripcion as estado
				FROM usuarioadministrativo UA 
                INNER JOIN estado ES on ES.idEstado = UA.idEstado
                INNER JOIN tipousuarioadministrativo TUA on TUA.idTipoUsuarioAdmin = UA.idTipoUsuario
				ORDER BY UA.idUsuarioAdmin";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($administrativo = mysqli_fetch_assoc($consulta)){
				$id_administrativo = $administrativo['id_administrativo'];
				$nombre = $administrativo['nombre'];
				$apellido = $administrativo['apellido'];
				$rol = $administrativo['rol'];
				$usuario = $administrativo['usuario'];
				$mail = $administrativo['mail'];
				$id_estado = $administrativo['id_estado'];
				$estado = $administrativo['estado'];
				
				echo "<tr>
						<td>$id_administrativo</td>
						<td>$nombre</td>
						<td>$apellido</td>
						<td>$rol</td>
						<td>$usuario</td>
						<td>$mail</td>
						<td id='estado_$id_administrativo'>$estado</td>
<td class='btnAccion-td'><button type='submit' title='Dar de baja usuario' id='modifEstado' name='modifEstado' class='modifEstado' onClick='ABMCambiarEstado($id_administrativo,$id_estado)'>[</button></td>		
<td class='btnAccion-td'><button type='submit' title='Eliminar usuario' id='eliminarUsuario' name='eliminarUsuario' class='eliminarUsuario' onClick='ABMEliminarUsuario($id_administrativo,$baja)'>X</button></td>
					</tr>";
			}
		}
		
		public function listarUsuariosLectores(){
			$bd = new BaseDatos();
			$alta = 1;
			$modificacion = 2;
			$baja = 3;
			$strSql = "
				SELECT UL.idUsuariolector as id_lector, UL.nombre, UL.apellido, UL.usuario, UL.mail
				FROM usuariolector UL 
				ORDER BY UL.idUsuarioLector";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($administrativo = mysqli_fetch_assoc($consulta)){
				$id_lector = $administrativo['id_lector'];
				$nombre = $administrativo['nombre'];
				$apellido = $administrativo['apellido'];
				$usuario = $administrativo['usuario'];
				$mail = $administrativo['mail'];
				
				echo "<tr>
						<td>$id_lector</td>
						<td>$nombre</td>
						<td>$apellido</td>
						<td>$usuario</td>
						<td>$mail</td>	
<td class='btnAccion-td'><button type='submit' title='Eliminar usuario' id='eliminarUsuario' name='eliminarUsuario' class='eliminarUsuario' onClick='ABMEliminarLector($id_lector,$baja)'>X</button></td>
					</tr>";
			}
		}
	/////////////////////////////////
	/////////////////// PUBLICACIONES
	public function ABMpublicaciones(){
			$bd = new BaseDatos();
			$alta = 1;
			$modificacion = 2;
			$baja = 3;
			$visualizar = 0;
			
			
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
				SELECT PUB.idPublicacion, PUB.nombre, PUB.descripcion, PUB.activo
				FROM publicacion PUB 
				ORDER BY PUB.idPublicacion
				LIMIT $inicio,$tamanoPagina";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($publicacion = mysqli_fetch_assoc($consulta)){
				$idPublicacion = $publicacion['idPublicacion'];
				$nombre = $publicacion['nombre'];
				$descripcion = $publicacion['descripcion'];
				$activo = $publicacion['activo'];
				echo 
					"
				<tr>
					<td id='idPublicacion'>$idPublicacion</td>
					<td>$nombre</td>
					<td>$descripcion</td>
					<td id='public_activo_$idPublicacion'>$activo</td>
					<td class='btnAccion-td'><button type='submit' title='Ver ediciones' id='verEdiciones' name='verEdiciones' class='verEdiciones' onClick='ABMMostrarEdiciones($idPublicacion)'>E</button></td>			
		<td class='btnAccion-td'><button type='submit' title='Dar de baja publicacion (con sus ediciones correspondientes)' name='bajaPublicacion'  class='bajaPublicacion'  onClick='ABMDesactivarPublicacion($idPublicacion,$activo)'>[</button></td>
				</tr>";
			}
			
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
	
	}
?>
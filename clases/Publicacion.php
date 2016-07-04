<?php

	class Publicacion{
		
		public function mostrarPublicaciones($topeId){
			
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio
				FROM edicion ED
				ORDER BY ED.idEdicion DESC LIMIT $topeId, 10
			";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($resultado = mysqli_fetch_assoc($consulta)){

				echo"
					<figure class='col'>
						<div class='imgPublicacion'>
							<img src='img/thumbs-publicacion/".$resultado['imagenTapaEdicion']."'/>
						</div>
						<figcaption>
							<div class='titulo'>
								<h4>".$resultado['fecha']."</h4>
								<h3>".$resultado['tituloEdicion']."</h3>
							</div>
							<div class='infoPublicacion'>
								<div class='precioPublicacion'>$".sprintf("%.2f", $resultado['precio'])."</div>
								<div class='comprarPublicacion'>
				";
									$this->mostrarBoton($resultado['idEdicion']);
									
				echo"			</div>
							</div>
						</figcaption>
					</figure>
				";
			}
			echo "<div class='cargarMas noFlote'>";
			if ($topeId > 0){
				echo "<a  href=\"index.php?desde=".($topeId - 10)."#publicaciones\" >Anterior</a> ";//chequear ANCLA
			}
			if ($topeId > 0 && mysqli_num_rows( $consulta ) == 10){
				echo "<h7>| </h7>";
			}
			if (mysqli_num_rows( $consulta ) == 10){
				
				echo "<a href=\"index.php?desde=".($topeId + 10)."#publicaciones\" >Siguiente</a>";
			}
			echo "</div>";
			
		}
		
		public function edicionRandom(){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio, PUB.nombre
				FROM edicion ED JOIN publicacion PUB
					ON PUB.idPublicacion = ED.idPublicacion
				ORDER BY rand() LIMIT 1
			";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			if($edicion = mysqli_fetch_assoc($consulta)){
					
				echo "
					<figure class='columna'>
						<div class='imgPublicacion'>
							<img src='img/thumbs-publicacion/".$edicion['imagenTapaEdicion']."'/>
						</div>
					</figure>
					<figcaption class='columna'>
						<div>
							<h1>".$edicion['nombre']."</h1>
							<h5>Publicada: ".$edicion['fecha']."</h5>
							<p>".$edicion['tituloEdicion']."</p>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$".sprintf("%.2f", $edicion['precio'])."</div>
							<div class='comprarPublicacion'>
				";
							$this->mostrarBoton($edicion['idEdicion']);
				echo "
							</div>
						</div>
					</figcaption>
				";
				//cargar edicon Random
			}
		}		

		public function listarPublicacion(){
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
			
			echo "<tablebody>";
			
			while($publicacion = mysqli_fetch_assoc($consulta)){
				$idPublicacion = $publicacion['idPublicacion'];
				$nombrePublicacion = $publicacion['nombre'];
				$descripcionPublicacion = $publicacion['descripcion'];
				
				echo 
					"
					<tr>
						<td id='idPublicacion'>$idPublicacion</td>
						<td>$nombrePublicacion</td>
						<td>$descripcionPublicacion</td>
						<td class='btnAccion-td'><button type='submit' id='modificar' class='modifPublicacion' onClick='modificarPublicacion($idPublicacion)'>e</button></td>
						<td class='btnAccion-td'><button type='submit' id='verEdiciones' name='verEdiciones' class='verPublicacion' onClick='mostrarEdiciones($idPublicacion)'>E</button></td>
					</tr>";
			}
			
			echo "</tablebody>";
			
			$url="perfil_contenidista.php";
			
		
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
		
		public function listarEdicion($topeId, $idPublicacion){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, ED.precio 
				FROM edicion ED 
				WHERE ED.idPublicacion = $idPublicacion  
				ORDER BY ED.fecha DESC 
				LIMIT $topeId, 10
			";
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			while($edicion = mysqli_fetch_assoc($consulta)){
				$idEdicion = $edicion['idEdicion'];
				$nombreEdicion = $edicion['tituloEdicion'];
				$precioEdicion = $edicion['precio'];
				
				//mostrar tabla (que tenga boton ver, borrar y modificar)
			}
			//boton "agregar"
		}
		
		public function listarSeccion($topeId, $idEdicion){
			$bd = new BaseDatos();

			$strSql = "
				SELECT SEC.idSeccion, SEC.nombre, SEC.descripcion 
				FROM seccion SEC JOIN seccionporedicion SECE ON SECE.idSeccion = SEC.idSeccion
				WHERE SECE.idEdicion = $idEdicion  
				ORDER BY SEC.nombre 
				LIMIT $topeId, 10
			";
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			while($seccion = mysqli_fetch_assoc($consulta)){
				$idSeccion = $seccion['idEdicion'];
				$nombreSeccion = $seccion['nombre'];
				$descripcionSeccion = $seccion['descripcion'];
				
				//no se va a mostrar botones
			}
			//boton "agregar"
		}
		
		public function listarNota($topeId, $idSeccionPorEdicion){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT NO.idNota, NO.titulo, NO.volanta
				FROM nota NO 
				WHERE  NO.idSeccionPorEdicion = $idSeccionPorEdicion 
				ORDER BY ED.titulo DESC
				LIMIT $topeId, 10
		   ";
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			while($nota = mysqli_fetch_assoc($consulta)){
				$idNota = $nota['idNota'];
				$tituloNota = $nota['titulo'];
				$volantaNota = $nota['volanta'];
				
				//mostrar tabla (que tenga boton ver, borrar y modificar)
			}
			//boton "agregar"
		}
		
		public function buscarPublicacion($topeId){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, ED.imagenTapaEdicion, ED.fecha, ED.precio
				FROM edicion ED
				WHERE ED.tituloEdicion LIKE '%".$_GET['search']."%'
				ORDER BY ED.idEdicion LIMIT $topeId, 10
			";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			$encontro = FALSE;
			while($resultado = mysqli_fetch_assoc($consulta)){
			$encontro = TRUE;
				echo"
				<figure class='col'>
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/".$resultado['imagenTapaEdicion']."'/>
					</div>
					<figcaption>
						<div class='titulo'>
							<h4>".$resultado['fecha']."</h4>
							<h3>".$resultado['tituloEdicion']."</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$".sprintf("%.2f", $resultado['precio'])."</div>
							<div class='comprarPublicacion'>
				";
								$this->mostrarBoton($resultado['idEdicion']);
				echo"		</div>
						</div>
					</figcaption>
				</figure>
				";					
			}
			
			if(!$encontro){
				echo"
					<h2 class='noResultados'>No se han encontrado resultados que coincidan con '".$_GET['search']."'.</h2>
				";				
			}
		}
		
		public function edicionesCompradas(){
			if (ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT CO.idCompra,CO.fecha fechaCompra,ED.idEdicion,ED.imagenTapaEdicion,ED.fecha fechaEdicion,ED.tituloEdicion,ED.precio
					FROM Compras CO JOIN Edicion ED ON CO.idEdicion = ED.idEdicion
					WHERE CO.idUsuarioLector = ".$_SESSION['idUsuario']." 
					ORDER BY CO.idCompra DESC
				";
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				while($resultado = mysqli_fetch_assoc($consulta)){
					echo "
						<figure class='col'>
							<p class='numCompra'>N° Compra: ".$resultado['idCompra']."</p>
							<div class='informacion'>
								<img class='tapaRevista' src='img/thumbs-publicacion/".$resultado['imagenTapaEdicion']."'/>
								<div class='informacionEdicion'>
									<p class='fechaEdicion'>".date("d-m-Y", strtotime($resultado['fechaEdicion']))."</p>
									<h3>".$resultado['tituloEdicion']."</h3>
									<a class='verEdicionComprada' href='edicion.php?edicion=".$resultado['idEdicion']."'>Ver edición</a>									
								</div>
							</div>
							<p class='fechaCompra'>Fecha de compra: ".date("d-m-Y", strtotime($resultado['fechaCompra']))."</p>
							<p class='costoCompra'>Precio: $".sprintf("%.2f", $resultado['precio'])."</p>
						</figure>
					";//hay que revisar donde poner el boton de mirar edicion y cambiarle la class
				}
			}
		}
		public function verEdicion($idEdicion){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio, PUB.nombre nombrePublicacion
				FROM edicion ED JOIN publicacion PUB
					ON PUB.idPublicacion = ED.idPublicacion
				WHERE ED.idEdicion=".$idEdicion;

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			if($edicion = mysqli_fetch_assoc($consulta)){
				echo "	<div class='tapaEdicion'>
							<img src='img/thumbs-publicacion/".$edicion['imagenTapaEdicion']."'/>
						</div>
						<figcaption class='columna'>
							<div>
								<h1>".$edicion['nombrePublicacion']."</h1>
								<h5>Publicada: ".$edicion['fecha']."</h5>
								<h2>".$edicion['tituloEdicion']."</h2>
							</div>
				";
				$strSql = "
				SELECT SE.nombre,SPE.idSeccionPorEdicion,SPE.idSeccion
				FROM seccionPorEdicion SPE JOIN seccion SE ON SPE.idSeccion = SE.idSeccion
				WHERE SPE.idEdicion=".$idEdicion;
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
				
				echo "	<div class='secciones'>";
				if ($edicion = mysqli_fetch_assoc($consulta)){
					$primeraSeccion=$edicion['idSeccionPorEdicion'];
					do{
						echo "<span onclick='buscarSeccion(".$edicion['idSeccionPorEdicion'].", ".$idEdicion.");'>".$edicion['nombre']."</span>";
					}while($edicion = mysqli_fetch_assoc($consulta));
					echo"
						<script>
							$( function(){ 
								buscarSeccion($primeraSeccion, $idEdicion);
							});
						</script>
					";
					
				}
				echo "	</div>
						</figcaption>";
				
			}
		}		
		public function suscripcionesCompradas(){
			if (ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
		
				$strSql = "
					SELECT SU.idSuscripcion,SU.fecha,PU.nombre,TS.tiempoEnMeses,SU.precio
					FROM Suscripcion SU JOIN Publicacion PU ON SU.idPublicacion = PU.idPublicacion
										JOIN TiempoSuscripcion TS ON SU.idTiempoSuscripcion = TS.idTiempoSuscripcion
					WHERE SU.idUsuarioLector = ".$_SESSION['idUsuario']." 
					ORDER BY SU.idSuscripcion DESC
				";
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				while($resultado = mysqli_fetch_assoc($consulta)){
					echo "
						<figure class='col'><!-- Item Compra 1 -->
							<p class='numCompra'>N°: ".$resultado['idSuscripcion']."</p>
							<div class='informacion'>
								<div class='informacionEdicion'>
									<h3>".$resultado['nombre']."</h3>
									<a class='verEdicionComprada' href=''>Ver suscripción</a>									
								</div>
							</div>
							<p class='fechaCompra'>Fecha de inicio: ".date("d-m-Y", strtotime($resultado['fecha']))."</p>
							<p class='fechaCompra'>duracion : ".$resultado['tiempoEnMeses']." meses</p>
							<p class='costoSuscripcion'>Precio: $".sprintf("%.2f", $resultado['precio'])."</p>
						</figure>
					";
				}
			}
		}
		
		public function comprarEdicion($idEdicion){
			if (ISSET($idEdicion) && ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
			
				$strSql = "
							INSERT INTO compras(idUsuarioLector,idEdicion,fecha)
							VALUES(".$_SESSION['idUsuario'].",".intval($idEdicion).",'".date("Y/m/d")."');
				";
				
				if(!($resultado = mysqli_query($bd->getEnlace(), $strSql))){
					echo '<script language="javascript">alert("Error al intentar realizar la compra");</script>'; 
				}
			}
		}
		
		public function comprarSuscripcion($idPublicacion, $idTiempoSuscripcion){
			if (ISSET($idPublicacion) && ISSET($idTiempoSuscripcion) &&
				ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
				$bd= new BaseDatos();

				$sqlSql = "
						SELECT ED.precio
						FROM edicion ED 
						WHERE idPublicacion = ".$idPublicacion."
						ORDER BY ED.idEdicion DESC LIMIT 1";
				$consulta = mysqli_query($bd->getEnlace(), $sqlSql);
		
				IF($resultado = mysqli_fetch_assoc($consulta)){
					$precio = $resultado['precio'];
					$sqlSql = "
							SELECT TS.tiempoEnMeses, TS.porcentajeDescuento
							FROM tiemposuscripcion TS
							WHERE idTiempoSuscripcion = ".$idTiempoSuscripcion;	
					
					$consulta = mysqli_query($bd->getEnlace(), $sqlSql);
					
					IF($resultado = mysqli_fetch_assoc($consulta)){
						$porcentaje =floatval($resultado['porcentajeDescuento'] /100);
						$meses = $resultado['tiempoEnMeses'];
						$precio = ((floatval($precio) - ($precio * $porcentaje)) * intval($meses));
						$precio = sprintf("%.2f", $precio);		
						
						$strSql = "
								INSERT INTO suscripcion(idUsuarioLector,idTiempoSuscripcion,idPublicacion,fecha,precio)
								VALUES(".$_SESSION['idUsuario'].",".$idTiempoSuscripcion.",".$idPublicacion.",
									   '".date('Y-m-d')."',".$precio.")
						";
						if(!($resultado = mysqli_query($bd->getEnlace(), $strSql))){
							echo '<script language="javascript">alert("Error al intentar realizar la suscripcion");</script>'; 
						}
					}
				}
			}
		}
		
		public function datosSuscripcion(){
			$bd = new BaseDatos();
	
			$strSql = "
					SELECT idPublicacion, nombre
					FROM publicacion
					ORDER BY nombre 
			";
			
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
		
				echo"<div class='itemsSuscripcion'>
						<label for='suscripcionesDisponibles'>Suscripciones</label>
						<select name='suscripcionesDisponibles' onChange='calcularImporte(this.value,periodoSuscripcion.value)'>
							<option value='' selected>Seleccione opción...</option>";
							while($resultado = mysqli_fetch_assoc($consulta)){
								echo "<option value='".$resultado['idPublicacion']."'>".$resultado['nombre']."</option>";
							}
				echo"	</select>
					</div>
				";	
				$strSql = "
						SELECT idTiempoSuscripcion, tiempoEnMeses, porcentajeDescuento
						FROM tiemposuscripcion
						ORDER BY idTiempoSuscripcion 
				";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
	
				echo"<div class='periodoSuscripcion'>
						<label for='periodoSuscripcion' >Período en meses</label>
						<select name='periodoSuscripcion' onChange='calcularImporte(suscripcionesDisponibles.value,this.value)'>
							<option value='' selected>Seleccione opción...</option>";
							if ($resultado = mysqli_fetch_assoc($consulta)){
								echo "<option value='".$resultado['idTiempoSuscripcion']."'>".sprintf("%02d", $resultado['tiempoEnMeses'])." mes</option>";
								while($resultado = mysqli_fetch_assoc($consulta)){
									echo "<option value='".$resultado['idTiempoSuscripcion']."'>".sprintf("%02d", $resultado['tiempoEnMeses'])." meses</option>";
								}
							}
		
				echo"	</select>
					</div>
				";
			
		}
		public function datosDeNota($idNota){
			if (ISSET($idNota)){
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT NO.titulo, NO.volanta, NO.copete, NO.texto, NO.latitud, 
						   NO.longitud,INO.descripcion imagen,INO.detalleImagen
					FROM nota NO JOIN imagenNota INO ON NO.idNota=INO.idNota
					WHERE NO.idNota = ".$idNota."";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($comprada = mysqli_fetch_assoc($consulta)){
					$datos['titulo'] = $comprada['titulo'];
					$datos['volanta'] = $comprada['volanta'];
					$datos['copete'] = $comprada['copete'];
					$datos['texto'] = $comprada['texto'];
					$datos['imagen'] = $comprada['imagen'];
					$datos['detalleImagen'] = $comprada['detalleImagen'];
					$datos['latitud'] = $comprada['latitud'];
					$datos['longitud'] = $comprada['longitud'];
					$datos['pieNota'] = "Pie de la nota";
					$datos['autor'] = "Autor de Prueba";
					return $datos;
				}
			}
		}
		
		public function mostrarBoton($idEdicion){
			if (ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT 1
					FROM compras 
					WHERE idUsuarioLector = ".$_SESSION['idUsuario']." 
					  AND idEdicion = ".$idEdicion."
				";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($comprada = mysqli_fetch_assoc($consulta)){
					echo "<a class='ver' href='edicion.php?edicion=".$idEdicion."' id='comprar'>Ver</a>
					";//escribir el direccionamiento a la pagina de lectura en onclick y ponerle la clase
				}else{
					$strSql = "
							SELECT idPublicacion, fecha fechaEdicion
							FROM edicion
							WHERE idEdicion = ".$idEdicion."
					";
					$consulta = mysqli_query($bd->getEnlace(), $strSql);
					$mirar = FALSE;
					IF($comprada = mysqli_fetch_assoc($consulta)){
						$fechaEdicion = $comprada['fechaEdicion'];
						$strSql = "
								SELECT SU.fecha fechaSuscripcion, TS.tiempoEnMeses
								FROM suscripcion SU JOIN tiempoSuscripcion TS ON SU.idTiempoSuscripcion=TS.idTiempoSuscripcion
								WHERE SU.idPublicacion = ".$comprada['idPublicacion']."
								  AND su.idUsuarioLector = ".$_SESSION['idUsuario']."
						";
						
						$consulta = mysqli_query($bd->getEnlace(), $strSql);
						
						while($comprada = mysqli_fetch_assoc($consulta)){
							$fechaCompra = $comprada['fechaSuscripcion'];
							$fechaVencimiento = strtotime ( "+".$comprada['tiempoEnMeses']." month" , strtotime ( $fechaCompra ) ) ;
							$fechaVencimiento = date ( 'Y-m-j' , $fechaVencimiento );
							
							if ((date('Y-m-j') > date('Y-m-j',strtotime("$fechaCompra"))) && (date('Y-m-j') <= strtotime("$fechaVencimiento")) ){
								$mirar = TRUE;
							}
						}
					}
					if($mirar == TRUE){
						echo "<a class='ver' href='edicion.php?edicion=".$idEdicion."' id='comprar'>Ver</a>
							";//escribir el direccionamiento a la pagina de lectura en onclick y ponerle la clase
					}else{
						echo "<button class='comprar' value='comprar' onClick='buscaCompra(".$idEdicion.");modalOpenCompra()' id='comprar'>Comprar</button> 
						";//escribir el direccionamiento a la pagina modal de compra	
					}
				}
			}else{
				echo "<button class='comprar' id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Comprar</button>
				";
			}
		}
	}

?>
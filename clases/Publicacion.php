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

		public function listarPublicacion($topeId, $tipo){
			$bd = new BaseDatos();
			
			$strSql = "
				SELECT PUB.idPublicacion, PUB.nombre, PUB.descripcion
				FROM publicacion PUB 
				ORDER BY PUB.idPublicacion
				LIMIT $topeId, 10 
			";
			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			while($publicacion = mysqli_fetch_assoc($consulta)){
				$idPublicacion = $publicacion['idPublicacion'];
				$nombrePublicacion = $publicacion['nombre'];
				$descripcionPublicacion = $publicacion['descripcion'];
				
				//mostrar tabla (que tenga boton ver, borrar y modificar)
			}
			//boton "agregar"
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
		
		public function buscarEdicion($topeId){
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
		public function mostrarBoton($idEdicion){
			if (ISSET($_SESSION['usuariolector']) && ISSET($_SESSION['idUsuario'])){
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT 1 
					FROM Compras
					WHERE idUsuarioLector = ".$_SESSION['idUsuario']." 
					  AND idEdicion = ".$idEdicion."
				";

				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($comprada = mysqli_fetch_assoc($consulta)){
					echo "<a class='ver' href='edicion.php?edicion=".$idEdicion."' id='comprar'>Ver</a>
					";//escribir el direccionamiento a la pagina de lectura en onclick y ponerle la clase
				}else{
					echo "<button class='comprar' value='comprar' onClick='buscaCompra(".$idEdicion."); modalOpenCompra();' id='comprar'>Comprar</button> 
					";//escribir el direccionamiento a la pagina modal de compra	
				}
			}else{
				echo "<button class='comprar' id='lector' name='lector' value='lector' onClick='modalOpenLector();'>Comprar</button>
				";
			}
		}
	}

?>
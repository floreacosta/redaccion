<?php

	class Publicacion{
		
		public function mostrarPublicaciones($topeId){
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio
				FROM edicion ED
				ORDER BY ED.idEdicion LIMIT $topeId, 10
			";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($resultado = mysqli_fetch_assoc($consulta)){
				$_SESSION['idEdicion'] = $resultado['idEdicion'];
				$_SESSION['imagenTapaEdicion'] = $resultado['imagenTapaEdicion'];
				$_SESSION['fechaEdicion'] = $resultado['fecha'];
				$_SESSION['tituloEdicion'] = $resultado['tituloEdicion'];
				$_SESSION['precioEdicion'] = $resultado['precio'];
				
				echo"
				<figure class='col'>
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/".$_SESSION['imagenTapaEdicion']."'/>
					</div>
					<figcaption>
						<div class='titulo'>
							<h4>".$_SESSION['fechaEdicion']."</h4>
							<h3>".$_SESSION['tituloEdicion']."</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$".$_SESSION['precioEdicion'].".00</div>
							<div class='comprarPublicacion'>
								<a class='comprar' href='comprar.php?idEdicion=".$_SESSION['idEdicion']."'>Comprar</a>
							</div>
						</div>
					</figcaption>
				</figure>
				";
			}
		}
		
		public function publicacionRandom(){
			//traer una publicacion random para Index.
		}
		
		public function listarPublicacion($topeId, $tipo){
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			
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
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			
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
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');

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
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			
			$strSql = "
				SELECT NO.idNota, NO.titulo, NO.volanta
				FROM nota NO JOIN 
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
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			
			$strSql = "
				SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio
				FROM edicion ED
				WHERE ED.tituloEdicion LIKE '%".$_GET['search']."%'
				ORDER BY ED.idEdicion LIMIT $topeId, 10
			";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			$encontro = FALSE;
			while($resultado = mysqli_fetch_assoc($consulta)){
				$encontro = TRUE;
				$_SESSION['idEdicion'] = $resultado['idEdicion'];
				$_SESSION['imagenTapaEdicion'] = $resultado['imagenTapaEdicion'];
				$_SESSION['fechaEdicion'] = $resultado['fecha'];
				$_SESSION['tituloEdicion'] = $resultado['tituloEdicion'];
				$_SESSION['precioEdicion'] = $resultado['precio'];
				echo"
				<figure class='col'>
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/".$_SESSION['imagenTapaEdicion']."'/>
					</div>
					<figcaption>
						<div class='titulo'>
							<h4>".$_SESSION['fechaEdicion']."</h4>
							<h3>".$_SESSION['tituloEdicion']."</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$".$_SESSION['precioEdicion'].".00</div>
							<div class='comprarPublicacion'>
								<a class='comprar' href='comprar.php?idEdicion=".$_SESSION['idEdicion']."'>Comprar</a>
							</div>
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
		
	}

?>
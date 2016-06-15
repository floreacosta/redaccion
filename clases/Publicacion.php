<?php

	class Publicacion{
		
		public function mostrarPublicaciones($topeId){
			$bd = new BaseDatos('localhost', 'root', '', 'dbredaccion');
			$strSql = "SELECT ED.idEdicion, ED.tituloEdicion, Ed.imagenTapaEdicion, ED.fecha, ED.precio
					   FROM edicion ED
					   WHERE ED.idEdicion >= ".$topeId." AND ED.idEdicion < ".($topeId + 10)." ORDER BY ED.idEdicion";

			$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
			while($resultado = mysqli_fetch_assoc($consulta)){
				echo"
				<figure>
					<div class='imgPublicacion'>
						<img src='img/thumbs-publicacion/".$resultado['imagenTapaEdicion']."'/>
					</div>
					<figcaption>
						<div>
							<h4>".$resultado['fecha']."</h4>
							<h3>".$resultado['tituloEdicion']."</h3>
						</div>
						<div class='infoPublicacion'>
							<div class='precioPublicacion'>$".$resultado['precio'].".00</div>
							<div class='comprarPublicacion'>
								<button class='comprar' value='comprar' id='comprar'>Comprar</button>
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
		
		
	}

?>
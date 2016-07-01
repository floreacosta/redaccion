<?php
	
	class Administrador{	
	private $admin;

		public function fechasConsultaEdiciones($fecha1, $fecha2){
			
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT SUM(ED.precio), ED.tituloEdicion FROM Edicion ED
					INNER JOIN Compras CO 	  ON CO.idEdicion	  = ED.idEdicion
					WHERE CO.fecha 			  BETWEEN $fecha1 AND $fecha2
					GROUP BY ED.idEdicion;
				";
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					echo "
						
					";
				}
			}
			
			public function fechasSuscripcionesPorDia($fecha1, $fecha2){
			
				$bd = new BaseDatos();
			
				$strSql = "
					SELECT SU.fecha, count(SU.fecha) FROM Suscripcion SU
					WHERE SU.fecha 			  BETWEEN '1990-01-01' AND '2017-01-01'
					GROUP BY SU.fecha;
				";
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
			
				if($resultado = mysqli_fetch_assoc($consulta)){
					echo "
						
					";
				}
			}
		}	
	
?>
<?php 
		if(isset($_POST['form_compras'])){
			if(isset($_POST['fecha1']) && isset($_POST['fecha1'])){		
				include_once('clases/BaseDatos.php');
				$fecha1 = $_POST['fecha1'];
				$fecha2 = $_POST['fecha2'];
				$bd = new BaseDatos();
				
				$strSql = 	"SELECT ED.tituloEdicion AS titulo, SUM(ED.precio) AS ganancias FROM edicion ED
							INNER JOIN Compras CO ON CO.idEdicion = ED.idEdicion
							WHERE CO.fecha BETWEEN '$fecha1' AND '$fecha2'
							GROUP BY ED.idEdicion";

				$resultado = mysqli_query($bd->getEnlace(), $strSql);
				$table = array();
				$table['cols'] = array(
					array('label' => 'Titulo de edicion', 'type' => 'string'),
					array('label' => 'Ganancias', 'type' => 'number')
				); 

				$rows = array();
				foreach($resultado as $row){
						$temp = array();
						$temp[] = array('v' => (string) $row['titulo']);
						$temp[] = array('v' => (int) $row['ganancias']); 
						$rows[] = array('c' => $temp);
				}

				$table['rows'] = $rows;
				$jsonTable = json_encode($table, true);
			}
		}
		
		if(isset($_POST['form_suscripciones'])){
			if(isset($_POST['fecha1']) && isset($_POST['fecha1'])){		
				include_once('clases/BaseDatos.php');
				$fecha1 = $_POST['fecha1'];
				$fecha2 = $_POST['fecha2'];
				$bd = new BaseDatos();
				
				$strSql = 	"SELECT  SU.fecha AS fecha, count(SU.fecha) AS suscripciones FROM Suscripcion SU
							WHERE SU.fecha BETWEEN '$fecha1' AND '$fecha2'
							GROUP BY SU.fecha";

				$resultado = mysqli_query($bd->getEnlace(), $strSql);
				$table = array();
				$table['cols'] = array(
					array('label' => 'Fecha', 'type' => 'string'),
					array('label' => 'Cant. de suscripciones', 'type' => 'number')
				); 

				$rows = array();
				foreach($resultado as $row){
						$temp = array();
						$temp[] = array('v' => (string) $row['fecha']);
						$temp[] = array('v' => (int) $row['suscripciones']); 
						$rows[] = array('c' => $temp);
				}

				$table['rows'] = $rows;
				$jsonTable2 = json_encode($table, true);				
			}
		} 

?>
		<script type="text/javascript">
		google.load('visualization', '1', {'packages':['corechart']});
		<?php if(isset($jsonTable)){
		echo "google.setOnLoadCallback(dibujar);";
		} ?>
		function dibujar() {
	 
		  var data = new google.visualization.DataTable(<?=$jsonTable?>);
		  var opciones = {
				title: 'Ganancias obtenidas en el periodo del <?=$fecha1?> hasta <?=$fecha2?>(por edicion) ',
				backgroundColor: '#B5B5B5',
				is3D: true};
			
			var chart = new google.visualization.PieChart(document.getElementById('grafico1'));
			chart.draw(data, opciones);
		}
		</script>
		<script type="text/javascript">
		<?php if(isset($jsonTable2)){
		echo "google.setOnLoadCallback(dibujar2);";
		} ?>
		google.load('visualization', '1', {'packages':['corechart']});
		google.setOnLoadCallback(dibujar2);

		function dibujar2() {
	 
		  var data = new google.visualization.DataTable(<?=$jsonTable2?>);
		  var opciones = {
				title: 'Nuevos suscriptores en el periodo del <?=$fecha1?> hasta <?=$fecha2?> (por día)',
				backgroundColor: '#B5B5B5',
				is3D: true};
			
			var chart = new google.visualization.BarChart(document.getElementById('grafico2'));
			chart.draw(data, opciones);
		}
		</script>


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
?>	

<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
 
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(dibujar);

    function dibujar() {
 
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var opciones = {
			title: 'Nuevos suscriptores en el periodo ingresado (por día)',
			width: 1400,
			height: 650,
			backgroundColor: '#B5B5B5',
			is3D: true};
		
		var chart = new google.visualization.PieChart(document.getElementById('grafico'));
		chart.draw(data, opciones);
	}
    </script>
  </head>
 
  <body>

<div id="grafico" style="width: 100%;"></div>
  </body>
</html>

		
		google.load('visualization', '1.0', {'packages':['corechart']});

	function grafico_compras() {
			
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Publicación');
		data.addColumn('number', 'Ganancias (en pesos)');
		data.addRows([
		['Revista "Gente"', 350],
		['Diario "La Nacion"', 180],
		['Revista "Caras"', 550],
		['Diario "Popular"', 240],
		]);

		var opciones = {'title':'Porcentaje de ganancias de cada publicacion (de FECHA1 a FECHA2)',
		'width':400,
		'height':350,
		'is3D':true};
		
		var chart = new google.visualization.PieChart(document.getElementById('grafico_compras'));
		chart.draw(data, opciones);
	}
	function grafico_suscripciones() {
			
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Dia');
		data.addColumn('number', 'Cantidad');
		data.addRows([
		['Dia 1', 5],
		['Dia 2', 9],
		['Dia 3', 4],
		]);

		var opciones = {'title':'Cantidad de ventas (por dia)',
		'width':400,
		'height':350,
		'is3D':true};
		
		var chart = new google.visualization.BarChart(document.getElementById('grafico_suscripciones'));
		chart.draw(data, opciones);
	}
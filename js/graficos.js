			google.load("visualization", "1", {packages:["corechart"]});
			google.setOnLoadCallback(grafico_compras);

		function grafico_compras(){	
		
		var jsonData = $.ajax({
		url: "perfil_administrador.php",
		dataType: "json",
		async: false}).responseText;
		
		var data = new google.visualization.DataTable(jsonData);
			var opciones = {
			title: 'Nuevos suscriptores en el periodo ingresado (por día)',
			width: 1200,
			height: 650,
			backgroundColor: '#B5B5B5',
			is3D: true};
			
			var chart = new google.visualization.BarChart(document.getElementById('grafico'));
			
			chart.draw(data, opciones);
		}	
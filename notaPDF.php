<?php
	require_once("dompdf/dompdf_config.inc.php");
	include_once('clases/BaseDatos.php');
	include_once('clases/Publicacion.php');
	$publicacion = new Publicacion();
	if (ISSET($_GET['nota']) && $_GET['nota'] != ""){
		$datos = $publicacion->datosDeNota($_GET['nota']);
	}else{
		header('Location: error.php');
	}
	$html =
		"<html>
			<body>
				<div class='nota'>
			
				<h3>".$datos['volanta']."</h3>
				<h1>".$datos['titulo']."</h1>
				<h2>".$datos['copete']."</h2>
				
				<figure class='imagenNota'>
					<img src=\"img/imagenNota/".$datos['imagen']."\" align='center' width='700' height='400'/>
					<figcaption>".$datos['detalleImagen']."</figcaption>
				</figure>
				
				<span class='autor'>Por <i>".$datos['autor']."</i></span>
				
				<div class='textoNota'>
					".$datos['texto']."
				</div>
				
				
				<figcaption>".$datos['pieNota']."</figcaption></br></br>
				
				<div class='ubicacionNota'>
					Ubicación de la nota: 
					<div id='map_canvas' style='width:450px;height:300px;'></div>
					<form>
						<input id='lat' type='hidden' name='latitud' value=\"".$datos['latitud']."\" />
						<input id='long' type='hidden' name='longitud' value=\"".$datos['longitud']."\"/>
					</form>
				</div>

			</div>
			</body>
		</html>";
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();
	$dompdf->stream($datos['titulo'].".pdf");
?>

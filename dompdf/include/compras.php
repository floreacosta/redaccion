<?php
	include_once('../clases/BaseDatos.php');
	require_once('../lib/mercadopago.php');

	$mp = new MP("3811094535663834", "RVMibY1jQ4a15JSMX4xelFXP3kvqjmVx");
	
	$idEdicion = $_GET["idEdicion"];
	$bd= new BaseDatos();
	
	$sql = "
			SELECT ED.tituloEdicion, ED.precio, ED.imagenTapaEdicion, PU.nombre, TI.descripcion
			FROM edicion ED
				JOIN publicacion PU
					ON ED.idPublicacion = PU.idPublicacion
				JOIN tipopublicacion TI
					ON PU.idTipoPublicacion = TI.idTipoPublicacion
			WHERE idEdicion = ".$idEdicion;
	$resultado = mysqli_query($bd->getEnlace(), $sql);

	if($fila = mysqli_fetch_assoc($resultado)){
		$idEdicion = sprintf("%03d", $idEdicion);
		$precio = $fila['precio'];
		$imagenTapa = "/img/thumbs-publicacion/".$fila['imagenTapaEdicion'];
		
		$preference_data = array(
			"items" => array(
				array(
					"title" => $fila['tituloEdicion'],
					"currency_id" => "ARS",
					"picture_url" => $imagenTapa,
					"description" => $fila['nombre'],
					"category_id" => $fila['descripcion'],
					"quantity" => 1,
					"unit_price" => (int)$precio
				)
			)
		);
		
		$preference = $mp->create_preference($preference_data);

		echo"
			<form action='index.php' method='POST' enctype='multipart/form-data' class='modalCompra'><!-- CUANDO EXPLIQUEN MERCADO PAGO SE QUITA EL FORM PARA DEJAR MP -->
				<a href='#' onClick='modalCloseCompra();'>x</a><!-- CUANDO SE BORRE EL FORM, QUEDA ESTE A FUERA -->
				<div class='in' id='compraArealizar'><!-- CUANDO SE BORRE EL FORM, QUEDA ESTE DIV FUERA -->
					<h2>Compra</h2>
					<input type='text id='numEdicion' name='numEdicion' value='".$idEdicion."' hidden/>
					<h3 class='numEdicionCompra'>Edición n°: ".$idEdicion."'</h3>
					<h3 class='titEdicionCompra'>'".$fila['tituloEdicion']."'</h3>
					<h3 class='precioCompra'>$".$fila['precio']."</h3>
					<input type='text' name='linkMercadoPago' value='".$preference['response']['init_point']."' hidden/>
					<input type='submit' id='enviarCompra' name='enviarCompra' value='Pagar con Mercado Pago'></input><!--BOTON COMPRAR -->
				</div>
			</form>
		";
	}
	
//<a class='lightblue-M-Ov-ArAll' mp-mode='modal' href='".$preference['response']['init_point']."' name='MPCheckout' onreturn='execute_my_onreturn'>Pagar</a>
	
//VENDEDOR: id:220658189; nickname:TT584039; password:qatest8040; email:test_user_90633126@testuser.com

//COMPRADOR: id:220663084; nickname:TETE3346398; password:qatest5173; email:test_user_19027174@testuser.com
?>



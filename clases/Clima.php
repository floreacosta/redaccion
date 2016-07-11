<?php 
	include_once("BaseDatos.php");
	
	class Clima{	
		
	public function mostrarClima(){
		
		if (ISSET($_SESSION['idUsuario'])){
			
				if(ISSET($_SESSION['usuariolector'])){
					$tablaUsuario = "usuariolector";
					$campoId ="idUsuarioLector";
				}else if(ISSET($_SESSION['usuarioadministrativo'])){
					$tablaUsuario = "usuarioadministrativo";
					$campoId = "idUsuarioAdmin";
				}
				$bd = new BaseDatos();
				
				$strSql = " SELECT PA.nombre FROM pais PA
							INNER JOIN $tablaUsuario UL ON UL.idPais = PA.idPais
							WHERE UL.$campoId = $_SESSION[idUsuario]
				";
				
				$consulta = mysqli_query($bd->getEnlace(), $strSql);
				$resultado = mysqli_fetch_assoc($consulta);
		}

		if(!ISSET($resultado['nombre'])){
		$ciudad = 'Argentina';
		}else{
		$ciudad = $resultado['nombre'];
		}
		$tabla_clima = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$ciudad."&APPID=883c8aa86a0dad985c8293062000f8c3");
		$datos_clima = json_decode($tabla_clima);
		$temp   = $datos_clima->main;
		$temp_c = $temp->temp - 273.15;
		$estado_cielo = $datos_clima->weather[0]->main;
		$img = $datos_clima->weather[0]->icon;

		switch($estado_cielo){

			case 'Thunderstorm':	
					$estado_actual = 'Tormenta';
					break;
						
			case 'Clear':
					$estado_actual = 'Despejado';
					break;
					
			case 'Clouds':
					$estado_actual = 'Nublado';
					break;
					
			case 'Drizzle':
					$estado_actual = 'Llovizna';
					break;
					
			case 'Rain':
					$estado_actual = 'Lluvia';
					break;
					
			case 'Snow':
					$estado_actual = 'Nieve';
					break;
			}

		echo "<p>El clima actual en $ciudad es el siguiente:</p>";
		echo '<div id="img_clima" style="width: 50px; height: 50px;"><img src="http://openweathermap.org/img/w/'.$img.'.png"></div>';
		echo  "$estado_actual";
		echo "<br></br>";
		echo "La temperatura es: ".$temp_c."°C\n";
	}
}
?>
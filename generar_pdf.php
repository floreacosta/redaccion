<?php 	
		include_once('clases/BaseDatos.php');
		include_once('include/fpdf.php');
		
		$pdf=new PDF('L','mm','Letter'); // vertical, milimetros y tamaño
		$pdf->Open();
		$pdf->AddPage(); // agregamos la pagina
		$pdf->SetMargins(20,20,20); // definimos los margenes en este caso estan en milimetros
		$pdf->Ln(10); // dejamos un pequeño espacio de 10 milimetros
		
		if(isset($_POST['tipoListado'])){
		
				if($_POST['tipoListado'] == 1){
				
					$bd = new BaseDatos();
					
					$strSql = 	"SELECT idCompra, UL.nombre, UL.apellido, ed.tituloEdicion as Titulo, CO.fecha, ED.precio from compras CO
								INNER JOIN usuariolector UL ON UL.idUsuarioLector = CO.idUsuarioLector
								INNER JOIN edicion		 ED ON CO.idEdicion = ED.idEdicion";

					$resultado = mysqli_query($bd->getEnlace(), $strSql);
					$cantidadfilas = mysqli_num_rows($resultado);
					
					
					
					
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
	////////////////////////////////////////
				if($_POST['tipoListado'] == 2){

					$bd = new BaseDatos();
					
					$strSql = 	"SELECT SU.idSuscripcion as ID, UL.nombre, UL.apellido, SU.idTiempoSuscripcion AS 'Tiempo de suscrip. en meses', PU.nombre, SU.fecha, SU.precio
								FROM suscripcion SU
								INNER JOIN usuariolector UL on UL.idUsuarioLector = SU.idUsuarioLector
								INNER JOIN publicacion	 PU on PU.idPublicacion	  = SU.idPublicacion";

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
	////////////////////////////////////////
				if($_POST['tipoListado'] == 3){
	
					$bd = new BaseDatos();
					
					$strSql = 	"SELECT idUsuarioAdmin,apellido,nombre,fechaNacimiento,calle,numero,telefono,mail,usuario,clave 
								FROM usuarioadministrativo
								WHERE idTipoUsuario = 1;";

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
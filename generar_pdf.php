<?php 	
		include_once('clases/BaseDatos.php');
		require_once('class.ezpdf.php');
		$pdf = new Cezpdf('A4');
		$pdf->selectFont('font/Helvetica.afm');
		$pdf->ezSetCmMargins(1.5,1.5,1.5,1.5);
		
		if(isset($_POST['tipoListado'])){
		
				if($_POST['tipoListado'] == 1){
				
					$bd = new BaseDatos();
					
					$strSql = 	"SELECT idCompra AS Id, UL.nombre AS Nombre, UL.apellido AS Apellido, ed.tituloEdicion as 'Edicion adquirida', CO.fecha AS Fecha, ED.precio AS Precio from compras CO
								INNER JOIN usuariolector UL ON UL.idUsuarioLector = CO.idUsuarioLector
								INNER JOIN edicion		 ED ON CO.idEdicion = ED.idEdicion";

					$resultado = mysqli_query($bd->getEnlace(), $strSql);
					$cantidadfilas = mysqli_num_rows($resultado);
					
					while($row= mysqli_fetch_row($resultado)){
				   
				   $data[]=array('Id'=>$row[0], 'Nombre'=>$row[1],'Apellido'=>$row[2],'Edicion adquirida'=>$row[3],'Fecha'=>$row[4],'Precio'=>$row[5]);
					}
					
					$titles=array('Id'=>'Id', 'Nombre'=>'Nombre','Apellido'=>'Apellido','Edicion adquirida'=>'Edicion adquirida','Fecha'=>'Fecha','Precio'=>'Precio');
					
					$titulo = 'Lista de compras';
					$pdf->ezText($titulo, 12);
					$pdf->ezText('\n', 10);
					$pdf->ezTable($data, $titles);
					$pdf->ezText('\n\n\n', 10);
					$pdf->ezText('Fecha: '.date('d/m/Y'), 10);
					$pdf->ezText('Hora: '.date('H:i:s').'\n\n', 10);
					$pdf->ezStream();
				}
	////////////////////////////////////////
				if($_POST['tipoListado'] == 2){

					$bd = new BaseDatos();
					
					$strSql = 	"SELECT SU.idSuscripcion as Id, UL.nombre AS Nombre, UL.apellido AS Apellido, SU.idTiempoSuscripcion AS 'Tiempo de suscrip', PU.nombre AS 'Nombre publicacion', SU.fecha AS Fecha, SU.precio AS Precio
								FROM suscripcion SU
								INNER JOIN usuariolector UL on UL.idUsuarioLector = SU.idUsuarioLector
								INNER JOIN publicacion	 PU on PU.idPublicacion	  = SU.idPublicacion";

					$resultado = mysqli_query($bd->getEnlace(), $strSql);
					$cantidadfilas = mysqli_num_rows($resultado);
					
					while($row= mysqli_fetch_row($resultado)){
				   
				   $data[]=array('Id'=>$row[0], 'Nombre'=>$row[1],'Apellido'=>$row[2],'Tiempo de suscrip'=>$row[3],'Nombre publicacion'=>$row[4],'Fecha'=>$row[5],'Precio'=>$row[6]);
					}
					
					$titles=array('Id'=>'Id', 'Nombre'=>'Nombre','Apellido'=>'Apellido','Tiempo de suscrip'=>'Tiempo de suscrip','Nombre publicacion'=>'Nombre publicacion','Fecha'=>'Fecha','Precio'=>'Precio');
					
					$titulo = 'Lista de suscripciones';
					$pdf->ezText($titulo, 12);
					$pdf->ezText('\n', 10);
					$pdf->ezTable($data, $titles);
					$pdf->ezText('\n\n\n', 10);
					$pdf->ezText('Fecha: '.date('d/m/Y'), 10);
					$pdf->ezText('Hora: '.date('H:i:s').'\n\n', 10);
					$pdf->ezStream();
				}
	////////////////////////////////////////
				if($_POST['tipoListado'] == 3){

					$bd = new BaseDatos();
					
					$strSql = 	"SELECT idUsuarioAdmin as Id,nombre as Nombre,apellido as Apellido,fechaNacimiento AS 'Fecha de nacimiento',calle AS Calle,numero AS Numero,telefono AS Tel,mail AS Mail,usuario AS Usuario,clave AS Clave
								FROM usuarioadministrativo
								WHERE idTipoUsuario = 1;";

					$resultado = mysqli_query($bd->getEnlace(), $strSql);
					$cantidadfilas = mysqli_num_rows($resultado);
					
					while($row= mysqli_fetch_row($resultado)){
				   
				   $data[]=array('Id'=>$row[0], 'Nombre'=>$row[1],'Apellido'=>$row[2],'Fecha de nacimiento'=>$row[3],'Calle'=>$row[4],'Numero'=>$row[5],'Tel'=>$row[6],'Mail'=>$row[7],'Usuario'=>$row[8],'Clave'=>$row[9]);
					}
					
					$titles=array('Id'=>'Id', 'Nombre'=>'Nombre','Apellido'=>'Apellido','Fecha de nacimiento'=>'Fecha de nacimiento','Calle'=>'Calle','Numero'=>'Numero','Tel'=>'Tel','Mail'=>'Mail','Usuario'=>'Usuario','Clave'=>'Clave');
					
					$titulo = 'Lista de redactores';
					$pdf->ezText($titulo, 12);
					$pdf->ezText('\n', 10);
					$pdf->ezTable($data, $titles);
					$pdf->ezText('\n\n\n', 10);
					$pdf->ezText('Fecha: '.date('d/m/Y'), 10);
					$pdf->ezText('Hora: '.date('H:i:s').'\n\n', 10);
					$pdf->ezStream();
				}		
		}
			
?>	
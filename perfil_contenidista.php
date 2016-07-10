<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
		include_once('clases/Usuarios.php');
	?>
	
	<body>
		<?php include_once('include/header_body.php'); ?>
		
		<section class='perfil content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_contenidista.php'>perfil de Usuario</a> 
			</div>
			
			<div class='perfil'><a name="salida_graficos"></a>
				<?php 
					$usuario = new Usuarios();
					$usuario->encabezadoPerfil();
				?>
			</div>
			
			<div class='tablasABM'>
				<h2>Panel de control</h2>
				<h3>Alta / Baja / Modificación</h3>

				<div id='publicaciones' class='tablasABM'>
					<h4>&nbsp;&nbsp;Publicaciones</h4>
					<div id="modificarPublicacion" style='display:none; margin:0.5em;'></div>
					
					<div id="crearPublicacion" style='display:none; margin:0.5em;'>
					Crear nueva publicación
					<a id='crearPublicacionAncla' name='crearNotaAncla'></a>
					<form action='confirmarEdicionContenidista.php' method='post'>
					
						<table>
							<thead>
								<tr>
									<th data-field='name'>Nombre de publicación</th>
									<th data-field='price'>Descipción</th>
									<th data-field='price'>Tipo</th>
									<th data-field='price'>Emisiones por mes</th>
									<th class='btnAccion' data-field='price'></th>
									<th class='btnAccion' data-field='price'></th>
								</tr>
								<tr> 
									<td><input title='Solo se admiten letras y números' type='text' name='nombre' placeholder='nombre de la publicación' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,60}' required/></td>
									<td><textarea title='Solo se admiten letras y números' type='text' name='descripcion' placeholder='Descipción de la publicación' pattern='[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{2,140}' required></textarea></td>
									<td>
										<select name='tipo'>
											<option value='1'>Revista</option>
											<option value='2'>Diario</option>
										</select>
									</td>
									<td><input type='number' name='emisiones'/></td>
									<td class='btnAccion-td'><button type='submit' id='crearPublicacion' name='crearPublicacion'>%</button></td>
									<td class='btnAccion-td'><button type='button' id='cancelar' onClick='ocultarCrearPublicacion()'>x</button></td>
								</tr>
							</thead>
						</table>
					</form>
					
					
					</div>
					
					
					<table>
						<thead>
							<tr>
								<th data-field="id">Id de publicación</th>
								<th data-field="name">Nombre de publicación</th>
								<th data-field="price">Tipo de publicación</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>

	
						<?php
							$publicaciones=new Publicacion();
							$publicaciones->listarPublicacion();
						?>
						
					</table>
					<a href='#' class='altaContenido'onClick='mostrarCrearPublicacion()'>+</a>
				</div>
				
				<div id='ediciones' class='tablasABM' style='display:none;'>
			    
				</div>
				
				<div id='secciones' class='tablasABM' style='display:none;'>
			    
				</div>
				
				<div id='notas' class='tablasABM' style='display:none;'>
			
				</div>
				
				<div id='mostrarNota' class='tablasABM' style='display:none;'>
				
				</div>
				
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>

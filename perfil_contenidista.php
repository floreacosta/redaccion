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
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_lector.php'>Perfil de usuario</a></p>
			</div>
			
			<div class='perfil'>
				<?php 
					$usuario = new Usuarios();
					$usuario->encabezadoPerfil();
				?>
			</div>
			
			<div class='tablasABM'>
				<h2>Panel de control</h2>
				<h3>Alta / Baja / Modificación</h3>

				<div class='publicacionABM'>
					<h4>Publicaciones</h4>
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

						<tbody>
							<tr><!-- ITEM -->
								<td>Alvin</td>
								<td>Eclair</td>
								<td>$0.87</td>
								<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Alan</td>
								<td>Jellybean</td>
								<td>$3.76</td>
								<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
								<td class='btnAccion-td'><button type='submit' name='modifPublicacion' class='modifPublicacion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
						</tbody>
					</table>
					<a href='#' class='altaContenido'>+</a>
				</div>
				
				<div class='edicionABM'>
					<h4>Ediciones de la publicación <i>"Genios"</i></h4>
					<table>
						<thead>
							<tr>
								<th data-field="id">Id de edición</th>
								<th data-field="name">Título de edición</th>
								<th data-field="price">Fecha edición</th>
								<th data-field="price">Secciones</th>
								<th data-field="price">Precio</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>1</td>
								<td>Eclair</td>
								<td>Eclair</td>
								<td>Cultura | Deportes | Ciencia | Humor</td>
								<td>$0.87</td>
								<td class='btnAccion-td'><button type='submit' name='modifEdicion' class='modifEdicion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>2</td>
								<td>Alan</td>
								<td>Jellybean</td>
								<td>Deportes | Ciencia | Humor</td>
								<td>$3.76</td>
								<td class='btnAccion-td'><button type='submit' name='modifEdicion' class='modifEdicion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>3</td>
								<td>Lollipop</td>
								<td>Lollipop</td>
								<td>Cultura | Ciencia | Humor</td>
								<td>$7.00</td>
								<td class='btnAccion-td'><button type='submit' name='modifEdicion' class='modifEdicion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
						</tbody>
					</table>
					<a href='#' class='altaContenido'>+</a>
				</div>

				<div class='seccionABM'>
					<h4>Secciones de la edicion <i>N° 001, "Ilustradores Argentinos"</i> de la publicación <i>"Genios"</i></h4>
					<table>
						<thead>
							<tr>
								<th data-field="id">Id de sección</th>
								<th data-field="price">Sección</th>
								<th data-field="price">Descripción</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>1</td>
								<td>Humor</td>
								<td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td class='btnAccion-td'><button type='submit' name='modifSeccion' class='modifSeccion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verSeccion' class='verSeccion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>2</td>
								<td>Deportes</td>
								<td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td class='btnAccion-td'><button type='submit' name='modifSeccion' class='modifSeccion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verSeccion' class='verSeccion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>3</td>
								<td>Ciencia</td>
								<td><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td class='btnAccion-td'><button type='submit' name='modifSeccion' class='modifSeccion'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verSeccion' class='verSeccion'>E</button></td>
							</tr>
						</tbody>
					</table>
					<a href='#' class='altaContenido'>+</a>
				</div>

				<div class='notaABM'>
					<h4>Notas de la sección <i>"Ciencia"</i>, edición <i>N° 001, "Ilustradores Argentinos"</i> de la publicación <i>"Genios"</i></h4>
					<table>
						<thead>
							<tr>
								<th data-field="id">Id de nota</th>
								<th data-field="price">Título</th>
								<th data-field="price">Volanta</th>
								<th data-field="price">Cuerpo de la nota</th>
								<th data-field="price">Fecha</th>
								<th data-field="price">Estado</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>1</td>
								<td>La primer nota de edición</td>
								<td><p>Volanta Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td><p>Cuerpo de la nota Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td>10/10/2016</td>
								<td>Abierta</td>
								<td class='btnAccion-td'><button type='submit' name='modifNota' class='modifNota'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verNota' class='verNota'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>2</td>
								<td>La primer nota de edición</td>
								<td><p>Volanta Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td><p>Cuerpo de la nota Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td>10/10/2016</td>
								<td>Abierta</td>
								<td class='btnAccion-td'><button type='submit' name='modifNota' class='modifNota'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verNota' class='verNota'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>3</td>
								<td>La primer nota de edición</td>
								<td><p>Volanta Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td><p>Cuerpo de la nota Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.</p></td>
								<td>10/10/2016</td>
								<td>Abierta</td>
								<td class='btnAccion-td'><button type='submit' name='modifNota' class='modifNota'>e</button></td>
								<td class='btnAccion-td'><button type='submit' name='verNota' class='verNota'>E</button></td>
							</tr>
						</tbody>
					</table>
					<a href='#' class='altaContenido'>+</a>
				</div>
			</div>
		</section>
		
		<?php include_once('include/footer.php'); ?>
	</body>
</html>

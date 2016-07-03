<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php include_once('include/header_body.php'); ?>

		<section class='perfil content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_lector.php'>Perfil de usuario</a></p>
			</div>
			
			<div class='perfil'>
				<img class='fotoPerfil' src='#'/>
				<div class='datosPerfil'>
					<h2>Bienvenido/a</h2>
					<h1>Carlos Alberto  <a class='iconModificar' title='Modificar datos de perfil' href='perfil_modificacion.php'>r</a></h1>
				</div>
			</div>
			
			<div class='graficos' id="administradorGraficos">
				<div class='contenedorGrafico' id="graficos_izquierda">
					<h2>Productos vendidos</h2>	
					<div id='grafico_compras'>	
							<form name="formulario" method="post" action="ver_graficos_compras.php">
								
								<div class='graficos_compras_izq'><h3>Fecha de inicio</h3><input class='graficosInputs' type="date" name="fecha1" value="fecha1" /></div>
								<div class='graficos_compras_der'><h3>Fecha de fin</h3><input class='graficosInputs' type="date" name="fecha2" value="fecha2" /></div>
								<input class='verGraficos' type='submit' name="form_compras" value="Enviar"/>
							</form>	
					</div>
				</div>
				<div  class='contenedorGrafico' id="graficos_derecha">
					<h2>Suscripciones realizadas</h2>	
					<div id='grafico_suscripciones'>
						<form name="formulario" method="post" action="ver_graficos_suscripciones.php">
								
								<div class='graficos_compras_izq'><h3>Fecha de inicio</h3><input class='graficosInputs' type="date" name="fecha1" value="fecha1" /></div>
								<div class='graficos_compras_der'><h3>Fecha de fin</h3><input class='graficosInputs' type="date" name="fecha2" value="fecha2" /></div>
								<input class='verGraficos' type='submit' name="form_suscripciones" value="Enviar"/>
							</form>	
					</div>
				</div>
			</div>
		</section>
		
		<section class='content generarListados'>
			<h2>Listados</h2>
			<form action='' enctype='' method=''>
				<select name='tipoListado'>
					<option value='' selected>Seleccione el tipo</option>
					<option value='1'>Compras</option>
					<option value='2'>Suscripciones</option>
				</select>
				<input type='submit' id='generarPdf' name='generarPdf'/>
			</form>
		</section>

		<section class='perfil tablasABM content'>
				<h2>Alta de ediciones</h2>
				<div class='publicacionABM'>
					<h4>Publicaciones</h4>
					<table>
						<thead>
							<tr>
								<th>Id de publicación</th>
								<th>Nombre de publicación</th>
								<th>Tipo de publicación</th>
								<th class='btnAccion'></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>Alvin</td>
								<td>Eclair</td>
								<td>$0.87</td>
								<td class='btnAccion-td' title='Ver Publicación'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Alan</td>
								<td>Jellybean</td>
								<td>$3.76</td>
								<td class='btnAccion-td' title='Ver Publicación'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Jonathan</td>
								<td>Lollipop</td>
								<td>$7.00</td>
								<td class='btnAccion-td' title='Ver Publicación'><button type='submit' name='verPublicacion' class='verPublicacion'>E</button></td>
							</tr>
						</tbody>
					</table>
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
								<th class='estadoPublicacion'>Estado</th>
								<th class='estadoPublicacion'>Cerrar</th>
								<th class='btnAccion'></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>1</td>
								<td>Eclair</td>
								<td>Eclair</td>
								<td>Cultura | Deportes | Ciencia | Humor</td>
								<td>$0.87</td>
								<td class='estado'>n Abierto</td>
								<td class='estado'><input type='checkbox' name='cerrarPublicacion' id='cerrarPublicacion'/></td>
								<td class='btnAccion-td' title='Ver Edicion'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>2</td>
								<td>Alan</td>
								<td>Jellybean</td>
								<td>Deportes | Ciencia | Humor</td>
								<td>$3.76</td>
								<td class='estado'>n Abierto</td>
								<td class='estado'><input type='checkbox' name='cerrarPublicacion' id='cerrarPublicacion'/></td>
								<td class='btnAccion-td' title='Ver Edicion'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
							<tr><!-- ITEM -->
								<td>3</td>
								<td>Lollipop</td>
								<td>Lollipop</td>
								<td>Cultura | Ciencia | Humor</td>
								<td>$7.00</td>
								<td class='estado'>n Abierto</td>
								<td class='estado'><input type='checkbox' name='cerrarPublicacion' id='cerrarPublicacion'/></td>
								<td class='btnAccion-td' title='Ver Edicion'><button type='submit' name='verEdicion' class='verEdicion'>E</button></td>
							</tr>
						</tbody>
					</table>
				</div>
		</section>

		<section class='modifEmpleadosAdmin tablasABM content'>
				<h2>Listado de empleados</h2>
				<div class='publicacionABM'>
					<h4>Empleados (Contenidistas y Administradores)</h4>
					<table>
						<thead>
							<tr>
								<th>Nombre y apellido</th>
								<th>Rol</th>
								<th>Nombre de usuario</th>
								<th>Mail</th>
								<th>Contraseña</th>
								<th class='estadoUsuario'>Estado</th>
								<th class='estadoUsuario'>Cambiar estado</th>
								<th class='btnAccion'></th>
							</tr>
						</thead>

						<tbody>
							<tr><!-- ITEM -->
								<td>Alvin</td>
								<td>Contenidista</td>
								<td>carlosalberto</td>
								<td>xx@xxx.com</td>
								<td>solright22</td>
								<td class='estado'>Activo</td>
								<td class='estado'><input type='checkbox' name='cambiarEstadoUsuario' id='cambiarEstadoUsuario'/></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Alvin</td>
								<td>Contenidista</td>
								<td>carlosalberto</td>
								<td>xx@xxx.com</td>
								<td>solright22</td>
								<td class='estado'>Activo</td>
								<td class='estado'><input type='checkbox' name='cambiarEstadoUsuario' id='cambiarEstadoUsuario'/></td>
							</tr>
							<tr><!-- ITEM -->
								<td>Alvin</td>
								<td>Contenidista</td>
								<td>carlosalberto</td>
								<td>xx@xxx.com</td>
								<td>solright22</td>
								<td class='estado'>Activo</td>
								<td class='estado'><input type='checkbox' name='cambiarEstadoUsuario' id='cambiarEstadoUsuario'/></td>
							</tr>
						</tbody>
					</table>
					<a href='#' class='altaUsuarioDesdeAdmin'>Alta de nuevo empleado <span>+</span></a>
				</div>
		</section>

		<?php include_once('include/footer.php'); ?>
	</body>
</html>

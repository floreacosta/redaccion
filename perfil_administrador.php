<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('clases/Publicacion.php');
		include_once('clases/Administrador.php');
		include_once('ver_graficos.php');
	?>
	<body>
		<?php include_once('include/header_body.php'); ?>

		<section class='perfil content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a class='here' href='perfil_administrador.php'>Perfil de usuario</a></p>
			</div>
			
			<div class='perfil'><a name="salida_graficos"></a>
				<?php 
					$usuario = new Usuarios();
					$usuario->encabezadoPerfil();
				?>
			</div>
			
			<div class='graficos' id="administradorGraficos">
				<div class='contenedorGrafico' id="graficos_izquierda">
					<h2>Productos vendidos</h2>	
					<div id='grafico_compras'>	
							<form name="formulario" method="post" action="perfil_administrador.php#salida_graficos">
								
								<div class='graficos_compras_izq'><h3>Fecha de inicio</h3><input class='graficosInputs' type="date" name="fecha1" value="fecha1" /></div>
								<div class='graficos_compras_der'><h3>Fecha de fin</h3><input class='graficosInputs' type="date" name="fecha2" value="fecha2" /></div>
								<input class='verGraficos' type='submit' name="form_compras" value="Enviar"/>
								<br></br>
							</form>
							<div id='grafico1'></div>
					</div>
				</div>
				<div  class='contenedorGrafico' id="graficos_derecha">
					<h2>Suscripciones realizadas</h2>	
					<div id='grafico_suscripciones'>
							<form name="formulario" method="post" action="perfil_administrador.php#salida_graficos">
								
								<div class='graficos_compras_izq'><h3>Fecha de inicio</h3><input class='graficosInputs' type="date" name="fecha1" value="fecha1" /></div>
								<div class='graficos_compras_der'><h3>Fecha de fin</h3><input class='graficosInputs' type="date" name="fecha2" value="fecha2" /></div>
								<input class='verGraficos' type='submit' name="form_suscripciones" value="Enviar"/>
								<br></br>
							</form>	
							<div id='grafico2'></div>
					</div>
				</div>
			</div>
		</section>
		
		<section class='content generarListados'>
			<h2>Listados</h2>
			<form action='generar_pdf.php' method='POST'>
				<select name='tipoListado'>
					<option value='' selected>Seleccione el tipo</option>
					<option value='1'>Compras</option>
					<option value='2'>Suscripciones</option>
					<option value='3'>Redactores</option>
				</select>
				<input type='submit' id='generarPdf' name='generarPdf'/>
			</form>
		</section>

		<section class='perfil tablasABM content'>
				<h2>Alta de ediciones</h2>
				<div id='publicaciones' class='publicacionABM'>
					<h4>Publicaciones</h4>
					<table>
						<thead>
							<tr>
								<th data-field="id">Id de publicación</th>
								<th data-field="name">Nombre de publicación</th>
								<th data-field="price">Tipo de publicación</th>
								<th data-field="price">Activa</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>

						<tbody id="publicacionesRecargadas">
						<?php
							$admin = new Administrador();
							$admin->ABMpublicaciones();
						?>
						<tbody>
					</table>
				</div>
				
				<div id='ediciones' class='edicionABM'>			
				</div>
		</section>

		<section id='usuarios_administrativos' class='modifEmpleadosAdmin tablasABM content'>
				<h2>Listado de empleados</h2>
				<div id="publis_abm" class='publicacionABM'>
					<h4>Empleados (Contenidistas y Administradores)</h4>
					<table>
						<thead>
							<tr>
								<th>ID</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Rol</th>
								<th>Nombre de usuario</th>
								<th>Mail</th>
								<th>Contraseña</th>
								<th class='estadoUsuario'>Estado</th>
								<th class='btnAccion' data-field="price"></th>
								<th class='btnAccion' data-field="price"></th>
							</tr>
						</thead>
						<tbody id="usuariosRecargados">
						<?php
							$admin=new Administrador();
							$admin->listarUsuariosAdministrativos();
						?>
						</tbody>
					</table>
					<form method='POST' action='perfil_modificacion.php'>
					<button  type='submit' class='altaUsuarioDesdeAdmin' name='registro_admin'>Alta de nuevo empleado <span>+</span></button>
					</form>
				</div>
		</section>

		<?php include_once('include/footer.php'); ?>
	</body>
</html>

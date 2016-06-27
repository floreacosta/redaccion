<?php

?>
<header>
	<div class='logo'>
		<a href='index.php'><img class='imgLogo' src='img/logo.png' /></a>
	</div>

	<div class='iconMenu'><hr /><hr /><hr /><hr /></div>
	<div class='menuDesplegable'>
		<div class='menu'>
				<li class='buscar'>
					<form action='search.php' method='POST' enctype='multipart/form-data'>
						<input type='text' id='search' name='search' placeholder='Buscar' value=''></input>
						<input type='submit' id='btnSearch' name='btnSearch' value='s'></input>
					</form>
				</li>
				<li class='login'>
					<?php
					imprimirLogeo();
					?>
				</li>
		</div>
	</div>
	
	<li class='buscar escritorio'>
		<form action='search.php' method='POST' enctype='multipart/form-data'>
			<input type='text' id='search' name='search' placeholder='Buscar' value=''></input>
			<input type='submit' id='btnSearch' name='btnSearch' value='s'></input>
		</form>
	</li>
</header>

<div class='login none lectorBox' id='soyLector'>
	<form action='index.php' method='POST' enctype='multipart/form-data' class='lector'>
		<a href='#' onClick='modalCloseLector();'>x</a>
		<!--<img src='img/iconLogin-user.png'/>-->
		<div class='in'>
			<input type='text' id='userLector' name='userLector' placeholder='Usuario' value=''></input>
			<input type='text' id='passLector' name='passLector' placeholder='Contraseña' value=''></input>
			<input type='submit' id='ingresarLoginLector' name='ingresarLoginLector' value='LogIn'></input><!--BOTON LECTOR -->
		</div>
		<ul class='aclaracion'>
			<li><a href='/redaccion/registro-lector.php'>Quiero registrarme.</a></li>
			<li><a href='#'>Olvidé mi usuario y/o contraseña.</a></li>
		</ul>
	</form>
</div>
<div class='login none redactorBox' id='soyRedactor' >
	<form action='index.php' method='POST' enctype='multipart/form-data'class='redactor'>
		<a href='#' onClick='modalCloseRedactor();'>x</a>
		<!--<img src='img/iconLogin-trabajadores.png'/>-->
		<div class='in'>
			<input type='text' id='userRedactor' name='userRedactor' placeholder='Usuario' value=''></input>
			<input type='text' id='passRedactor' name='passRedactor' placeholder='Contraseña' value=''></input>
			<input type='submit' id='ingresarLoginRedactor' name='ingresarLoginRedactor' value='LogIn'></input><!--BOTON REDACTOR -->
		</div>
		<ul class='aclaracion'>
			<div><a href='#'>Contactar al administrador.</a></div>
			<div><a href='#'>Olvidé mi usuario y/o contraseña.</a></div>
		</ul>
	</form>
</div>
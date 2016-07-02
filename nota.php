<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <?php
		include_once('include/head.php');
		include_once('clases/Publicacion.php');
	?>
	<body>
		<?php
			include_once('include/header_body.php');
		?>
	
		<section class='introduccion content'>
			<div class='ubicacion'>
				<p><a href='index.php'>Home</a> <span class='separacion'>></span> <a href=''>Edición</a> <span class='separacion'>></span> <a class='here' href=''>Nota</a></p>
			</div>
			
			<div class='nota'>
				<h3>Volanta</h3>
				<h1>Título Nota</h1>
				<h2>Copete</h2>
				
				<figure class='imagenNota'>
					<img src='img/imagenNota/imgBoceto.jpg' />
					<figcaption>Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.</figcaption>
				</figure>
				
				<span class='autor'>Por <i>Flor Acosta</i></span>
				<div class='textoNota'>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget dapibus sapien, id cursus lacus. Nunc mollis nunc dolor, a vehicula nibh placerat commodo. Maecenas facilisis, nisl suscipit ornare aliquam, sem nibh mattis diam, et venenatis nunc nulla ut turpis. Etiam id ultricies dui, quis tincidunt leo. Phasellus velit massa, semper vitae tempus in, malesuada eu ante. Duis aliquam lectus id ante finibus, non rhoncus erat laoreet. Nullam scelerisque lorem non consequat cursus. In ut leo sit amet urna venenatis sodales. Proin accumsan tempor semper. Etiam rutrum massa eu elit suscipit, vitae molestie risus porta. Donec venenatis placerat accumsan. Nam tempor lorem sed massa porttitor fringilla. Aenean hendrerit mattis luctus. Nunc justo nisi, sollicitudin eu commodo molestie, bibendum sit amet nunc.</p>
					<p>Nulla posuere lorem quis mi viverra consequat. Nunc quis varius sapien. Pellentesque imperdiet dignissim nisl, sed dapibus metus. Pellentesque a felis et nunc tincidunt volutpat. Ut vitae fringilla ipsum, vel efficitur velit. Integer et dapibus urna. Etiam purus nulla, fermentum ultricies porttitor in, maximus sed neque. Sed dignissim massa ut justo sodales, eget facilisis nulla lacinia. Ut lorem eros, viverra ac leo sit amet, efficitur convallis velit. Nam a dignissim metus. Proin vel vestibulum dolor. Pellentesque leo ligula, fermentum eu massa sed, mollis accumsan mauris. Donec vulputate magna vitae purus molestie efficitur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras convallis arcu at egestas iaculis. Aliquam varius ex quis nibh auctor maximus.</p>
					<p>Aenean at laoreet felis, non lobortis lectus. In mollis quis lectus sit amet lobortis. Sed facilisis justo vitae maximus tempus. Donec pharetra magna dolor, ut ornare massa tempor mollis. Aliquam non porttitor massa. Donec elementum tortor tincidunt nisl facilisis sollicitudin. Aenean vehicula consequat dui quis finibus. Nam varius, risus eu posuere lacinia, erat sapien interdum diam, in consequat est nulla ut risus.</p>
					<p>Nullam odio dui, finibus maximus sollicitudin ut, efficitur et augue. In nibh lectus, placerat eget pharetra in, vulputate et elit. Fusce lacinia augue vitae nunc efficitur vestibulum. Phasellus lobortis odio eros, bibendum interdum felis dapibus rutrum. Etiam semper semper libero. Etiam auctor sed risus ut porta. Integer id orci vitae nunc hendrerit aliquam ac sit amet dui. Sed sodales dictum dictum. Pellentesque accumsan lectus sed leo ultrices lacinia. Suspendisse neque elit, viverra ut tortor posuere, convallis euismod dolor. Sed eget mollis massa, eu tempus nulla. Aliquam pharetra pharetra magna, at ullamcorper leo varius id. Nullam iaculis viverra feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin sagittis ac velit in feugiat. Maecenas in porta libero, in varius quam.</p>
					<p>Ut a imperdiet justo, eu finibus magna. Duis quis nulla semper, dignissim felis dictum, euismod ante. Integer auctor molestie erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed condimentum pharetra tellus imperdiet semper. Quisque id ultrices nibh, quis malesuada tortor. Nullam egestas risus non ornare efficitur. Vestibulum at semper orci.</p></p>
				</div>
				
				<figure class='videoNota'>
					<video></video>
					<figcaption>Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.</figcaption>
				</figure>
				
				<div class='ubicacionNota'>
					<h3>Ubicación</h3>
					<div class='googleMap'></div>
				</div>
			</div>

		</section>
		<?php 
		include_once('include/footer.php');
		?>
	</body>
</html>

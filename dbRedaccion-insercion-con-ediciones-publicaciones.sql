USE dbRedaccion;

INSERT INTO localidad(idProvincia, nombre) VALUES 
	(1,'Ramos Mejía'),
	(1,'San Justo'),
	(1,'Isidro Casanova');


INSERT INTO provincia (idPais, nombre) VALUES
	(1,'Buenos Aires'),
	(1,'Entre Ríos'),
	(1,'Santa Fe'),
	(1,'Salta'),
	(1,'Jujuy'),
	(1,'Tucumán'),
	(1,'Catamarca'),
	(1,'Misiones'),
	(1,'Chaco'),
	(1,'Chubut'),
	(1,'Córdoba'),
	(1,'Corrientes'),
	(1,'Formosa'),
	(1,'La Pampa'),
	(1,'La Rioja'),
	(1,'Mendoza'),
	(1,'Neuquén'),
	(1,'Río Negro'),
	(1,'San Juan'),
	(1,'San Luis'),
	(1,'Santa Cruz'),
	(1,'Santiago del Estero'),
	(1,'Tierra del Fuego');


INSERT INTO pais(nombre) VALUES 
	('Argentina'),
	('Chile'),
	('Uruguay'),
	('Paraguay');


INSERT INTO estado(descripcion) VALUES 
	('Activo'),
	('Inactivo');


INSERT INTO usuarioLector(apellido, nombre, documento, fechaNacimiento, calle,numero, telefono, mail, idLocalidad, idProvincia, idPais, idEstado, usuario, clave) VALUES 
	('Garcia','Carlos', '35945643', '1970-11-07','Zañartú',412,46531234,'charly_garcia@hotmail.com',3,1,1,2,'carlosalberto22','solright32'),
	('Calamaro','Andrés', '35945643','1978-05-21','Carabobo',5123,46946312,'elsalmon22@hotmail.com',1,1,1,2,'ac_rock','salmonela'),
	('Páez','Rodolfo', '35945643','1981-08-13','Santo Dumont',332,44412409,'rodolfo_paez@hotmail.com',3,1,1,2,'rodolfo13','rodolfo123');

INSERT INTO tipoUsuarioAdministrativo(nombre, descripcion) VALUES 
	('Contenidista','Creador y editor de contenido'),
	('Administrador','Control de la página');


INSERT INTO usuarioAdministrativo(idTipoUsuario, apellido, nombre, fechaNacimiento, calle, numero, telefono, mail, idLocalidad, idProvincia, idPais, idEstado, usuario, clave) VALUES 
	(1,'Rojo','Marcos','1975-12-09','Entre Rios',1040,46500189,'marquitos_rojo@hotmail.com',2,1,1,2,'marcosrojo14','futbolplaya333'),
	(2,'Rozental','Nacho','1984-06-22','Pueyrredon',331,44149012,'nacho_rozental@gmail.com',3,1,1,2,'nacho_roz','nachito123456');


INSERT INTO seccionSistema(nombre, descripcion) VALUES 
	('Index','Seccion principal de la página'),
	('Listado De Noticias','Todas las noticias'),
	('Edicion De Noticias','El editor de nuestra página web'),
	('Publicaciones','Contiene las publicaciones del sitio');


INSERT INTO permisoUsuario(idTipoUsuarioAdmin, idSeccionSistema) VALUES
	('2','1'),
	('2','2'),
	('2','3'),
	('1','2'),
	('1','3');


INSERT INTO tiempoLaboral(idUsuarioAdmin, fechaIngreso, fechaEgreso) VALUES 
	('2','2016-05-28','2016-05-30'),
	('1','2016-05-26','2016-05-29'),
	('2','2016-05-27','2016-05-30');


INSERT INTO accion(descripcion) VALUES 
	('Modificación'),
	('Eliminación'),
	('Agregación');


INSERT INTO tipoPublicacion(descripcion) VALUES 
	('Revista'),
	('Diario');


INSERT INTO publicacion(nombre, descripcion, idTipoPublicacion, cantidadEmisionPorMes)VALUES
	('90+10', 'En 90+10 contamos historias de personas e ideas creativas, con una mirada interdisciplinaria sobre la cultura creativa, enfocándonos en las manifestaciones del diseño en todas sus variantes, y la forma en que atraviesan el estilo de vida contemporáneo.', 1, 6),
	('Competitor', 'Competidores de distintas disciplinas, interés general.', 1, 4),
	('Deck', 'Arquitectura, diseño y decoración.', 1, 2),
	('Diy', 'Diseño contemporáneo y arquitectura.', 1, 6),
	('D&D', 'Diseño y decoración.', 1, 6),
	('El gráfico', 'Todo en deportes.', 2, 30),
	('Genios', 'Juegos y entretenimiento infantil, más toda la información colegial.', 1, 4),
	('Gente', 'Interés general y farándula argentina.', 1, 1),
	('¡Hola!', 'Interés general y farándula argentina.', 1, 4),
	('Invasiva', 'Diseño contemporáneo y arte.', 1, 1),
	('La cosa', 'Cine argentino y mundial, todas las novedades y estrenos.', 1, 2),
	('Living', 'Diseño y decó.', 1, 8),
	('Paparazzi', 'Farándula argentina y todos los chimentos.', 1, 30),
	('Web designer', 'Novedades tecnológicas.', 1, 2),
	('Annual Report 15', 'Revista de interes social', 1, 1);


INSERT INTO edicion(idPublicacion, tituloEdicion, imagenTapaEdicion, fecha, precio)	VALUES 
	(1, 'Ilustradores reconocidos', '9010_ilustradoresReconocidos.png', '2016-05-29', 40.0),
	(2, 'The body issue', 'competitor_theBodyIssue.png', '2016-05-29', 27.0),
	(3, 'Deck', 'deck_deck.png', '2016-05-25', 15.0),
	(4, 'Bastile, World Exclusive Interview', 'diy_bastile.png', '2016-05-29', 40.0),
	(5, 'Edición 52', 'dyd_disenioydecoracion.png', '2016-05-29', 35.0),
	(6, 'Señor futbol', 'elgrafico_seniorFutbol.png', '2016-05-29', 27.0),
	(7, 'La revolución de mayo', 'genios_laRevolucionDeMayo.png', '2016-05-25', 15.0),
	(8, 'El look de los Martín Fierro', 'gente_elLookDeLosMartinFierro.png', '2016-05-29', 27.0),
	(9, 'Ronnie Wood y su mujer Sally', 'holaArgentina_ronnieWood.png', '2016-05-29', 27.0),
	(10, 'Edición 10', 'invasiva_invasiva.png', '2016-05-29', 27.0),
	(11, 'Fantasías animadas', 'lacosa_fantasiasAnimadas.png', '2016-05-29', 27.0),
	(12, 'Ganar espacio', 'living_ganarEspacio.png', '2016-05-29', 27.0),
	(13, 'La chica del momento', 'paparazzi_losSecretosDeLaChicaDelMomento.png', '2016-05-29', 27.0),
	(14, 'The next wave of responsive design', 'webdesigner_theNextWaver.png', '2016-05-29', 27.0),
	(15, 'Health Fundation', 'healthFundation_annualReport15.png', '2016-05-29', 35.0);

INSERT INTO seccion(nombre,descripcion) VALUES 
	('Deportes','Todo sobre el mundo del deporte'),
	('Actualidad','Lo último de este 2016'),
	('Música','Las bandas de siempre y las de ahora!'),
	('Ocio','Una sección para los más grandes (y chicos!)'),
	('Politica','La actualidad de como se maneja tu país');


INSERT INTO seccionPorEdicion(idEdicion,idSeccion) VALUES 
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(2,1),
	(2,2),
	(2,3),
	(2,5);


INSERT INTO imagenNota(idNota,descripcion) VALUES
	(1,'nota1.jpg'),
	(2,'nota2.jpg'),
	(3,'nota3.jpg'),
	(4,'nota4.jpg');


INSERT INTO videoNota(idNota,descripcion) VALUES 
	(1,'www.youtube.com/watch?v=391jf9ak'),
	(3,'www.youtube.com/watch?v=asf1341s'),
	(4,'www.youtube.com/watch?v=8138ajsj');


INSERT INTO nota(idSeccionPorEdicion,titulo,volanta,copete,texto,latitud,longitud) VALUES 
	(1,'Lorem ipsum','Lorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsumLorem ipsum','41-23-12.2','2-10-26.5'),
	(2,'Lorem ipsum','Lorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsumLorem ipsum','41-23-12.2','2-10-26.5'),
	(3,'Lorem ipsum','Lorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsumLorem ipsum','41-23-12.2','2-10-26.5'),
	(2,'Lorem ipsum','Lorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsum','Lorem ipsumLorem ipsumLorem ipsumLorem ipsum','41-23-12.2','2-10-26.5');


INSERT INTO tiempoSuscripcion(tiempoEnMeses,porcentajeDescuento) VALUES
	(1,0),
	(2,5),
    (3,10),
    (4,15),
    (5,18),
    (6,22),
    (7,25),
    (8,28),
    (9,32),
    (10,35),
    (11,38),
    (12,40);


INSERT INTO suscripcion(idUsuarioLector,idTiempoSuscripcion,idPublicacion,fecha,precio) VALUES 
	(1,4,1,'2016-05-30',210),
	(2,2,2,'2016-05-30',100);


INSERT INTO compras(idUsuarioLector,idEdicion,fecha) VALUES 
	(3,2,'2016-05-30'),
	(2,2,'2016-05-28'),
	(1,1,'2016-05-30');

INSERT INTO bitacoraNota(idUsuarioAdmin, idNota, fecha, idAccion) VALUES 
	(1, 1, '2016-05-30', 1),
	(1, 2, '2016-05-30', 1),
	(1, 2, '2016-05-29', 1);
    
INSERT INTO bitacoraPublicacion(idUsuarioAdmin, idPublicacion, fecha, idAccion, cambio) VALUES 
	(2, 1 , '2016-05-27', 2, 'Se elimino la publicación por completo');
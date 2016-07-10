//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;
         
jQuery(document).ready(function(){
     //obtenemos los valores 
     lat = jQuery('#lat').val();
     lng = jQuery('#long').val();
     //Asigna al evento click del boton la funcion codeAddress
     jQuery('#pasar').click(function(){
        codeAddress();
        return false;
     });
     //Inicializamos la función de google maps una vez el DOM este cargado
    initialize();
});
     
function initialize() {
     
	geocoder = new google.maps.Geocoder();
	
	if(lat !=0 && lng !=0 ){
        var latLng = new google.maps.LatLng(lat,lng);
    }
    else{
        //Por defecto coloca el marcador en UNLAM
        var latLng = new google.maps.LatLng(-34.6696864,-58.5650799);
    }

	//Define algunas opciones del mapa a crear
	var myOptions = {
		center: latLng,//centro del mapa
		zoom: 15,//zoom del mapa
		mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
	};
	//crea el mapa con las opciones anteriores y le pasamos el elemento div
	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	//crea el marcador en el mapa
	marker = new google.maps.Marker({
		map: map,//el mapa creado en el paso anterior
		position: latLng,//objeto con latitud y longitud
		draggable: true //que el marcador se pueda arrastrar
	});

	//función que actualiza los input del formulario con las nuevas latitudes

	updatePosition(latLng);

	// Inicializa los datos del marcador
	// updateMarkerPosition(latLng);

	geocodePosition(latLng);

	// Permite los eventos drag/drop sobre el marcador
	google.maps.event.addListener(marker, 'dragstart', function() {
		updateMarkerAddress('Arrastrando...');
	});

	google.maps.event.addListener(marker, 'drag', function() {
		updateMarkerStatus('Arrastrando...');
		updateMarkerPosition(marker.getPosition());
	});

	google.maps.event.addListener(marker, 'dragend', function() {
		updateMarkerStatus('Arrastre finalizado');
		geocodePosition(marker.getPosition());
		updateMarker(event.latLng);
	});        
         
}
	
google.maps.event.addDomListener(window, 'load', initialize)
     
    //funcion que traduce la direccion en coordenadas
function codeAddress() {

	//obtiene la direccion del formulario
	var address = document.getElementById("direccion").value;
	//hace la llamada al geodecoder
	geocoder.geocode( { 'address': address}, function(results, status) {

		//si el estado del llamado es OK
		if (status == google.maps.GeocoderStatus.OK) {
			//centra el mapa en las coordenadas obtenidas
			map.setCenter(results[0].geometry.location);
			//coloca el marcador en dichas coordenadas
			marker.setPosition(results[0].geometry.location);
			//actualiza el formulario      
			updatePosition(results[0].geometry.location);
			 
			//Añade un listener para cuando el markador se termine de arrastrar
			//actualiza el formulario con las nuevas coordenadas
			google.maps.event.addListener(marker, 'dragend', function(){
				updatePosition(marker.getPosition());
			});
		} 
		else {
			//si no es OK devuelve error
			alert("No podemos encontrar la direcci&oacute;n, error: " + status);
		}
	});
}

//funcion que simplemente actualiza los campos del formulario
function updatePosition(latLng){
	$('#lat').val(latLng.lat());
	$('#long').val(latLng.lng());
}
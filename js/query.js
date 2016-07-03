$(document).ready(menu);
	
	var contador = 1;
	var despliegue = 1;

function menu(){
	$('.iconMenu').click(function(){
		if(contador == 1){
			$('.menu').animate({
				right: '0em'
			});
			contador = 0;
		}else{
			contador = 1;
			$('.menu').animate({
				right: '-100%'
			});
		}
	})
}

function modalOpenLector(){
	$('.lectorBox').removeClass('none');
	$('.lectorBox').addClass('get');
}

function modalCloseLector(){
	$('.lectorBox').addClass('none');
	$('.lectorBox').removeClass('get');
}

function modalOpenRedactor(){
	$('.redactorBox').removeClass('none');
	$('.redactorBox').addClass('get');
}

function modalCloseRedactor(){
	$('.redactorBox').addClass('none');
	$('.redactorBox').removeClass('get');
}

function modalOpenAdministrador(){
	$('.administradorBox').removeClass('none');
	$('.administradorBox').addClass('get');
}

function modalCloseAdministrador(){
	$('.administradorBox').addClass('none');
	$('.administradorBox').removeClass('get');
}

function modalOpenCompra(){
	$('.compraBox').removeClass('none');
	$('.compraBox').addClass('get');
}

function modalCloseCompra(){
	$('.compraBox').addClass('none');
	$('.compraBox').removeClass('get');
}

function getXMLHTTP() {
	var xmlhttp = false;
	try{
		xmlhttp = new XMLHttpRequest();
	}catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}catch(e){
				xmlhttp = false;
			}
		}
	}
	return xmlhttp;
}

function buscaProvincia(pais) {
    var strURL = "include/provincia.php?pais="+pais;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('provincia').innerHTML = req.responseText ;
                }else{
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
	}
}

function buscaLocalidad(provincia) {
    var strURL="include/localidad.php?provincia="+provincia;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('localidad').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function buscaUsuario(usuario) {
    var strURL="include/usuarioDisponible.php?usuario="+usuario;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('usuarioOcupado').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function buscaCompra(idEdicion) {
    var strURL="include/compras.php?idEdicion="+idEdicion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('compraArealizar').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function calcularImporte(idPublicacion, idPeriodo) {
    var strURL="include/importe.php?idPublicacion="+idPublicacion+"&idPeriodo="+idPeriodo;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('importe').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function buscarSeccion(idSeccion,idEdicion) {
    var strURL="include/seccion.php?edicion="+idEdicion+"&idSeccion="+idSeccion;
	var req = getXMLHTTP();

    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('seccion').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function mostrarEdiciones(idPublicacion) {
    var strURL="mostrarTablasContenidista.php?idPublicacion="+idPublicacion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
		
	$( "#secciones" ).empty();
	$( "#notas" ).empty();
}

function mostrarSecciones(idEdicion) {
    var strURL="mostrarTablasContenidista.php?idEdicion="+idEdicion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('secciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
	$( "#notas" ).empty();
}

function mostrarNotas(idSeccion) {
    var strURL="mostrarTablasContenidista.php?idSeccion="+idSeccion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('notas').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
function editarPublicacion(idPublicacion) {
    var strURL="editarContenidoTablas.php?idPublicacion="+idPublicacion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('modificacarPublicacion').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
//////////////////////////////
//////////////////////////////
////Lista ediciones
function ABMEdiciones(idPublicacion) {
    var strURL="ABM.php?idPublicacion="+idPublicacion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
////////////Modificacion y eliminacion de publicacion
function ABMModificarPublicacion(idPublicacion) {
    var strURL="ABM.php?idEdicion="+idPublicacion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
function ABMEliminarPublicacion(idPublicacion) {
    var strURL="ABM.php?idEdicion="+idEdicion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
////////////Modificacion y eliminacion de edicion
function ABMModificarEdicion(idEdicion) {
    var strURL="ABM.php?idEdicion="+idPublicacion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}
function ABMEliminarEdicion(idEdicion) {
    var strURL="ABM.php?idEdicion="+idEdicion;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('ediciones').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

function cambiarEstado(id_administrativo,id_estado) {
    var strURL="ABM.php?id_administrativo="+id_administrativo+"&?id_estado="+id_estado;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"

                if (req.status == 200) {
                    document.getElementById('modifEstado').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}


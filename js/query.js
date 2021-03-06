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

function getXMLHTTP() {
	var xmlhttp=false;
	try{
		xmlhttp=new XMLHttpRequest();
	}
	catch(e)	{
		try{
			xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e){
			try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e){
				xmlhttp=false;
			}
		}
	}
	return xmlhttp;
}


function buscaProvincia(pais) {
    var strURL="include/provincia.php?pais="+pais;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('provincia').innerHTML =req.responseText ;
                } else {
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



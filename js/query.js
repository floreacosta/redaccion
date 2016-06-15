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
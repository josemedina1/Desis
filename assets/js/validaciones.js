// Se utiliza la libreria JQuery para realizar validaciones

$(document).ready(function() {

	const alertaNombre = document.getElementById('alertNombre');
	const alertaAlias = document.getElementById('alertAlias');
	const alertarut = document.getElementById('alertRut');
	const alertaEmail = document.getElementById('alertEmail');



/** Al dar click en el boton "VOTAR" se realizan las validaciones de los campos requeridos,
	donde se encuentre una irregularidad se informará mediante una alerta de navegador, 
	para finalizar haciendo focus en el campo / input especifico.
*/
	$('#votar').click(function(){
		
		// OBTENER ID DE INPUTS
		var nombre = document.getElementById('name');
		var alias = document.getElementById('alias').value.trim();

		//Expresión regular para alias
		var regularAlias = /^[a-zA-Z0-9]+$/;


		var email = document.getElementById('email');

		var region = document.getElementById('selectRegion');
		var comuna = document.getElementById('selectComuna');

		// Validar que los check esten marcados mediante la clase checknosotros 
		var checkboxes = document.querySelectorAll('.checknosotros:checked');
		var numChecked = checkboxes.length;

// VALIDAR QUE CAMPO NOMBRE NO ESTE VACIO 
		if ($(nombre).val() == "") {
			alertaNombre.innerHTML='Debe ingresar Nombre y Apellido!';
			alertaNombre.style.color = "red";
			return false;
		}
// VALIDAR ALIAS
		if (!regularAlias.test(alias)) {
			alertaAlias.innerHTML='Debe contener letras y números, EJ: Prueba123.';
			alertaAlias.style.color = "red";
			return false;
		}
// VALIDAR RUT	
		const rut = document.getElementById('rut').value.trim();

		// Eliminar puntos y guion del RUT
		const rutLimpio = rut.replace(/\./g, '').replace(/\-/g, '').toUpperCase();

		// Separar número del dígito verificador
		const numeroRut = rutLimpio.slice(0, -1);
		const digitoVerificador = rutLimpio.slice(-1);

		// Aplicar algoritmo del módulo 11
		let suma = 0;
		let multiplicador = 2;

		for (let i = numeroRut.length - 1; i >= 0; i--) {
		suma += parseInt(numeroRut.charAt(i)) * multiplicador;
		multiplicador = multiplicador < 7 ? multiplicador + 1 : 2;
		}

		const resto = suma % 11;
		const digitoCalculado = 11 - resto;

		// Comparar dígito verificador con el calculado
		const digitoVerificadorCalculado = (digitoCalculado === 11) ? '0' : (digitoCalculado === 10) ? 'K' : digitoCalculado.toString();

		if (digitoVerificador !== digitoVerificadorCalculado) {
		alertarut.innerHTML='Rut nvalido!';
		alertarut.style.color = "red";
		return false;
		}

// VALIDAR CORREO - EMAIL
		

		if($(email).val().indexOf('@', 0) == -1 || $(email).val().indexOf('.', 0) == -1) {
			alertaEmail.innerHTML='El correo electrónico es invalido!';
			alertaEmail.style.color = "red";
            return false;
        }


		if(region == null ){
			alert('Seleccione una region');
		}


// VALIDAR CHECKBOXES
		if (numChecked !== 2) {
			alert('Debes marcar minimo 2 checkboxes');
			return false;
		  }
		
	});

// QUITAR ALERTAS AL DAR CLICK EN INPUT

	$('#name').click(function(){
		alertaNombre.innerHTML="";
	})
	$('#alias').click(function(){
		alertaAlias.innerHTML="";
	})
	$('#rut').click(function(){
		alertarut.innerHTML="";
	})
	$('#email').click(function(){
		alertaEmail.innerHTML="";
	})


});


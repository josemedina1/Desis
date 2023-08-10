/**
 * var Fn = {
    validaRut: function(rutCompleto) {
        if (!/^[0-9]+-[0-9kK]{1}$/.test(rutCompleto))
            return false;
        var tmp = rutCompleto.split('-');
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == 'K') digv = 'k';
        return (Fn.dv(rut) == digv);
    },
    dv: function(T) {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        return S ? S - 1 : 'k';
    }
}
//1.-  Poner placeholder:
$("#order_shipping_address_taxid").attr("placeholder", "xxxxxxxx-x (sin puntos)")
$("#order_billing_address_taxid").attr("placeholder", "xxxxxxxx-x (sin puntos)")
// 2.- Validar on Submit
$("#checkout").submit(function(evt) {
    let sameAsBilling = $("#shipping_same_as_billing").is(":checked");
    let rutShipping = $("#order_shipping_address_taxid").val();
    let rutBilling = $("#order_billing_address_taxid").val();
    if (sameAsBilling) {
        if (Fn.validaRut(rutShipping)) {
            return;
        } else {
            evt.preventDefault();
            alert("Formato de RUT debe ser xxxxxxxx-x sin puntos");
        }
    } else {
        console.log("validar dos rut:" + rutShipping + "&" + rutBilling);
        if (Fn.validaRut(rutShipping)) {
            return;
        } else {
            evt.preventDefault();
            alert("Formato de RUT en dirección de envio debe ser xxxxxxxx-x sin puntos");
        }
        if (Fn.validaRut(rutBilling)) {
            return;
        } else {
            evt.preventDefault();
            alert("Formato de RUT en dirección de facturación debe ser xxxxxxxx-x sin puntos");
        }
    }
});
 */

function validarRut() {
  const rut = document.getElementById('rutInput').value.trim();
  
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
    alert('El RUT ingresado es inválido.');
    return;
  }
  
  // Si llegamos aquí, el RUT es válido
  alert('El RUT ingresado es válido.');
}

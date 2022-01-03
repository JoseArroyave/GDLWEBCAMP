var api = 'AIzaSyCDLep9qEq9PX7JVBvQjQ21yM_D3bHO8ZU'
$(function() {
    // Menú Fijo.
    var windowHeight = $(window).height();
    var barraHeight = $('.barra').innerHeight();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll > windowHeight) {
            $('.barra').addClass('fixed');
            $('body').css({ 'margin-top': barraHeight + 'px' });
        } else {
            $('.barra').removeClass('fixed');
            $('body').css({ 'margin-top': '0px' });
        }
    })
});

function initMap() {
    // var latLng = { lat: 6.154528507873035, lng: -75.6064744684422 };
    var latLng = { lat: 40.75913857821838, lng: -73.97862263502893 };
    var map = new google.maps.Map(document.getElementById("mapa"), {
        center: latLng,
        zoom: 15,
        mapTypeId: 'satellite'
    });
    map.setTilt(45);
    var contenido = '<h2>GDLWEBCAMP</h2>' + '<p><b><i>45 Rockefeller Plaza, New York, NY 10111</i></b></p>' + '<p>Visítanos del 10 al 12 de diciembre!</p>';
    var informacion = new google.maps.InfoWindow({
        content: contenido
    });
    var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        title: 'GDLWEBCAMP'
    });
    marker.addListener('click', function() {
        informacion.open(map, marker);
    });
}
(function() {
    'use strict';
    document.addEventListener('DOMContentLoaded', function() {
        // Campos datos de usuario
        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        // Campos pases
        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');
        var pase_completo = document.getElementById('pase_completo');

        // Botones y los divs
        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var btnRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var regalo = document.getElementById('regalo');
        var suma = document.getElementById('suma-total');

        // Extras
        var camisas = document.getElementById('camisa_evento')
        var etiquetas = document.getElementById('etiquetas')

        calcular.addEventListener('click', calcularMontos)
        pase_dia.addEventListener('change', mostrarV);
        pase_dosdias.addEventListener('change', mostrarVS);
        pase_completo.addEventListener('change', mostrarVSD);
        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);

        function calcularMontos(event) {
            event.preventDefault();
            var listadoProductos = [];
            var boletoDia = parseInt(pase_dia.value, 10) || 0;
            var boleto2Dias = parseInt(pase_dosdias.value, 10) || 0;
            var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
            var cantCamisas = parseInt(camisas.value, 10) || 0;
            var cantEtiquetas = parseInt(etiquetas.value, 10) || 0;
            var cantRegalo = regalo.value;
            var totalPagar = (boletoDia * 30) + (boleto2Dias * 45) + (boletoCompleto * 50) + (cantCamisas * 9.3) + (cantEtiquetas * 2);
            var listadoPrecios = []

            if (regalo.value === '') {
                alert('Debes elegir un regalo')
                regalo.focus();
            } else {
                function resumenCompra() {
                    if (boletoDia == 1) { listadoProductos.push(boletoDia + ' pase de un día'); } else if (boletoDia > 1) { listadoProductos.push(boletoDia + ' pases de un día'); }
                    if (boleto2Dias == 1) { listadoProductos.push(boleto2Dias + ' pase de dos días'); } else if (boleto2Dias > 1) { listadoProductos.push(boleto2Dias + ' pases de dos días'); }
                    if (boletoCompleto == 1) { listadoProductos.push(boletoCompleto + ' pase completo'); } else if (boletoCompleto > 1) { listadoProductos.push(boletoCompleto + ' pases completos'); }
                    if (cantCamisas == 1) { listadoProductos.push(cantCamisas + ' camisa'); } else if (cantCamisas > 1) { listadoProductos.push(cantCamisas + ' camisas'); }
                    if (cantEtiquetas == 1) { listadoProductos.push(cantEtiquetas + ' pack de etiquetas'); } else if (cantEtiquetas > 1) { listadoProductos.push(cantEtiquetas + ' packs de etiquetas'); }
                }

                function resumenPrecios() {
                    var totalDia = (boletoDia * 30).toFixed(2);
                    var totalDosDias = (boleto2Dias * 45).toFixed(2);
                    var totalCompleto = (boletoCompleto * 50).toFixed(2);
                    var totalCamisas = (cantCamisas * 9.3).toFixed(2);
                    var totalEtiquetas = (cantEtiquetas * 2).toFixed(2);
                    var precios = [totalDia, totalDosDias, totalCompleto, totalCamisas, totalEtiquetas];
                    for (var i = 0; i < precios.length; i++) {
                        if (precios[i] != 0) {
                            listadoPrecios.push(precios[i])
                        } else {}
                    }
                }

                function productosInner() {
                    lista_productos.innerHTML = '';
                    for (var i = 0; i < listadoProductos.length; i++) {
                        lista_productos.innerHTML += listadoProductos[i] + ' = $' + listadoPrecios[i] + '<br/>';
                    }
                    if (cantRegalo == 'Etiquetas' && cantEtiquetas != 0) {
                        lista_productos.innerHTML += cantRegalo + ' = ¿Otra vez?'
                    } else {
                        lista_productos.innerHTML += cantRegalo + ' = ¡SON GRATIS!'
                    }

                }

                function pagar() {
                    suma.innerHTML = '$' + totalPagar.toFixed(2);
                }

                function enable() {
                    calcular.disa
                }

                resumenCompra();
                resumenPrecios();
                productosInner();
                pagar();
            }
        }

        function mostrarV() {
            var boletoDia = parseInt(pase_dia.value, 10) || 0;
            var boleto2Dias = parseInt(pase_dosdias.value, 10) || 0;
            var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
            var boletos = [boletoDia, boleto2Dias, boletoCompleto];

            for (var i = 0; i < boletos.length; i++) {
                if (boletos[i] == boletoDia) {
                    document.getElementById('viernes').style.display = 'block';
                } else {
                    document.getElementById('sabado').style.display = 'none';
                    document.getElementById('domingo').style.display = 'none';
                }
            }
        }

        function mostrarVS() {
            var boletoDia = parseInt(pase_dia.value, 10) || 0;
            var boleto2Dias = parseInt(pase_dosdias.value, 10) || 0;
            var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
            var boletos = [boletoDia, boleto2Dias, boletoCompleto];

            for (var i = 0; i < boletos.length; i++) {
                if (boletos[i] == boleto2Dias) {
                    document.getElementById('viernes').style.display = 'block';
                    document.getElementById('sabado').style.display = 'block';
                } else {
                    document.getElementById('domingo').style.display = 'none';
                }
            }
        }

        function mostrarVSD() {
            var boletoDia = parseInt(pase_dia.value, 10) || 0;
            var boleto2Dias = parseInt(pase_dosdias.value, 10) || 0;
            var boletoCompleto = parseInt(pase_completo.value, 10) || 0;
            var boletos = [boletoDia, boleto2Dias, boletoCompleto];

            for (var i = 0; i < boletos.length; i++) {
                if (boletos[i] == boletoCompleto) {
                    document.getElementById('viernes').style.display = 'block';
                    document.getElementById('sabado').style.display = 'block';
                    document.getElementById('domingo').style.display = 'block';
                } else {}
            }
        }

        function validarCampos() {
            if (this.value == '') {
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = 'Este campo es obligatorio'
                this.style.backgroundColor = '#fcc4c0'
            } else {
                this.style.backgroundColor = '#ffffff'
                errorDiv.style.display = 'none';
            }
        }

    }); //DOM CONTENT LOADED
})();
// $(function() {
//     $(window).scroll(function() {
//         var scroll = $(window).scrollTop();
//         if (scroll > windowHeight) {
//             $('.barra').addClass('fixed');
//             $('body').css({ 'margin-top': barraHeight + 'px' });
//         } else {
//             $('.barra').removeClass('fixed');
//             $('body').css({ 'margin-top': '0px' });
//         }
//     })
// })
(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    // Campos pases
    var pase_dia = document.getElementById('pase_dia');
    var pase_dosdias = document.getElementById('pase_dosdias');
    var pase_completo = document.getElementById('pase_completo');

    // Botones y los divs
    var calcular = document.getElementById('calcular');
    var btnRegistro = document.getElementById('btnRegistro');
    var lista_productos = document.getElementById('lista-productos');
    var regalo = document.getElementById('regalo');
    var suma = document.getElementById('suma-total');

    // Extras
    var camisas = document.getElementById('camisa_evento')
    var etiquetas = document.getElementById('etiquetas')

    btnRegistro.disabled = true;

    if (document.getElementById('calcular')) {
      calcular.addEventListener('click', calcularMontos)

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
              } else { }
            }
          }

          function productosInner() {
            lista_productos.innerHTML = '';
            for (var i = 0; i < listadoProductos.length; i++) {
              lista_productos.innerHTML += listadoProductos[i] + ' = $' + listadoPrecios[i] + '<br/>';
            }
            if (cantRegalo) {
              lista_productos.innerHTML += cantRegalo + ' = $0.00'
            }
          }
          /*
          function productosInner() {
              lista_productos.innerHTML = '';
              for (var i = 0; i < listadoProductos.length; i++) {
                  lista_productos.innerHTML += listadoProductos[i] + ' = $' + listadoPrecios[i] + '<br/>';
              }
              if (cantRegalo == 2 && cantEtiquetas != 0) {
                  lista_productos.innerHTML += 'Etiquetas' + ' = ¿Otra vez?'
              } else if (cantRegalo == 1) {
                  lista_productos.innerHTML += 'Pulseras' + ' = ¡SON GRATIS!'
              } else if (cantRegalo == 3) {
                  lista_productos.innerHTML += 'Plumas' + ' = ¡SON GRATIS!'
              } else if (cantRegalo == 2 && cantEtiquetas == 0) {
                  lista_productos.innerHTML += 'Etiquetas' + ' = ¡SON GRATIS!'
              }
          } */

          function pagar() {
            suma.innerHTML = '$' + totalPagar.toFixed(2);
            btnRegistro.disabled = false;
            document.getElementById('total_pedido').value = totalPagar
          }

          resumenCompra();
          resumenPrecios();
          productosInner();
          pagar();
        }
      }
    }
  }); //DOM CONTENT LOADED
})();
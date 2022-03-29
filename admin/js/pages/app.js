$(document).ready(function () {
  $("#registros").DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    'language': {
      paginate: {
        next: 'Siguiente',
        previous: 'Anterior',
        last: 'Último',
        first: 'Primero',
      },
      info: 'Mostrando _START_ a _END_ de _TOTAL_ de resultados',
      emptyTable: 'No hay registros',
      infoEmpty: '0 registros',
      search: 'Buscar'
    },
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  }).buttons().container().appendTo('#registros_wrapper .col-md-6:eq(0)');

  $(function () {
    $("#fecha").datepicker({
      dateFormat: 'yy-mm-dd'
    });
  });

  $(function () {
    $(".categoria").select2({
      placeholder: "Selecciona una categoría",
      allowClear: true
    });
    $(".ponente").select2({
      placeholder: "Seleccione un ponente",
      allowClear: true
    });
  });
  $("#icono").iconpicker();
  $('.iconpicker-item').on('click', function (e) {
    e.preventDefault();
  })

  $(function () {
    function randomColor() {
      function random(min, max) {
        return Math.floor((Math.random() * (max - min + 1)) + min);
      }
      str = "#";
      for (i = 0; i < 6; i++) {
        randNum = random(0, 15);
        switch (randNum) {
          case 10:
            randNum = "A";
            break;
          case 11:
            randNum = "B";
            break;
          case 12:
            randNum = "C";
            break;
          case 13:
            randNum = "D";
            break;
          case 14:
            randNum = "E";
            break;
          case 15:
            randNum = "F";
            break;
        }
        str += randNum;
      }
      return str;
    }

    // PIE CHART
    // Get context with jQuery - using jQuery's .get() method.
    var regalosChart = $('#regalo').get(0).getContext('2d')
    $.getJSON("servicio-regalos.php", function (dataset) {
      console.log(dataset)
      let labelsPHP = dataset[0]
      let dataPHP = dataset[1]
      let backgroundColorPHP = []
      for (let i = 0; i < dataPHP.length; i++) {
        backgroundColorPHP[i] = randomColor()
      }
      var pieData = {
        labels: labelsPHP,
        datasets: [{
          data: dataPHP,
          backgroundColor: backgroundColorPHP
        }]
      };
      var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }

      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(regalosChart, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
      })
    });
  })
});

<?php
error_reporting(0);
if (!isset($_SESSION["login"])) {
  session_start();
}
if ($_SESSION["rol"] == 1) {
  include('layout/header.php');
  include('layout/menu.php');

?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="chars.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      'packages': ['gauge']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Hum. Ambiente', 100],
        ['Hum. Suelo', 100],
       // ['Temp. Ambiente', 50],
      ]);

      var options = {
        width: 400,
        height: 400,
        redFrom: 80,
        redTo: 100,
        yellowFrom: 45,
        yellowTo: 90,
        minorTicks: 5
      };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

      chart.draw(data, options);

      setInterval(function() {
        let JSON = $.ajax({
          url: "https://smartagronomy2021.000webhostapp.com/admin/api.php?q=1",
          // url: "http://localhost:3000/admin/api.php?q=1",
          dataType: "json",
          async: false
        }).responseText;
        let respuesta = jQuery.parseJSON(JSON)
        data.setValue(0, 1, respuesta[0].humedad - Math.round(2 * Math.random()));

        JSON = ""
        JSON = $.ajax({
          url: "https://smartagronomy2021.000webhostapp.com/admin/api.php?q=2",
          // url: "http://localhost:3000/admin/api.php?q=1",
          dataType: "json",
          async: false
        }).responseText;

        respuesta = jQuery.parseJSON(JSON)

        data.setValue(1, 1, respuesta[0].temperatura - Math.round(2 * Math.random()));

        //data.setValue(2, 1, 20 - Math.round(4 * Math.random()));
        chart.draw(data, options);

        if (respuesta[0].humedad >= 70) {
          $.ajax({
            type: "post",
            url: "correo.php",
            data: respuesta[0].humedad,
            async: false,
            success: function(response) {
              console.log("correo enviado de alerta");
            }
          });
        }

      }, 6000);
    }

    setInterval(function() {
      let JSON = $.ajax({
        //url: "https://smartagronomy2021.000webhostapp.com/admin/api.php?q=1",
        url: "http://localhost:3000/admin/api.php?q=1",
        dataType: "json",
        async: false
      }).responseText;

      let respuesta = jQuery.parseJSON(JSON);
      let fecha = respuesta[0].fecha;
      let hora = respuesta[0].hora;

      hora = hora.split(':');
      var h = hora[0];
      m = hora[1];
      h = h - 3;

      horas = h + ":" + m

      fecha = fecha.split('-');
      a = fecha[0]
      m = fecha[1]
      d = fecha[2]

      fecha = d + "-" + m + "-" + a

      $("#fecha").html(fecha);
      $("#hora").html(horas);

    }, 1000);
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
      <div>
        <h1>Smart Agronomy</h1>
        <br>
        <h3 class="bg-success">Monitoreo de Invernaderos en tiempo Real</h3>
        <hr>
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Invernadero</button>
          <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Invernadero #1</a>
            <a class="dropdown-item" href="#">Invernadero #2</a>
            <a class="dropdown-item" href="#">Invernadero #3</a>
          </div>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-info">Sensor</button>
          <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Grupo #1</a>
            <a class="dropdown-item" href="#">Grupo #2</a>
            <a class="dropdown-item" href="#">Grupo #3</a>
          </div>
        </div>
        <hr>
      </div>
      <div id="chart_div" style="width: 400px; height: 120px;"></div>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <hr>
      <h3>Última Conexión con los Sensores del invernadero</h3>
      <div class="col-8">
        <div class="alert alert-info" role="alert">
          Fecha: <b id="fecha"></b>
        </div>
        <div class="alert alert-success" role="alert">
          Hora: <b id="hora"></b>
        </div>
      </div>
    </div>
    <br>
    <br>
  </div>

<?php
  include('layout/footer.php');
} else {
  include('sinacseso.php');
}
?>
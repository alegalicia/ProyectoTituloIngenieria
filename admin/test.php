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
        ['Temp. Ambiente', 50],
      ]);

      var options = {
        width: 400,
        height: 400,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
      };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

      chart.draw(data, options);

      setInterval(function() {
        var JSON = $.ajax({
          //url: "https://smartagronomy2021.000webhostapp.com/admin/api.php?q=1",
          url: "http://localhost:3000/admin/api.php?q=1",
          dataType: "json",
          async: false
        }).responseText;
        var respuesta = jQuery.parseJSON(JSON);

        data.setValue(0, 1, respuesta[0].humedad - Math.round(4 * Math.random()));
        data.setValue(1, 1, 50);
        data.setValue(2, 1, 20);
        chart.draw(data, options);
      }, 1000);

      // setInterval(function() {
      //   data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
      //   chart.draw(data, options);
      // }, 1000);

      // setInterval(function() {
      //   data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
      //   chart.draw(data, options);
      // }, 1000);
    }
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container">
      <div>
        <h1>Smart Agronomy</h1>
        <hr>
      </div>
      <div id="chart_div" style="width: 400px; height: 120px;"></div>
    </div>
  </div>

<?php
  include('layout/footer.php');
} else {
  include('sinacseso.php');
}
?>
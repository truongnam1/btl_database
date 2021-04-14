<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          ['1',  160],
          ['2',  140],
          ['3',  120],
          ['4',  400],
          ['5',  420],
          ['6',  180],
          ['7',  100],
          ['8',  100],
          ['9',  170],
          ['10',  100],
          ['11',  340],
          ['12',  193],
          
        ]);

        var options = {
          title: 'Biểu đồ số đơn đặt theo tháng',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
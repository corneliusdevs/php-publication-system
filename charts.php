<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equi="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journal details</title>
  <link rel="stylesheet" type="text/css" href="./charts.css">

</head>

<body>

  <main id="publicationContainer" style="padding-left:2em">
    <section style="margin-bottom:100px">
      <!-- TEMPERATURE CHART -->
      <div>
        <canvas id="temperatureChart" style="width:100%;max-width: 700px;"></canvas>
      </div>
      <div style="margin-top:20px;margin-bottom:20px"><span><b>Change Chart type</b></span></div>
      <div>
        <!-- CHANGE CHART TYPE BUTTONS -->
        <button id="temperatureLineButton" class="chart_change_button">Line</button>
        <button id="temperatureBarButton" class="chart_change_button">Bar</button>
        <button id="temperatureScatterButton" class="chart_change_button">Scatter</button>

      </div>
    </section>
    <section style="margin-bottom:100px">
      <div>
        <!-- HUMIDITY CHART -->
        <div>
          <canvas id="humidityChart" style="width:100%;max-width:700px;"></canvas>
        </div>
        <div style="margin-top:20px;margin-bottom:20px"> <span><b>Change Chart type</b></span></div>
        <div>
          <!-- CHANGE CHART TYPE BUTTONS -->

          <button id="humidityLineButton" class="chart_change_button">Line</button>
          <button id="humidityBarButton" class="chart_change_button">Bar</button>
          <button id="humidityScatterButton" class="chart_change_button">Scatter</button>

        </div>
      </div>
    </section>

  </main>
  <!-- LOAD CHART.JS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js">
  </script>
  <script>
    const data = [{
        year: 2010,
        count: 10
      },
      {
        year: 2011,
        count: 20
      },
      {
        year: 2012,
        count: 15
      },
      {
        year: 2013,
        count: 25
      },
      {
        year: 2014,
        count: 22
      },
      {
        year: 2015,
        count: 30
      },
      {
        year: 2016,
        count: 28
      },
    ];

    // set default font size
    Chart.defaults.font.size = 18;

    // create tempertaure chart
    const temperatureChart = new Chart(document.getElementById("temperatureChart"), {
      type: "line",
      data: {
        labels: data.map(row => row.year),
        datasets: [{
          label: "Temperature(celsius)",
          backgroundColor: "lightblue",
          borderColor: "blue",
          fill: false,
          data: data.map(row => row.count)
        }]
      },
    })

    // create humidity chart
    const humidityChart = new Chart(document.getElementById("humidityChart"), {
      type: "line",
      data: {
        labels: data.map(row => row.year),
        datasets: [{
          label: "Humidity",
          backgroundColor: "rgb(14, 14, 133 )",
          borderColor: "blue",
          fill: false,
          data: data.map(row => row.count)
        }]
      },
    })

    // attach event listener to temperatureBarButton
    document.getElementById("temperatureBarButton").addEventListener("click", function() {
      changeChartType("temperatureBarButton")
    });

    // attach event listener to temperatureLineButton
    document.getElementById("temperatureLineButton").addEventListener("click", function() {
      changeChartType("temperatureLineButton")
    });

    // attach event listener to humidityBarButton
    document.getElementById("humidityBarButton").addEventListener("click", function() {
      changeChartType("humidityBarButton")
    });

    // attach event listener to humidityLineButton
    document.getElementById("humidityLineButton").addEventListener("click", function() {
      changeChartType("humidityLineButton")
    });

    // attach event listener to temperatureScatterButton
    document.getElementById("temperatureScatterButton").addEventListener("click", function() {
      changeChartType("temperatureScatterButton")
    });

    // attach event listener to humidityScatterButton
    document.getElementById("humidityScatterButton").addEventListener("click", function() {
      changeChartType("humidityScatterButton")
    });

    // chnage the chart type based on chart button
    function changeChartType(button) {
      if (button === "temperatureBarButton") {
        temperatureChart.config.type = "bar";
        temperatureChart.update();
      };
      if (button === "temperatureLineButton") {
        temperatureChart.config.type = "line";
        temperatureChart.update();
      }
      if (button === "humidityBarButton") {
        humidityChart.config.type = "bar";
        humidityChart.update();
      };
      if (button === "humidityLineButton") {
        humidityChart.config.type = "line";
        humidityChart.update();
      }
      if (button === "humidityScatterButton") {
        humidityChart.config.type = "scatter";
        humidityChart.update();
      };
      if (button === "temperatureScatterButton") {
        temperatureChart.config.type = "scatter";
        temperatureChart.update();
      }

    }
  </script>
</body>

</html>
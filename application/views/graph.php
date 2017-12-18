<!DOCTYPE HTML>
<html>
<head>
  <title>Humidity graph</title>
  <script>
  window.onload = function () {

  var dps = []; // dataPoints
  var chart = new CanvasJS.Chart("chartContainer", {
  	title :{
  		text: "Humidity"
  	},
  	axisY: {
  		includeZero: false
  	},
  	data: [{
  		type: "line",
      lineColor: "green",
      markerColor: "green",
  		dataPoints: dps
  	}]
  });

  var xVal = 0;
  var yVal = 100;
  var updateInterval = 1000;
  var dataLength = 20; // number of dataPoints visible at any point

  var updateChart = function (count) {

  	count = count || 1;

  	for (var j = 0; j < count; j++) {
  		yVal = yVal +  Math.round(5 + Math.random() *(-5-5));
  		dps.push({
  			x: xVal,
  			y: yVal
  		});
  		xVal++;
  	}

  	if (dps.length > dataLength) {
  		dps.shift();
  	}

  	chart.render();
  };

  updateChart(dataLength);
  setInterval(function(){updateChart()}, updateInterval);

  }
  </script>
  <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">
  <link rel="stylesheet" href="../../law/assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../../law/assets/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../law/assets/fonts/law-icons/font/flaticon.css">
  <link rel="stylesheet" href="../../law/assets/fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../law/assets/css/slick.css">
  <link rel="stylesheet" href="../../law/assets/css/slick-theme.css">
  <link rel="stylesheet" href="../../law/assets/css/helpers.css">
  <link rel="stylesheet" href="../../law/assets/css/style.css">
</head>
<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">

<nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">Pump it up!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="ion-navicon"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="probootstrap-navbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#section-sign_in">Sign in</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->

<div id="chartContainer" style="height: 450px; width: 75%; margin:0 auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>

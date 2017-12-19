

<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
  $username = ($this->session->userdata['logged_in']['username']);
} else {
  header("location: login");
}

include 'notifutil.php'
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pump It Up! Statistic Page</title>
  <!-- Bootstrap core CSS-->
  <link href="../../stat/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../stat/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../../stat/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../stat/css/sb-admin.css" rel="stylesheet">
  <script>
  window.onload = function () {

  var dps = []; // dataPoints
  var chart = new CanvasJS.Chart("chartContainer", {
  	title :{
  		text: "Humidity",
      fontFamily: "TH SarabunPSK",
      fontWeight: "bold",
      fontSize: 45
  	},
    axisX: {
      labelFontFamily: "TH SarabunPSK",
      labelFontSize: 18
    },
  	axisY: {
      labelFontFamily: "TH SarabunPSK",
      labelFontSize: 18,
  		includeZero: false
  	},
  	data: [{
  		type: "splineArea",
      color: "rgba(54,158,173,.7)",
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
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand">
      <font color="#FFFFFF">
        <?php
        echo "Welcome <b id='welcome'><i>" . $username . "</i> !</b>";
        ?>
      </font>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Index">
          <a class="nav-link" href="/index.php/welcome/user_login_process">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Index</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link" href="./settings">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Settings</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><font color="#0080FF">Pump It Up!</font> Statistics</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-tint"></i>
              </div>
              <div class="mr-5">Current Moisture : 9001</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shower"></i>
              </div>
              <div class="mr-5">Last Watered : XX/XX/XXXX XX:XX</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cog"></i>
              </div>
              <div class="mr-5">Current Mode : Manual</div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-tachometer"></i>
              </div>
              <div class="mr-5">Current Threshold : 9002</div>
            </div>
          </div>
        </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="row">
        <div class="col-lg-8">
          <div id="chartContainer" style="height: 100%; width: 100%; margin:0 auto;"></div>
          <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-history"></i> History</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src=<?php GetHistoryImg(0) ?> alt="">
                  <div class="media-body">
                  <?php GetHistoryText(0) ?>
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="./../../stat/assets/image/imgnotif2.png" alt="">
                  <div class="media-body">
                    <strong>Watered</strong> the plant
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="./../../stat/assets/image/imgnotif1.png" alt="">
                  <div class="media-body">
                    The plant is <strong>dry!</strong>
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="./../../stat/assets/image/imgnotif2.png" alt="">
                  <div class="media-body">
                    <strong>Watered</strong> the plant
                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                  </div>
                </div>
              </a>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Pump It Up! Group 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below to confirm.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../stat/vendor/jquery/jquery.min.js"></script>
    <script src="../../stat/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../stat/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../../stat/vendor/chart.js/Chart.min.js"></script>
    <script src="../../stat/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../stat/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../stat/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../../stat/js/sb-admin-datatables.min.js"></script>
    <script src="../../stat/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>

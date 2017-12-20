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
  <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
          <a class="nav-link" href="/index.php/welcome/user_login_process#section-sign_in">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Index</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link" href="./settings.php">
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
        <li class="breadcrumb-item active"><font color="#0080FF">Pump It Up!</font> Settings</li>
      </ol>
      <!-- Icon Cards-->

      <?php
            if(isset($error_message)){
                echo "<div class='alert alert-danger'>";
                  if (isset($error_message)) {
                  echo $error_message;
                  }
                  echo "</div>";
            }
      ?>

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
    <div class="container">
	<h4>Automatic watering</h4>
  <form action="/index.php/updatejson/updatesettings" method="POST">
    <div class="form-group">
      <label class="switch">
        <?php
          $tmp = GetUserSettings();
          $checked = "";
          $value = $tmp['threshold'];
          if($tmp['mode']==1){
            $checked = "checked";
          }
        ?>
        <input type="checkbox"<?php echo $checked; ?> name = "mode">
      <span class="slider round"></span>
      </label>
    </div>
    <div class="form-group">
	  <h4>Threshold</h4>
      <input name="threshold" type="number" class="form-control" id="thres" value = <?php echo $value; ?> placeholder="Preferred Threshold" required>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div><a class="scroll-to-top rounded" href="#page-top">
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

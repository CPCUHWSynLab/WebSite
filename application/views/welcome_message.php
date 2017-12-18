<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>
    <!--
    More Templates Visit ==> ProBootstrap.com
    Free Template by ProBootstrap.com under the License Creative Commons 3.0 ==> (probootstrap.com/license)

    IMPORTANT: You can do whatever you want with this template but you need to keep the footer link back to ProBootstrap.com
    -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Homepage</title>
		<meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
		<meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

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

    <section class="pb_cover_v1 text-left cover-bg-black cover-bg-opacity-1" style="background-image: url(../../law/assets/images/1900x1200_img_7_2.jpg)" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-end">
          <div class="col-md-6  order-md-1">
            <h2 class="heading mb-3">Pump it up!</h2>
            <div class="sub-heading"><p class="mb-5">Automatic Watering System for Plants</p>
            <p><a href="#section-sign_in" role="button" class="btn smoothscroll pb_outline-light btn-xl pb_font-13 p-4 rounded-0 pb_letter-spacing-2">SIGN IN</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="pb_section pb_section_v1" data-section="about" id="section-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 pr-md-5 pr-sm-0">
            <h2 class="mt-0 heading-border-top mb-3 font-weight-normal">Take care of your plants, Wherever you are.</h2>
            <p>Pump It Up! will help you take care of your houseplant even while you are away.</p>
            <p>With the integration of humidity sensor and internet functionality, there are wide-ranged functionalities avaliable.</p>
            <p>Watch over your plant status and command over the internet, or choose to water the plant automatically.</p>
            <p>Try out Pump It Up! today, looking after houseplant will never be any easier!</p>
            </div>
          <div class="col-lg-7">
            <div class="images">
              <img class="img2" src="../../law/assets/images/800x500_img_1_1.jpg" alt="free Template by ProBootstrap.com">
              <img class="img1 img-fluid" src="../../law/assets/images/600x450_img_2_1.jpg" alt="free Template by ProBootstrap.com">
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- END section -->


<?php echo form_open('/welcome/user_login_process#section-sign_in'); ?>

    <section class="pb_section bg-light" data-section="sign_in" id="section-sign_in">
      <div class="container" style="height:450px;">
          <?php
                if(isset($error_message) || validation_errors()){
                    echo "<div class='alert alert-danger'>";
                      if (isset($error_message)) {
                      echo $error_message;
                      }
                      echo validation_errors();
                      echo "</div>";
                }
            ?>
        <div class="row justify-content-md-center text-center">
          <div class="col-lg-7">
            <h2 class="heading-border-top font-weight-normal">Sign In</h2>
          </div>
          <div class="mt-1 col-lg-7 text-center">
            <form action="#">
              <div class="col-lg">
                <div class="form-group form-group-sm">
                  <label for="username">Username</label>
                  <input type="text" class="form-control p-3 rounded-0" name="username" id="username" placeholder="Enter your username">
                </div>
              </div>
              <div class="col-lg">
                <div class="form-group form-group-sm">
                  <label for="password">Password</label>
                  <input type="password" class="form-control p-3 rounded-0" name="password" id="password" placeholder="Enter your password">
                </div>
              </div>
              <div class="form-group form-group-sm">
                  <input type="submit" class="btn pb_outline-dark pb_font-13 pb_letter-spacing-2 p-3 rounded-0" value="Sign in">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="pb_sm_py_cover text-center cover-bg-black cover-bg-opacity-4" style="background-image: url(../../law/assets/images/1900x1200_img_3.jpg)">
    <div class="container">
      <div class="col-md-12">
        <h2 class="heading mt-0 mb-3">Developers</h2>
        <p class="sub-heading pb_color-light-opacity-8">Pakanan Aimherungilas 5830406221</p>
        <p class="sub-heading pb_color-light-opacity-8">Nuttapod Liknapichitkul 5831019221</p>
        <p class="sub-heading pb_color-light-opacity-8">Nitit Kaweeratanakit 5831033021</p>
        <p class="sub-heading pb_color-light-opacity-8">Panayu Keelawat 5831036921</p>
        <p class="sub-heading pb_color-light-opacity-8">Siraphat Gruysiriwong 5831078221</p>
      </div>
    </div>
  </section>
  <!-- END section -->

    <footer class="bg-light" style="padding:10px;"  role="contentinfo">
      <div class="container">
        <div class="row text-center">
          <div class="col">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#section-home" class="p-2"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#section-home" class="p-2"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#section-home" class="p-2"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col text-center">
            <p class="pb_font-14">&copy; 2017 Internet of Things (IoT) Project for <font color="#0066cc">Hardware Synthesis Lab</font>.</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- loader -->
    <div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#FDA04F"/></svg></div>


    <script src="../../law/assets/js/jquery.min.js"></script>

    <script src="../../law/assets/js/popper.min.js"></script>
    <script src="../../law/assets/js/bootstrap.min.js"></script>
    <script src="../../law/assets/js/slick.min.js"></script>

    <script src="../../law/assets/js/jquery.waypoints.min.js"></script>
    <script src="../../law/assets/js/jquery.easing.1.3.js"></script>

    <script src="../../law/assets/js/main.js"></script>
	</body>
</html>

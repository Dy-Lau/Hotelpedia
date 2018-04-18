<?php
session_start();
include_once("../../connect/connect.php");

    if($_SESSION['type'] != 'admin'){
            echo'<script>
            window.location.href="home.php";
            </script>';
        }

      $user_id = $_SESSION['user_id'];
      $fetch_user = mysqli_query($connect, "SELECT * FROM user WHERE user_id = '$user_id'")
      or die("Error: Could not fetch rows!".mysqli_error($connect));
      $row = mysqli_fetch_array($fetch_user);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotelpedia</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles_about.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/hotelpedia_logo_4_sm.png" />

  </head>
<body class="">
 <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="home.php" class="pull-left visible-md visible-lg">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="home.php"><h1><b>Hotelpedia</b></h1></a>
            <!-- <p>Find your place to stay. In Legazpi.</p> -->
          </div>

          <div class="navbar-brand">
            <a href="home.php"><h1><b> </b></h1></a>
            <!-- <p>Find your place to stay. In Legazpi.</p> -->
          </div>

          <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="collapsable-nav" class="collapse navbar-collapse">
           <ul id="nav-list" class="nav navbar-nav navbar-left">
            <li class=""> <!-- Removed Active class-->
              <a href="home.php">
                <span class=""></span><br class="hidden-xs"> Welcome</a>
            </li>
            <li>
              <a href="hotels-category-login.php">
                <span class=""></span><br class="hidden-xs"> Hotels</a>
            </li>
            <li>
              <a href="about-login.php">
                <span class=""></span><br class="hidden-xs"> About</a>
            </li>
            <li>
              <ul class="nav" style="margin-top: 32px;">
                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                   HELLO! <?php echo 'Admin ', $row['firstname'] ; ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" style="width: 100%;">
                     <li><a href="../adminpage.php">Dashboard</a></li>
                    <li><a href="profile.php">Account Profile</a></li>
                    <li><a  href="logout.php" id="login"> Log Out</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="home.php">HOTELPEDIA</a></li>
                  </ul>
                </li>
              </ul>
              <!-- <a href="logout.php" id="login">
                <span class=""></span><br class="hidden-xs"> HELLO! <?php  ?></p></a> ....echo $row['firstname'] ;-->
            </li>
          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>

  <div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- Menu -->
    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>

    <!-- Items -->
    <div class="carousel-inner" role="listbox" style=" width:100%; height: 878px !important;">

        <div class="item active">
            <img src="../images/banner-992.jpg" alt="Slide 1" />
            <div class=" carousel-caption d-block img-fluid ">
              <h1><strong>WELCOME TO <span style="color: #fcdd44;">HOTELPEDIA</span> </strong></h1>
              <h6 style="color: #fcdd44;">Your site to track your stay and enjoy while away!</h6>
            </div>
        </div>
        <div class="item">
            <img src="../images/blur.jpg" alt="Slide 2" />
            <div  class="carousel-caption img-fluid" >
              <h1><strong> FIND <span style="color: #fcdd44;">THE BEST</span>  PLACE</strong></h1>
              <p style="color: #fcdd44;">For Your Holidays!</p>
            </div>
        </div>
        <div class="item">
            <img src="../images/blur-hotel.jpg" alt="Slide 3" />
            <div class="carousel-caption img-fluid " >
              <h1><strong> HOTEL<span style="color: #fcdd44;">PEDIA</span></strong></h1>
              <p style="color: #fcdd44;">Wonderful Destinations!</p>
            </div>
        </div>

    </div>
    <script>
        $('.carousel').carousel('cycle')
    </script>

  </div>  <!--.jumbotron-->

<section class="container tm-home-section-1" id="more">
    <div class="row">
      <!-- slider -->
      <div class="flexslider flexslider-about effect2" style="margin-top:-100px;">
        <ul class="slides">

            <img src="../images/about-logo.jpg" height="370"  width="450"alt="img">
            <div class="flex-caption">
              <h2 class="slider-title">HotelPedia. . .</h2>
              <h3 class="slider-subtitle">A website that contains all hotels in Albay. Every hotel is detailed and updated in terms of class, price, features and many more! Adapting the Google Maps API, this site is interactive to end-users to obtain informations they need to choose a hotel in Albay. </h3>
              <p class="slider-description">HotelPedia is a website for our project in Web Programming. Questions?<a href="http://www.facebook.com/princemauro.ang" target="_parent">Contact Us</a>. <br><br>
                    </p>

            </div>
        </ul>
      </div>
    </div>

    <div class="section-margin-top about-section">
      <div class="row">
        <div class="tm-section-header">
          <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
          <div class="col-lg-6 col-md-6 col-sm-6"><h2 class="tm-section-title">Who We Are</h2></div>
          <div class="col-lg-3 col-md-3 col-sm-3"><hr></div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tm-about-box-1">
            <a href="#"><img src="../images/1pma.jpg" alt="img" class="tm-about-box-1-img"></a>
            <h3 class="tm-about-box-1-title"> Prince Mauro E. Ang <span><br>UX Designer and Programmer</span></h3>
            <p class="margin-bottom-15 gray-text"> I am focusing on user-interactive website.</p>
            <div class="gray-text">
              <a href="#" class="tm-social-icon"><i class="fa fa-twitter-twitter"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tm-about-box-1">
            <a href="#"><img src="../images/3dal.jpg" alt="img" class="tm-about-box-1-img"></a>
            <h3 class="tm-about-box-1-title">Dyron A. Laurinaria <span><br> Programmer and Visual Artist </span></h3>
            <p class="margin-bottom-15 gray-text"> I created the visual of this site.</p>
            <div class="gray-text">
              <a href="#" class="tm-social-icon" style="visibility: visible;"><i class="fa fa-twitter"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tm-about-box-1">
            <a href="#"><img src="../images/2jmb.jpg" alt="img" class="tm-about-box-1-img"></a>
            <h3 class="tm-about-box-1-title">Jake M. Balbedina <span><br>Programmer and Content Manager</span></h3>
            <p class="margin-bottom-15 gray-text"> Information are my doings.</p>
            <div class="gray-text">
              <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tm-about-box-1">
            <a href="#"><img src="../images/4ad.jpg" alt="img" class="tm-about-box-1-img"></a>
            <h3 class="tm-about-box-1-title">Angelo Dina <span><br>Programmer and Researcher</span></h3>
            <p class="margin-bottom-15 gray-text"> Data gathering are on me!</p>
            <div class="gray-text">
              <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-pinterest"></i></a>
              <a href="#" class="tm-social-icon"><i class="fa fa-google-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

      </div><!-- End of #home-tiles -->
  </div><!-- End of #main-content -->

<footer class="panel-footer">
    <div class="container">
      <div class="row">
        <div class="navbar-brand">
            <a href="index.html"><h1>Hotelpedia</h1></a>
            <span>&copy; Copyright Hotelpedia 2017</span>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery (Bootstrap JS plugins depend on it) -->
  <script src="../../js/jquery-2.1.4.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/script.js"></script>
</body>
</html>

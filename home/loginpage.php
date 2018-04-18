<?php
session_start();
include_once("connect/connect.php");

    if($_SESSION['type'] != 'user'){
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/hotelpedia_logo_4_sm.png" />

    <style>
      p[id="login"]{
        color: #be9900;
        font-family: san-serif;
        font-size: 12px;
        line-height: 0px;
      }

    </style>

  </head>

<body>
  <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a href="loginpage.php" class="pull-left visible-md visible-lg">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="loginpage.php"><h1><b>Hotelpedia</b></h1></a>
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
              <a href="loginpage.php">
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
                   HELLO! <?php echo $row['firstname'] ; ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" style="width: 100%;">
                    <li><a href="profile.php">Account Profile</a></li>
                    <li><a  href="logout.php" id="login"> Log Out</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="loginpage.php">HOTELPEDIA</a></li>
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
            <img src="images/banner-992.jpg" alt="Slide 1" />
            <div class=" carousel-caption d-block img-fluid ">
              <h1><strong>WELCOME TO <span style="color: #fcdd44;">HOTELPEDIA</span> </strong></h1>
              <h6 style="color: #fcdd44;">Your site to track your stay and enjoy while away!</h6>
            </div>
        </div>
        <div class="item">
            <img src="images/blur.jpg" alt="Slide 2" />
            <div style="top:200px;" class="carousel-caption img-fluid" >
              <h1><strong> FIND <span style="color: #fcdd44;">THE BEST</span>  PLACE</strong></h1>
              <p style="color: #fcdd44;">For Your Holidays!</p>
            </div>
        </div>
        <div class="item">
            <img src="images/blur-hotel.jpg" alt="Slide 3" />
            <div style="bottom: 0;" class="carousel-caption img-fluid " >
              <h1><strong> HOTEL<span style="color: #fcdd44;">PEDIA</span></strong></h1>
              <p style="color: #fcdd44;">Wonderful Destinations!</p>
            </div>
        </div>

        <!-- <a href="#carousel" class=" carousel-control" data-slide="prev">

        </a>
        <a href="#carousel" class=" carousel-control" data-slide="next">

        </a> -->
        <div id="banner-text" class="col-xs-12" >

          <div class="row search">
            <div class="col-sm-8 col-sm-offset-2">
              <form role="form" action = "search_login.php" method="GET">
                <div class="input-group">
                  <input type="text" name="search" class="form-control searchBar" placeholder="Search for Hotel Name or Destination">
                  <span class="input-group-btn">
                  <input class="btn btn-default btn-sm searchBtn" type="submit" name="Searchbtn" value = "F i n d &nbsp; H o t e l"> <!-- name="Serachbtn" -->
                  <!-- <button class="btn btn-default btn-sm " type="submit"><span> &nbsp;F i n d &nbsp;H o t e l s</span></button>-->
                  </span>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
<script>
    $('.carousel').carousel('cycle')
</script>


  <div id="main-content" class="container">
    <div id="home-tiles" class="row">

      <div id="" style="margin-bottom: 80px;">
        <h1 class="text-center" style="font-size:9px;text-transform: uppercase; letter-spacing: 5px;"><strong>Little About Us</strong></h1>
        <div class="col-sm-12" style="margin:50px 0 50px 0;">
          <img  class="col-lg-3 col-md-4 col-sm-5 col-xs-12 col-lg-offset-2 col-md-offset-1 thumbnail" src="images/final-logo-png.png" height="350"  width="300"alt="img">
          <div class="col-lg-6 col-md-5 col-sm-7 col-xs-12 col-lg-offset-1 col-md-offset-0">
            <h1 class="col-lg-8"><strong>Your best site to enjoy where to stay</strong></h1>

            <h4 class="col-lg-8 text-justify" style="margin-top:30px;line-height:25px;">
               <small>Here on our website you'll find extensive information not only about us but also about the abundance of Legazpi hotel establishments. On behalf of the entire team at Hotelpedia  , I extend you a very warm welcome and trust your visit with us will be both enjoyable and comfortable.
               </small>
            </h4>

            <h6 class="col-lg-8 text-justify "style="margin-top:30px;">
              <strong>Prince Mauro Ang</strong>
              <small>- Director at Hotelpedia Corp</small>
            </h6>

          </div>
        </div>
      </div>

      <!-- Text: Top 3 Hotels -->
      <div class="container">
        <div style="margin-bottom: 70px;">
          <div class=" col-md-4 col-sm-12 col-xs-12" > <hr class=" style1 "> </div>

          <div class="  col-md-4 col-sm-12 col-xs-12 top-hotels" ><h1 class=" text-center  "><strong>Top Hotels</strong></h1> </div>

          <div class=" col-md-4 col-sm-12 col-xs-12" > <hr class="style2"> </div>
       </div>
      </div>
      <!-- End of Text: Top 3 Hotels -->


      <!-- 3 Hotels -->
      <?php
        $fetch_hotel = mysqli_query($connect, "SELECT hotel_name, image1, hotels.hotel_id, avg(reviews.rating) as average FROM hotels  left join reviews on hotels.hotel_id = reviews.hotel_id GROUP BY hotels.hotel_id, reviews.hotel_id ORDER BY average DESC") or die ("ERROR: " .mysqli_error($connect));
        $count = 0;

      while($row = mysqli_fetch_array($fetch_hotel)){
        if($count < 3){
        echo'
        <div  class="col-md-4 col-sm-6 col-xs-12 " method="GET" >
          <a href="hotel-single-category-login.php?hotel_id='.$row['hotel_id'].'" class="thumbnail hover-shadow" style="text-decoration: none;"  target="_blank">
            <img src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" id="hotel_img" class="hover">
              <p style="text-align: center;color:#000;">'.$row['hotel_name'].'</p>
            </img>
          </a>
        </div>';
      $count ++;}}
      ?>
       <!-- End of 3 Hotels -->

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
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    window.onload = function () {
        if (typeof history.pushState === "function") {
            history.pushState("jibberish", null, null);
            window.onpopstate = function () {
                history.pushState('newjibberish', null, null);
            };
        } else {
            var ignoreHashChange = true;
            window.onhashchange = function () {
                if (!ignoreHashChange) {
                    ignoreHashChange = true;
                    window.location.hash = Math.random();
                } else {
                    ignoreHashChange = false;
                }
            };
        }
    }
 </script>
</body>
</html>

<?php
session_start();
include_once('connect/connect.php');

    if($_SESSION['type'] != 'user'){
        echo'<script>
        window.location.href="home.php";
        </script>';
    }

      $user_id = $_SESSION['user_id'];
      $fetch_user = mysqli_query($connect, "SELECT * FROM user WHERE user_id = '$user_id'")
      or die("Error: Could not fetch rows!".mysqli_error($connect));
      $row = mysqli_fetch_array($fetch_user);

	$search = $_GET['search'];

	$search_query = "SELECT * FROM hotels, amenities WHERE hotels.hotel_id = amenities.hotel_id AND (hotel_name like '%".$search."%') OR (hotel_address LIKE '%".$search."%') GROUP BY hotels.hotel_id";
    $query = mysqli_query($connect, $search_query) or die ("ERROR: " .mysqli_error($connect));
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
    <link rel="shortcut icon" type="image/x-icon" href="images/hotelpedia_logo_4_lg.png" />

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
            <li class="active">
              <a href="hotels-category-login.php">
                <span class=""></span><br class="hidden-xs"> Hotels</a>
            </li>
            <li>
              <a href="about.php">
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
    <ol class="carousel-indicators" style="top: 400px;">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>

    <!-- Items -->
    <div class="carousel-inner" role="listbox" style=" width:100%; height: 240px !important;">

        <div class="item active">
            <img src="images/banner-992.jpg" alt="Slide 1" />

        </div>
        <div class="item">
            <img src="images/blur.jpg" alt="Slide 2" />

        </div>
        <div class="item">
            <img src="images/blur-hotel.jpg" alt="Slide 3" />

        </div>

        <!-- <a href="#carousel" class=" carousel-control" data-slide="prev">

        </a>
        <a href="#carousel" class=" carousel-control" data-slide="next">

        </a> -->
    </div>
<script>
    $('.carousel').carousel('cycle')
</script>



  <div id="main-content" class="container">
    <div id="home-tiles" class="row">
      <h2 class="text-center"><strong class="leg-title">LEGAZPI HOTELS</strong></h2>

      <div  class="col-md-12" >
        <div class="row search2 ">
            <form role="form" action = "search_login.php" method="GET"><!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
              <div class="input-group">
                <input type="text" name="search" class="form-control searchBar2"  placeholder="Search for Hotel Name or Destination">
                <span class="input-group-btn">
                <input class="btn btn-default btn-sm searchBtn2" type="submit" name="Searchbtn" value = "F i n d &nbsp; H o t e l"> <!-- name="Serachbtn" -->
                <!-- <button class="btn btn-default btn-sm " type="submit"><span> &nbsp;F i n d &nbsp;H o t e l s</span></button>-->
                </span>
              </div>
            </form>
        </div>
      </div>

<?php
  if (mysqli_num_rows($query) > 0){
      while($row = mysqli_fetch_array($query)){
      $hotel_id = $row['hotel_id'];
      $review_count = 0;

          $fetch_review = mysqli_query($connect, "SELECT * FROM reviews WHERE hotel_id = '".$hotel_id."'") or die ("ERROR: ". mysqli_error($connect));
            while($row_review = mysqli_fetch_array($fetch_review)){
            $review_count ++;
            }
      echo'
      <section class="row">
        <div class="menu-item-tile col-md-12" >
          <div class="row">
            <div class="col-sm-5">
              <div class="menu-item-photo">
                <img class="img-responsive" width="250" height="150" src="data:image/jpeg;base64, '.base64_encode($row['image1']).'"alt="Item">
              </div>

            </div>

            <div class="menu-item-description col-sm-7">
              <h3 class="menu-item-title"><strong>'.$row['hotel_name'].'</strong></h3>
              <p class="menu-item-details">'.$row['hotel_address'].'</p>
              <a href="" class="menu-item-details glyphicon glyphicon-pencil" style="text-decoration: none;"> '.$review_count.' Reviews &nbsp;&nbsp;|&nbsp;&nbsp;
                <span class="glyphicon glyphicon-star"> '.$row['hotel_class'].'-Star Hotel</span>
              </a>
              <div class="menu-item-price">LOWEST PRICE   <span> ₱'.$row['hotel_price'].'.00</span></div>

              <div class="view-btn" method="GET">
                <a href="hotel-single-category-login.php?hotel_id='.$hotel_id .'">View Deal</a>
              </div>
            </div>
            <div class="clearfix visible-lg-block visible-md-block"></div>

          </div> <!-- end of class="row" -->
          <hr class="visible-lg visible-md visible-xs">
        </div> <!-- end of .menu-item-tile --> ';
      }
  }
  else
      echo '<div style="opacity: 0.5; font-family: sanserif;">
            <br><br><h2 style="text-indent: 150px;">No Result Found...</h1>
            <h3 style="text-indent: 160px;">Suggestions: </h3>
            <h4 style="margin-left: 165px; line-height: 23px;"> • Make sure that all words are spelled correctly.<br>
                 • Try different keywords.<br>
                 • Try more general keywords.<br>
                 • Try fewer keywords.</h4>
            </div><br><br><br><br><br><br><br>';
?>
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

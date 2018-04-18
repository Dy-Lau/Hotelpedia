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
    <link rel="shortcut icon" type="image/x-icon" href="images/hotelpedia_logo_4_lg.png" />

    <style>
        p[id="login"]{
          color: #be9900;
          font-family: san-serif;
          font-size: 12px;
          line-height: 0px;
        }

        a#pagination{
          color: yellow;
          padding: 10px;
          text-decoration: none;
          background-color: black;
          border: 1px solid yellow;
          border-radius: 5px;
          margin-left: 10px;
        }

        a#pagination:hover{
          width: 60px;
          background-color: white;
          color: black;
        }

        @media (max-width: 767px){
        a#pagination{
          margin-left: 0px;
        }
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
      $results_per_page = 5;

      $fetch_hotel = mysqli_query($connect, "SELECT * FROM hotels, amenities WHERE amenities.hotel_id = hotels.hotel_id") or die ("ERROR:" .mysqli_error($connect));
      $number_of_results = mysqli_num_rows($fetch_hotel);

      $number_of_pages = ceil($number_of_results/$results_per_page);

      if(!isset($_GET['page'])){
        $page = 1;
      }
      else{
        $page =  $_GET['page'];
      }

      $this_page_first_result = ($page-1)*$results_per_page;

      $query = mysqli_query($connect, "SELECT * FROM hotels, amenities WHERE amenities.hotel_id = hotels.hotel_id LIMIT " . $this_page_first_result . ',' .$results_per_page) or die ("ERROR:" .mysqli_error($connect));
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
               <a href="hotel-single-category-login.php?hotel_id='.$hotel_id .'" target="_blank">
               <img  class="img-responsive img-rounded  hover-shadow" width="250" height="150" src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" alt="Item"></a>
              </div>

            </div>

            <div class="menu-item-description col-sm-7">
              <a href="hotel-single-category-login.php?hotel_id='.$hotel_id .'" target="_blank" style="text-decoration:none;">
              <h3 class="menu-item-title"><strong>'.$row['hotel_name'].'</strong></h3></a>
              <p class="menu-item-details">'.$row['hotel_address'].'</p>
              <a href="" class="menu-item-details glyphicon glyphicon-pencil" style="text-decoration: none;"> '.$review_count.' Reviews &nbsp;&nbsp;|&nbsp;&nbsp;
                <span class="glyphicon glyphicon-star"> '.$row['hotel_class'].'-Star Hotel</span>
              </a>
              <div class="menu-item-price">LOWEST PRICE   <span> ₱'.$row['hotel_price'].'.00</span></div>

              <div class="view-btn" method="GET">
                <a href="hotel-single-category-login.php?hotel_id='.$hotel_id .'" target="_blank">View Deal</a>
              </div>
            </div>
            <div class="clearfix visible-lg-block visible-md-block"></div>

          </div> <!-- end of class="row" -->
          <hr class="visible-lg visible-md visible-xs">
        </div> <!-- end of .menu-item-tile -->

      </section>


        ';
      }
        for ($page=1; $page<=$number_of_pages; $page++){
          echo '<div style="text-align: center; margin-left:500px;"><a id="pagination" class="col-xs-4 col-md-1 text-center" href="hotels-category-login.php?page='.$page.'"> '. $page.' </a></div>';
        }
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

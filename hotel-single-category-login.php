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
    <script src="js/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="images/hotelpedia_logo_4_sm.png" />

  <style>
/*    .read-more-state {
  display: none;
}

.read-more-target {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;
}

.read-more-state:checked ~ .read-more-wrap .read-more-target {
  opacity: 1;
  font-size: inherit;
  max-height: 999em;
}

.read-more-state ~ .read-more-trigger:before {
  color: black;
  content: 'Show more';
}

.read-more-state:checked ~ .read-more-trigger:before {
  content: 'Show less';
  color: black;
}

.read-more-trigger {
  cursor: pointer;
  display: inline-block;
  float: right;
  padding: 0 .5em;
  color: #666;
  font-size: .9em;
  line-height: 2;
  border: 1px solid #ddd;
  border-radius: .25em;
}*/

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
    </div>
    <script>
        $('.carousel').carousel('cycle')
    </script>

  <div id="main-content" class="container">
    <div id="home-tiles" class="row">
  <?php
      $hotel_id = $_GET['hotel_id'];
      $fetch_hotel = mysqli_query($connect, "SELECT * FROM hotels, amenities WHERE hotels.hotel_id = '".$hotel_id."' AND amenities.hotel_id = hotels.hotel_id")
                      or die ("ERROR: " .mysqli_error($connect));

      while($row = mysqli_fetch_array($fetch_hotel)){
      echo'
      <section class="">
        <div class="col-sm-12" id="hotel-description">
          <h3>'.$row['hotel_name'].'</h3>
          <p>'.$row['hotel_address'].'</p>
        </div>
      </section><!-- #hotel-description -->

      <section class="">
        <div class="col-sm-12" id="gallery">
          <h3>Gallery</h3>
          <hr>
        </div>

        <div class="">
          <div class="column col-md-4 col-sm-12 col-xs-12 ">
            <img src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" onclick="openModal();currentSlide(1)" class="hover-shadow ">
            <div class="desc">'.$row['image1_name'].'</div>
          </div>
          <div class="column col-md-4 col-sm-12 col-xs-12">
            <img src="data:image/jpeg;base64, '.base64_encode($row['image2']).'" onclick="openModal();currentSlide(2)" class="hover-shadow">
            <div class="desc">'.$row['image2_name'].'</div>
          </div>
          <div class="column col-md-4 col-sm-12 col-xs-12">
            <img src="data:image/jpeg;base64, '.base64_encode($row['image3']).'" onclick="openModal();currentSlide(3)" class="hover-shadow">
            <div class="desc">'.$row['image3_name'].'</div>
          </div>
          <div class="column col-md-4 col-sm-12 col-xs-12">
            <img src="data:image/jpeg;base64, '.base64_encode($row['image4']).'" onclick="openModal();currentSlide(4)" class="hover-shadow">
            <div class="desc">'.$row['image4_name'].'</div>
          </div>
        </div>

        <div id="myModal" class="modal col-sm-12">
          <span class="close cursor" onclick="closeModal()">&times;</span>
          <div class="modal-content">

            <div class="mySlides">
              <div class="numbertext">1 / 4</div>
                <img src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" style="width:80%;height:500px;margin:25px 0 25px 100px;">
            </div>

            <div class="mySlides">
              <div class="numbertext">2 / 4</div>
                <img src="data:image/jpeg;base64, '.base64_encode($row['image2']).'" style="width:80%;height:500px;margin:25px 0 25px 100px;">
            </div>

            <div class="mySlides">
              <div class="numbertext">3 / 4</div>
                <img src="data:image/jpeg;base64, '.base64_encode($row['image3']).'" style="width:80%;height:500px;margin:25px 0 25px 100px;">
            </div>

            <div class="mySlides">
              <div class="numbertext">4 / 4</div>
                <img src="data:image/jpeg;base64, '.base64_encode($row['image4']).'" style="width:80%;height:500px;margin:25px 0 25px 100px;">
            </div>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <div class="caption-container">
              <p id="caption"></p>
            </div>

            <div class="column ">
              <img class="demo" src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" onclick="currentSlide(1)" alt="Nature">
            </div>

            <div class="column ">
              <img class="demo" src="data:image/jpeg;base64, '.base64_encode($row['image2']).'" onclick="currentSlide(2)" alt="Trolltunga">
            </div>

            <div class="column ">
              <img class="demo" src="data:image/jpeg;base64, '.base64_encode($row['image3']).'" onclick="currentSlide(3)" alt="Mountains">
            </div>

            <div class="column">
              <img class="demo" src="data:image/jpeg;base64, '.base64_encode($row['image4']).'" onclick="currentSlide(4)" alt="Lights">
            </div>
          </div>
        </div>   <!-- gallery-lightbox/image gallery-->
      </section><!-- #gallery-->

      <section class="">
        <div class="col-sm-12" id="about-hotel">
          <h1> About</h1>
          <div class="booking-btn">
            <a href="'.$row['hotel_booking'].'" target="_blank">Book Now!</a>
          </div>
          <hr>

          <div class="col-sm-6">
            <h2>Amenities</h2>
            <ul class="col-sm-6 hotel-amenities-details">Hotel Amenities
              <li>'.$row['amenities_name'].'</li>
            </ul>
            <ul class="col-sm-6 hotel-amenities-details">Room Amenities
              <li>Air Conditioning</li>
              <li>Refrigerator in room</li>
            </ul>
          </div>

          <div class="col-sm-6">
            <h2>Details</h2>
            <h3 class="col-sm-6 hotel-amenities-details">PRICE RANGE</h3>
            <p class="col-sm-12 hotel-amenities-details">₱'.$row['hotel_price'].'.00</p>

            <h3 class="col-sm-6 hotel-amenities-details">HOTEL CLASS</h3>
            <p class="col-sm-12 hotel-amenities-details">'.$row['hotel_class'].'-star Hotel</p>

            <h3 class="col-sm-6 hotel-amenities-details">ROOM TYPES</h3>
            <p class="col-sm-12 hotel-amenities-details">Suites ,Non-Smoking Rooms ,Family Rooms</p>

            <h3 class="col-sm-6 hotel-amenities-details">NUMBER OF ROOMS</h3>
            <p class="col-sm-12 hotel-amenities-details">'.$row['hotel_numrooms'].'</p>
          </div>
        </div>

        <section class="">
        <div class="col-sm-12" id="about-hotel">
          <h1> Map</h1>
          <hr>
          <a href="'.$row['hotel_mapLink'].'"></a>
            <div id="map-tile">
              <iframe src="'.$row['hotel_mapFrame'].'" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        </section>';}
?>

<?php
    echo'<section class="">
        <div class="col-sm-12" id="about-hotel">
          <h1> Reviews</h1>

          <div class="booking-btn" method="GET">
            <a href="write-reviews.php?hotel_id='.$hotel_id.'" target="_blank">How Was It?</a>
          </div>
          <hr>';

     $fetch_review = mysqli_query($connect, "SELECT * FROM hotels, reviews, user WHERE hotels.hotel_id = '".$hotel_id."' AND user.user_id = reviews.user_id AND hotels.hotel_id = reviews.hotel_id AND reviews.hotel_id = '".$hotel_id."'") or die ("ERROR: " .mysqli_error($connect));

      while($row = mysqli_fetch_array($fetch_review)){
      echo'
          <div id="review-tile">
            <a href= "data:image/jpeg;base64, '.base64_encode($row['image']).'">
              <img src="data:image/jpeg;base64, '.base64_encode($row['image']).'">
              <h3>'.$row['firstname'].' '.$row['lastname'].'</h3>
            </a>

            <h5 method="GET" style="color: #555; padding-bottom: 10px; margin:-150px 0 0px 220px;">
              Rating: '.$row['rating'].' - Reviewed last '.$row['review_date'].'
              <a href="delete_review.php?user_id='.$row['user_id'].'&review_id='.$row['review_id'].'&hotel_id='.$hotel_id.'" style="cursor: pointer; float:right;color:red;">Delete Review</a>
            </h5>

            <p style="color:black; padding:20px; width:80%; margin: -25px 0 0 200px; font-size: 1.2em;">
              <span id="body" style="position: relative;margin-top:45px;"><strong> '.$row['review_title'].'</strong><br>'.$row['review_content'].'</span><br>
               <a onclick="opentextarea();" style="cursor: pointer;">Edit Review</a>
            </p>
          </div>
          <hr style="width: 100%; border: 1px solid #abc;margin-top: -60px;">';}
?>
<script type="text/javascript">
  function opentextarea() {
    var input = document.createElement('textarea');
    input.name = 'post';
    input.maxLength = 750;
    input.cols = 80;
    input.rows = 5;
    input.className = 'myCustomTextarea';
    var oBody = document.getElementById("body");
    while (oBody.childNodes.length > 0) {
        oBody.removeChild(oBody.childNodes[0]);
    }
    oBody.appendChild(input);
    oBody.appendChild(button);
 }
  function confirmationDelete(anchor){

  }
</script>

        </div> <!-- end of posted review tile -->

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
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    function openModal() {
      document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
      document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
  </script>


 </script>
</body>
</html>

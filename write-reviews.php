<?php
  session_start();
  include_once('connect/connect.php');

      if($_SESSION['type'] != 'user'){
        echo'<script>
              alert("Ooops! Log in first to make your review");
              window.location.href = "home.php";
        </script>';
    }
      $hotel_id = $_GET['hotel_id'];
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
        button[id="join"]{
          background-color: black;
          border: none;
        }

        button[id="join"]:hover{
          background-color: #E7E7E7;
          border: none;
        }

        input[type=text], input[type=password], input[type="email"] {
            width: 63%;
            padding: 12px 20px;
            margin: 8px px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 3px;
            float: left;
        }

        button[id="submit"]{
          background-color: black;
          color: white;
          width: 63%;
          border-radius: 3px;
          padding: 12px 20px;
          border: none;
          margin: 8px 0;
          float: left;
          margin-bottom: -8px;
        }

        label{
          float: left;
          color: #be9900;
        }

        #cancelbtn{
            width: 95%;
            padding: 10px 18px;
            background-color: #f44336;
            color: white;
            margin: 0px 15px;
            border: none;
            border-radius: 3px;

        }

        .container {
            padding: 16px;
        }

        /* Form Background */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Login Form */
        .modal-content-login {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 60%;
            height: 50%;
            border-radius: 3px;
        }

        /* Signup Form */
        .modal-content-signup {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            border: 1px solid #888;
            width: 60%;
            height: 88%;
            color: black;
            border-radius: 3px;
        }

        #cancelbtn1,#signupbtn {
            float:left;
            width:31.5%;
            color: white;
            padding: 13px;
        }

        #signupbtn{
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
            border: none;
            background-color: black;
        }

        #cancelbtn1{
            border-top-left-radius: 3px;
            border-bottom-left-radius: 3px;
            border: none;
            background-color: #f44336;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
               display: block;
               float: none;
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
            <li>
              <a href="hotels-category-login.php">
                <span class=""></span><br class="hidden-xs"> Hotels</a>
            </li>
            <li class="">
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
    <div class="carousel-inner" role="listbox" style=" width:100%; height: 270px !important;">

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

    <section class="row">

<?php
      $fetch_hotel = mysqli_query($connect, "SELECT * FROM hotels WHERE hotel_id = '$hotel_id'") or die ("ERROR: " .mysqli_error($connect));
      $row = mysqli_fetch_array($fetch_hotel);
      echo'
      <div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12">
        <a href="hotel-single-category.html">
          <div class="category-tile" style="margin-top: 10px;">
            <img width="200" height="200" src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" alt="The Oriental Legazpi">
            <span>'.$row['hotel_name'].'</span>
          </div>
        </a>
      </div>';
?>
      <div id="write-review" class=" col-xs-11">
        <div id="review-heading">
          <h1> Your first-hand experiece will help other travelers. Thanks!</h1>
          <hr>
        </div>

        <div id="review-titles" class="" >
          <form action="insert_review.php" method = "POST">
            <fieldset>
              <label for="rating">Your Overall Rating </label><br>
                  <select name="rating" class="btn-sm btn btn-warning dropdown-toggle" required >
                    <option value=''></option>>
                    <option value="5">5</option>
                    <option value="4">4</option>
                    <option value="3">3</option>
                    <option value="2">2</option>
                    <option value="1">1</option>
                  </select>
            </fieldset>

            <fieldset>
                <label for="title-review">Title of Your Review </label>
                <input class="form-control input-group-lg second" name="title_review" type="text" placeholder="Summarize your visit or highlight an interesting detail" required="">
            </fieldset>

            <fieldset>
                <label for="review">Your Review </label>
                <textarea class="form-control input-group-lg third" name="review" placeholder="Tell people about your experience: your room, location, amenities?"></textarea>
            </fieldset>
           <input style="border: transparent; background-color: transparent; width: 1px;" type="text" name="hotel_id" value="<?php echo $row['hotel_id'] ;?>" readonly>

            <input type="submit" name="submit" class="btn btn-default submit-btn" value="Submit">


          </form>
        </div>

      </div> <!-- #write-review -->



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
</body>
</html>

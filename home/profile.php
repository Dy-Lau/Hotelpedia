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
      <style type="text/css">


  /*.form-control{
    padding: 10mm 10mm 10mm 10mm
  }*/
  #t1, #t2 ,#t3,#t4, #t5  {

  height: 50px;

  width: 400px ;

  font-size: 14px;

  }
  #profile h1, #profile h3{
    border-bottom:1px solid #be9900;
    color: #000;
    display: inline-block;
    padding: 10px;
  }
  #profile-info label{
    color: black;
  }
</style>

  </head>
<body>
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
    <ol class="carousel-indicators" style="top: 850px;">
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

  <div id="profile" class="container"  style="">
    <h1>EDIT PROFILE</h1>
    <hr>
  <div class="row">
    <form class="form-horizontal" action = "edit_profile.php" method="POST" enctype="multipart/form-data">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">

          <img id="output" src="<?php echo'data:image/jpeg;base64,'.base64_encode($row['image']).''; ?>" class="avatar img-circle" accept="image/*" alt="avatar" height="100" width="100">

          <h6>Upload a different photo...</h6>
          <input class="form-control" type="file" name="profile_pic" onchange="loadFile(event)&validateFileType()">
        </div>
      </div>

      <!-- edit form column -->
      <div id="profile-info" class="col-md-9 personal-info">

        <h3>PERSONAL INFO</h3>


          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" value="<?php echo $row['firstname'];?>" type="text" id="t1" name="firstname">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" value="<?php echo $row['lastname'];?>" type="text" id="t2" name="lastname">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" value="<?php echo $row['email'];?>" type="email" id="t3" name="email">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" value="<?php echo $row['password'];?>" type="password" id="t4" name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label >
            <div class="col-md-8">
              <input class="form-control" value="<?php echo $row['password'];?>" type="password" id="t5" name = "c_password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input class="btn btn-primary" value="Save Changes" type="submit" name="edit">
              <span></span>
              <input class="btn btn-default" value="Cancel" type="reset" onclick="window.location.href='javascript:history.back()'">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

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
  <script type="text/javascript"> //uploading images
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  function validateFileType(){
    var fileName = document.getElementById("image").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="gif"){
        //TO DO
    }else{
        alert("Insert an Image Only!");
    }
  }
  </script>
</body>
</html>
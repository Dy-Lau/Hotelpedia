<?php
 session_start();
 include_once("../connect/connect.php");


    if($_SESSION['type'] == ''){
        echo'<script>
        window.location.href="../home.php";
        </script>';
    }

    if($_SESSION['type'] != 'admin'){
        echo'<script>
        alert("Restricted Area!");
        window.location.href="javascript:history.back()";
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
    <link rel="shortcut icon" type="image/x-icon" href="images/hotelpedia_logo_4_sm.png">



<style>
#admin-dash{
  margin-right: auto;
  margin-top: 50px;
  margin-bottom: 50px;
}
#admin-dash a{
  color: #be9900;
  text-align: center;
  text-transform: uppercase;
  transition: all .2s ease-in-out;
  font-size: 3.6em;
  margin-left: 10px;
}
#admin-dash a:hover {
  background: #000;
  border-radius: 25px;
  transform: scale(1.1);
  color: #fcdd44;

}
#admin-dash span  {
  font-size: 3.7em;
}
#admin-dash p{
  margin-top: 50px;
}
#space{
  margin-bottom: 455px;
}
@media (min-width: 992px) and (max-width: 1199px) {
  #admin-dash a{
    margin-top: -10px;
    margin-left: 20px;
  }
  #admin-dash{
    font-size: 1vw;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  #admin-dash a{
    margin-left: 30px;
    margin-top: 20px;
  }
    #admin-dash{
    font-size: 1vw;
  }
}
@media (max-width: 767px) {
  #admin-dash{
    margin-top: 20px;
    margin-left: 30px;
}
@media (max-width: 672px) {
  #admin-dash {
    margin-left: 50px;
    font-size: 1.5vw;
  }
}
@media (max-width:572px) {
  #admin-dash {
    margin-left: 30px;
    font-size: 1vw;
  }
}
@media (max-width:400px) {
  #admin-dash {
    margin-left: 50px;
    font-size: 1.5vw;
  }
}

#admin-dash a{
  float: left;
  font-size: 1.6em;
  margin-left: 20px;
  margin-top: 50px;
}

#admin-dash span  {
  font-size: 2.7em;
}
#admin-dash p{
  margin-top: 20px;
}
}

input[type=submit]{
    border: black;
}

input[type=submit]:hover {
    background-color: #fcdd44;
    font-weight: bold;
}
</style>

  </head>

<body>
  <header id="top">
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container-fluid" style="text-align: right;">
        <div class="navbar-header">
          <a href="home/home.php" class="pull-left visible-md visible-lg">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="home/home.php"><h1><b>Hotelpedia</b></h1></a>
            <!-- <p>Find your place to stay. In Legazpi.</p> -->
          </div>
           <ul style="float: right; margin-right: -70%">
            <li>
              <ul class="nav" style="margin-top: 32px;" id="nav-list" class="nav navbar-nav navbar-left">
                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-left: 190px; " >
                   Welcome Admin <?php echo $row['firstname'] ; ?> !
                  </a>
                  <ul class="dropdown-menu" style="width: 100%; margin-left: 61px;">
                    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<div class="nav-side-menu">
    <a href="home/home.php">
    <div id="logo-img" class="container"></div></a>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content collapse out">
                <li><a href="home/home.php">HOTELPEDIA</a></li>
                <li><a href="home/profile.php">Account Profile</a></li>
                    <li role="separator" class="divider"></li>
                <li>
                  <a href="adminpage.php">
                  <i class="fa fa-bars fa-lg"></i> Dashboard
                  </a>
                </li>
                 <li>
                  <a href="admin_user.php">
                  <i class="fa fa-user fa-lg"></i> Users
                  </a>
                  </li>
                  <li>
                  <a href="admin_hotels.php">
                  <i class="glyphicon glyphicon-bed"></i> Hotels
                  </a>
                </li>
                 <li>
                  <a href="admin_reviews.php">
                  <i class="glyphicon glyphicon-text-background"></i> Reviews
                  </a>
                </li>
                <li>
                <a href="../logout.php">
                  <i class="glyphicon glyphicon-off"></i> Log Out
                  </a>
                </li>
            </ul>
     </div>
</div>
                  </ul>
                </li>
              </ul>
              <!-- <a href="logout.php" id="login">
                <span class=""></span><br class="hidden-xs"> HELLO! <?php  ?></p></a> ....echo $row['firstname'] ;-->
            </li>
          </ul><!-- #nav-list -->


      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>

  <div class="container">
    <div class="row col-xs-12">
      <div class="row" style=" margin-top: 40px;">


        <div class="col-md-6 col-sm-6 col-xs-12 "> </div>
        <div class="col-md-6 col-sm-12 col-xs-12 ">

          <form role="form" action="search.php" method="GET">
            <div class="input-group" style="float:right;">
              <input class="form-control search" type="text" name="search" placeholder = "&nbsp;Search..." maxlength="356" size="52" style=""/>
              <span class="input-group-btn">
                <input class="btn btn-default btn-sm searchBtn" type="submit" name="searchbtn" value="SEARCH"  />
              </span>
            </div>
          </form>
        </div>
        </div>
      </div> <!-- end of .row -->

      <ul id="admin-dash" class="nav navbar-nav navbar-left">

        <li class="">
          <a href="admin_user.php">
            <span class="glyphicon glyphicon-user"></span><br class="hidden-xs"> <p>Users</p></a>
        </li>
        <li>
          <a href="admin_hotels.php">
            <span class="glyphicon glyphicon-bed"></span><br class="hidden-xs"> <p>Hotels</p></a>
        </li>
        <li>
          <a href="admin_reviews.php">
            <span class="glyphicon glyphicon-text-background"></span><br class="hidden-xs"> <p>Reviews</p></a>
        </li>
        <li>
          <a href="../logout.php">
            <span class="glyphicon glyphicon-off" style="color: red;"></span><br class="hidden-xs"> <p style="color: red;">Log Out</p></a>
        </li>

      </ul><!-- #nav-list -->

    </div>
  </div>


  <footer class="panel-footer">
    <div class="container">
      <div class="row">
        <div class="navbar-brand">
            <a href="#"><h1>Hotelpedia</h1></a>
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

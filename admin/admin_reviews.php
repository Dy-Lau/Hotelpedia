<?php
	session_start();
	include_once('../connect/connect.php');
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
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Administrator</title>
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>

<meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotelpedia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../images/hotelpedia_logo_4_sm.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<style type="text/css">
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
  /* Form Background */

input[type=text], select, input[type="email"], input[type="date"]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type=submit]{
    width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

 button[id= "cancel"]{
  width: 50%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 }

input[type=submit]{
    margin-top: 8px;
    border: black;
}

input[type=submit]:hover {
    background-color: #fcdd44;
    font-weight: bold;
}

form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

label{
  float: left;
}
</style>

<body>
  <header id="top">
    <nav id="header-nav" class="navbar navbar-default" >
      <div class="container">
        <div class="navbar-header">
          <a href="adminpage.php" class="pull-left visible-md visible-lg">
            <div id="logo-img"></div>
          </a>

          <div class="navbar-brand">
            <a href="adminpage.php"><h1><b>Hotelpedia</b></h1></a>
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
              <a href="adminpage.php">
                <span class=""></span><br class="hidden-xs"> Dashboard</a>
            </li>
            <li > <!-- Removed Active class-->
              <a href="admin_user.php">
                <span class=""></span><br class="hidden-xs"> Users</a>
            </li>
            <li >
              <a href="admin_hotels.php">
                <span class=""></span><br class="hidden-xs"> Hotels</a>
            </li>
            <li class="active">
              <a href="admin_reviews.php">
                <span class=""></span><br class="hidden-xs">Reviews</a>
            </li>
            <li>
              <a href="../logout.php">
                <span class=""></span><br class="hidden-xs">Log Out</a>

            </li>
            <li>

            </li>
          </ul><!-- #nav-list -->
        </div><!-- .collapse .navbar-collapse -->
      </div><!-- .container -->
    </nav><!-- #header-nav -->
  </header>
  <div class="container">

    <button class="button"><a href="javascript:history.back()">Go Back</a></button>
    <div class="row" style=" margin-top: 40px;">
        <div class="col-md-6 col-sm-12 col-xs-12 ">
          <form role="form" action="sort.php" id="sort-form" method="POST">
            <div class="input-group">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-default btn-sm searchBtn" value="SORT BY">
              </span>
              <select class="form-control sortBar" name="carlist" form="sort-form">
                <option value="sort_review">---Select---</option>
                <option value="dateasc">Review Date: Oldest-Latest</option>
                <option value="datedesc">Review Date: Latest-Oldest</option>
                <option value="ratingasc">Rating: lowest-highest</option>
                <option value="ratingdesc">Rating: highest-lowest</option>
              </select>

            </div>
          </form>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12 ">
          <form role="form" action="search_review.php" method="GET">
            <div class="input-group">
              <input class="form-control search" type="text" name="search" placeholder = "&nbsp;Search..." maxlength="356" size="52" style=""/>
              <span class="input-group-btn">
                <input class="btn btn-default btn-sm searchBtn" type="submit" name="searchbtn" value="SEARCH"  />
              </span>
            </div>
          </form>
        </div>
      </div>



<div class="" method = "GET" >
  <table class="responsive-table col-md-12 col-sm-12 col-xs-12">
  <caption>Users Ratings and Reviews Dashboard</caption>
    <thead>
      <tr>
        <th scope="col">Review I.D</th>
        <th scope="col">Email</th>
        <th scope="col">Hotel Name</th>
        <th scope="col">Review Title</th>
        <th scope="col">Review Content</th>
        <th scope="col">Review Date</th>
        <th scope="col">Rating Value</th>
        <th scope="col">Edit Record</th>
        <th scope="col">Delete Record</th>
      </tr>
    </thead>
    <tbody>
    <?php
    	$fetch_review = mysqli_query($connect, "SELECT * FROM reviews, user, hotels WHERE reviews.user_id = user.user_id AND
    					reviews.hotel_id = hotels.hotel_id")
    					or die ("ERROR: " .mysqli_error($connect));

    	while($row = mysqli_fetch_array($fetch_review)){
        $review_id = $row['review_id'];
    		echo'<tr>
    		<td>'.$row['review_id'].'</td>
    		<td>'.$row['email'].'</td>
    		<td>'.$row['hotel_name'].'</td>
    		<td>'.$row['review_title'].'</td>
    		<td>'.$row['review_content'].'</td>
    		<td>'.$row['review_date'].'</td>
    		<td>'.$row['rating'].'</td>
    		<td>
        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  href="editreview.php?review_id='.$review_id.'">Edit Record</a>
          <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
              <div class="modal-body">
                <form action="update_review.php" method="POST">
                  <label>Review ID</label>
                    <input type="text" name="review_id" value="'.$row['review_id'].'" required readonly>

                    <label>Email</label>
                    <input type="email" name="email" value="'.$row['email'].'" required readonly>

                    <label>Hotel Name</label>
                    <input type="text" name="hotel_name" value="'.$row['hotel_name'].'" required readonly>

                    <label>Review Title</label>
                    <input type="text" name="review_title" value="'.$row['review_title'] .'" required>

                    <label>Review Content</label>
                    <textarea class="form-control input-group-lg third" name="review_content">'.$row['review_content'] .'</textarea>

                    <label>Review Date</label>
                    <input type="date" name="review_date" value="'.$row['review_date'] .'" required>

                    <label>Rating Value</label>
                        <select name="rating" class="btn-sm btn btn-warning dropdown-toggle" required >
                          <option  if('.$row['rating'].' == "5" )  "selected="selected"" >5</option>
                          <option  if('.$row['rating'].' == "4" )  "selected="selected"" >4</option>
                          <option  if('.$row['rating'].' == "3" )  "selected="selected"" >3</option>
                          <option  if('.$row['rating'].' == "2" )  "selected="selected"" >2</option>
                          <option  if('.$row['rating'].' == "1" )  "selected="selected"" >1</option>
                        </select>

                   <button type="submit" name="edit_review">Submit</button>
                   <button type="submit" class="glyphicon glyphicon-trash" onclick="window.location.href="javascript:history.back()"" id="cancel"> Cancel</button>
                </form>
              </div>
            </div>
          </div>
        </div></td>
    		<td><a class="btn btn-danger" name="delete"  href="deletereview.php?review_id='.$review_id.'">Delete Record</a></td>
    		</tr>';
    	}
    ?>
    </tbody>
  </table>
</div>
</div>
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
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script type="text/javascript">
  function confirmationDelete(anchor){
   // var conf = confirm('Are you sure want to delete this record?');
   // if(conf)
   //    window.location=anchor.attr("href");
  }
  </script>
</body>
</html>

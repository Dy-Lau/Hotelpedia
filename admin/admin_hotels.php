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


<meta name="vi
ewport" content="width=device-width">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hotelpedia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/hotelpedia_logo_4_sm.png" />
    <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
        <style>
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
/* Add padding to container elements */
.add_container {
    padding: 16px;
}

/* The Modal (background) */
.add_modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 400; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.add_modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
    margin-bottom: 50px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

.admin-add {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
.admin-cancel{
  width: 100%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 }

.addBtn button[type=button]{
  position: relative;
  z-index: 1;
    border: 1px solid #be9900;
    background: transparent;
    text-transform: uppercase;
    transition: all .2s ease-in-out;
    color: #000;
    padding: 10px 20px;
    margin: 8px 60px 8px 0;
    font-size: 1vw;
    border-radius: 5px;
    margin-top:20px;
 }
 .addBtn button[type=button]:hover{
    background: #000;
    color: #be9900;
    transform: scale(1.1);
 }


#add input[type=submit]:hover {
    background-color: #45a049;
}

#add form{
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
@media (min-width: 768px) and (max-width: 991px) {
  .addBtn button[type=button]{
    font-size: 1em;
  }
}
@media (max-width: 767px){
  .addBtn button[type=button]{
    font-size: 12px;
  }
    .add_modal-content{
    width: 100%;
  }
}

input[type=text], select, input[type="number"],  input[type="email"], input[type="password"]{
    float: right;
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type=submit]{
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

 button[id= "cancel"]{
  width: 100%;
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
input[type="file"]{
    width: 30%;
    height: 40%;
    float: left;
    margin-top: -19px;
}

input[class="set1"]{
  float: left;
  width: 30%;
  padding: 7px 20px;
}
img{
    float: left;
    margin-right: 5px;
}

input[id="set2"]{
  float:right;
  width: 30%;
  padding: 7px 12px;
}
.avatar2{
  position: absolute;
  margin-left: -36px;
  margin-top: -65px;
}
@media (max-width: 767px){
  .avatar2{
  position: absolute;
  margin-left: -42px;
  margin-top: -65px;
  }
}
</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <header id="top" style="">
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
            <li class="active">
              <a href="admin_hotels.php">
                <span class=""></span><br class="hidden-xs"> Hotels</a>
            </li>
            <li>
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
        <div class="col-md-6 col-sm-6 col-xs-12 ">
          <form role="form" action="sort.php" id="sort-form" method="POST">
            <div class="input-group">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-default btn-sm searchBtn" value="SORT BY">
              </span>
              <select class="form-control sortBar" name="carlist" form="sort-form">
                <option value="sort_hotel">---Select---</option>
                <option value="hotel_name_asc">Hotel Name: a-z</option>
                <option value="price-lowest-highest">Price: Lowest-Highest</option>
                <option value="price-highest-lowest">Price: Highest-Lowest</option>
                <option value="class-lowest-highest">Class: Lowest-Highest</option>
                <option value="class-highest-lowest">Class: Highest-Lowest</option>
              </select>

            </div>
          </form>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 ">
          <form role="form" action="search_hotel.php" method="GET">
            <div class="input-group">
              <input class="form-control search" type="text" name="search" placeholder = "&nbsp;Search..." maxlength="356" size="52" style=""/>
              <span class="input-group-btn">
                <input class="btn btn-default btn-sm searchBtn" type="submit" name="searchbtn" value="SEARCH"  />
              </span>
            </div>
          </form>
        </div>
      </div> <!-- end of .row -->


      <div style=" text-align: right;">
        <div class="addBtn">
          <button class=" col-md-2 col-xs-12 btn btn-default glyphicon glyphicon-plus" type="button" name="add_hotel "onclick="document.getElementById('add').style.display='block'">
          Add&nbsp;Hotel
          </button>
        </div>
      </div>

      <div id="add" class="add_modal text-center">
        <span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">×</span>
        <div class=" add_container">
          <form class="add_modal-content animate" action="add_hotel.php" method="POST" enctype="multipart/form-data">
            <img id="output1" src="../images/hotel.png" accept="image/*" alt="avatar" height="100" width="100">
            <input type="text" class="set1" name="image1_name" placeholder="Image Name">
            <input type="text" id="set2" name="image2_name" placeholder="Image Name"><br><br><br>
            <input class="form-control" id="set2" type="file" name="image2" onchange="loadFile12(event)&validateFileType()">
            <input class="form-control" type="file" name="image1" onchange="loadFile1(event)&validateFileType()">
            <img id="output12" src="../images/bed.png" class="avatar2" accept="image/*" alt="avatar" height="100" width="100"><br><br><br>

            <img id="output13" src="../images/amenities.png" accept="image/*" alt="avatar" height="100" width="100">
            <input type="text" class="set1" name="image3_name" placeholder="Image Name">
            <input type="text" id="set2" name="image4_name" placeholder="Image Name"><br><br><br>

            <input class="form-control" id="set2" type="file" name="image4" onchange="loadFile14(event)&validateFileType()">
            <input class="form-control" type="file" name="image3" onchange="loadFile13(event)&validateFileType()">
            <img id="output14" src="../images/gallery.png" class="avatar2" accept="image/*" alt="avatar" height="100" width="100"><br><br>

            <label>Hotel Name</label>
            <input type="text" name="hotel_name" placeholder="Hotel Name" required>

            <label>Hotel Type</label>
            <input type="text" name="hotel_type" placeholder="Hotel Type" required>

            <label>Price</label>
            <input type="number" name="hotel_price" placeholder="Price" required>

            <label>Address</label>
            <input type="text" name="hotel_address" placeholder="Address" required>

            <label>Class</label>
                <select name="hotel_class" required >
                  <option value=''>-Select-</option>>
                  <option value="5">5-★★★★★</option>
                  <option value="4">4-★★★★</option>
                  <option value="3">3-★★★</option>
                  <option value="2">2-★★</option>
                  <option value="1">1-★</option>
                </select>

            <label>Number of Rooms</label>
            <input type="number" name="hotel_numrooms" placeholder="Numbers of rooms" required>

            <label>Amenities</label>
            <input type="text" name="amenities" placeholder="Amenities" required>

            <label>Hotel Map Link</label>
            <input type="text" name="hotel_mapLink" placeholder="Hotel Map Link" required>

            <label>Hotel Map Frame</label>
            <input type="text" name="hotel_mapFrame" placeholder="Hotel Map Frame" required>

            <label>Hotel Booking</label>
            <input type="text" name="hotel_booking" placeholder="Hotel Booking" required>

           <button type="submit" class="glyphicon glyphicon-ok" name="add_hotel"> Submit</button>
          <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href='admin_hotels.php'" id="cancel"> Cancel</button>
      </form>
          </div>
        </div>

        <script>
          // Get the modal Add hotel
          var modal = document.getElementById('add');

          // When the user clicks anywhere outside of the modal, close it
          window.onclick = function(event) {
              if (event.target == modal) {
                  modal.style.display = "none";
              }
          }
        </script>

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
        echo '
        <section class="" >
          <div class="menu-item-tile col-md-12" >
            <div class="">
              <div class="col-sm-6 col-xs-12">
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="data:image/jpeg;base64, '.base64_encode($row['image1']).'" alt="Item">
                  <span>'.$row['image1_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="data:image/jpeg;base64, '.base64_encode($row['image2']).'" alt="Item">
                  <span>'.$row['image2_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="data:image/jpeg;base64, '.base64_encode($row['image3']).'" alt="Item">
                  <span>'.$row['image3_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="data:image/jpeg;base64, '.base64_encode($row['image4']).'" alt="Item">
                  <span>'.$row['image4_name'].'</span>
                </div>

                <div class="menu-item-photo2 category-tile " >
                  <a href="'.$row['hotel_mapLink'].'"></a>
                    <div id="map-tile" class="col-sm-12">
                      <iframe src="'.$row['hotel_mapFrame'].'" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <span>Map</span>
                </div>

              </div>

              <div class="menu-item-description col-sm-6">
                <h3 class="menu-item-title"><strong>'.$row['hotel_name'].'</strong></h3>
                <p class="menu-item-details">'.$row['hotel_address'].'</p>
                  <span class="glyphicon glyphicon-star"> '.$row['hotel_class'].'-Star Hotel</span>
                </a>
                <div class="menu-item-price">LOWEST PRICE  <span> ₱'.$row['hotel_price'].'.00</span></div>
                <div class="menu-item-amenities">AMENITIES <p class="text-justify" style="color:#000;">'.$row['amenities_name'].'</p></div>


                <div class="view-btn" method="GET">
                  <a type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" href="edithotels.php?hotel_id='.$hotel_id.'">Edit Record</a>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-body">
                            <form action="update_hotels.php" method="POST">

                                 <button type="submit" class="glyphicon glyphicon-ok" name="edit_hotel"> Submit</button>
                                <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href="admin_hotels.php"" id="cancel"> Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <a class="btn btn-danger"  href="deletehotels.php?hotel_id='.$hotel_id.'">Delete Record</a>
                </div>


              </div>
              <div class="clearfix visible-lg-block visible-md-block"></div>

            </div> <!-- end of class="row" -->
            <hr class="visible-lg visible-md visible-xs">
          </div> <!-- end of .menu-item-tile -->';
          }

        for ($page=1; $page<=$number_of_pages; $page++){
          echo '<div style="text-align: center; margin-left:500px;"><a id="pagination" class="col-xs-4 col-md-1 text-center" href="admin_hotels.php?page='.$page.'"> '. $page.' </a></div>';
        }

?>

</div>
 <footer class="panel-footer">
    <div class="container">
      <div class="row">
        <div class="navbar-brand">
            <a href="adminpage.php"><h1>Hotelpedia</h1></a>
            <span>&copy; Copyright Hotelpedia 2017</span>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script type="text/javascript">
  function confirmationDelete(anchor){
   // var conf = confirm('Are you sure want to delete this record?');
   // if(conf)
   //    window.location=anchor.attr("href");
  }
  </script>
    <script type="text/javascript"> //uploading images
    var loadFile1 = function(event) {
    var output = document.getElementById('output1');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile12 = function(event) {
    var output = document.getElementById('output12');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile13 = function(event) {
    var output = document.getElementById('output13');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile14 = function(event) {
    var output = document.getElementById('output14');
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

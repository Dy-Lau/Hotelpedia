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


<meta name="viewport" content="width=device-width">

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
    padding-top: 60px;
}

/* Modal Content/Box */
.add_modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
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


#add input[type=text], #add select, #add input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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

input[type=submit]{
    border: black;
}

input[type=submit]:hover {
    background-color: #fcdd44;
    font-weight: bold;
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
                <option value="sort_hotel">-None-</option>
                <option value="hotel_name_asc">Hotel Name: a-z</option>
                <option value="price-lowest-highest" selected="selected">Price: Lowest-Highest</option>
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


      <div estyle=" text-align: right;">
        <div class="addBtn">
          <button class=" col-md-2 col-xs-12 btn btn-default glyphicon glyphicon-plus" type="button" name="add_hotel "onclick="document.getElementById('add').style.display='block'">
          Add&nbsp;Hotel
          </button>
        </div>
      </div>

      <div id="add" class="add_modal text-center">
        <span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">×</span>
        <div class=" add_container">
          <form class="add_modal-content animate" action="add_hotel.php" method="POST">

            <label>Hotel Name</label>
            <input type="text" name="hotel_name" placeholder="Hotel Name" required>

             <label>Hotel Type</label>
            <input type="text" name="hotel_type" placeholder="Hotel type" required>

             <label>Price</label>
            <input type="number" name="hotel_price" placeholder="Price" required>

             <label>Address</label>
            <input type="text" name="hotel_address" placeholder="Address" required>

             <label>Class</label>
                <select name="hotel_class" class="btn-sm btn btn-warning dropdown-toggle" required >
                  <option value=''>-Select-</option>>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
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

            <label>Image Name: </label>
            <input type="text" name="image1_name" placeholder="Image Name" required>
            <label>Image 1:</label>
            <input type="file" name="image1" required>

            <label>Image Name: </label>
            <input type="text" name="image2_name" placeholder="Image Name" required>
            <label>Image 2:</label>
            <input type="file" name="image2" required>

            <label>Image Name: </label>
            <input type="text" name="image3_name" placeholder="Image Name" required>
            <label>Image 3:</label>
            <input type="file" name="image3" required>

            <label>Image Name: </label>
            <input type="text" name="image4_name" placeholder="Image Name" required>
            <label>Image 4:</label>
            <input type="file" name="image4" required>

            <button class="admin-add" type="submit" name="add_hotel">Add Hotel</button>
             <button class="admin-cancel" type="button" onclick="document.getElementById('add').style.display='none'" class="glyphicon glyphicon-trash"> Cancel</button>
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

      $query = mysqli_query($connect, "SELECT * FROM hotels, amenities WHERE amenities.hotel_id = hotels.hotel_id ORDER BY hotel_price ASC LIMIT " . $this_page_first_result . ',' .$results_per_page) or die ("ERROR:" .mysqli_error($connect));
      while($row = mysqli_fetch_array($query)){
        $hotel_id = $row['hotel_id'];
        echo '
        <section class="row" >
          <div class="menu-item-tile col-md-12" >
            <div class="">
              <div class="col-sm-6 col-xs-12">
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="images/'.$row['image1'].'" alt="Item">
                  <span>'.$row['image1_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="images/'.$row['image2'].'" alt="Item">
                  <span>'.$row['image2_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="images/'.$row['image3'].'" alt="Item">
                  <span>'.$row['image3_name'].'</span>
                </div>
                <div class="menu-item-photo category-tile">
                  <img class="" width="250" height="250" src="images/'.$row['image4'].'" alt="Item">
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
                <div class="menu-item-price">LOWEST PRICE   <span> ₱'.$row['hotel_price'].'.00</span></div>
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
                                <label>Hotel ID</label>
                                  <input type="text" name="hotel_id" value="'.$row['hotel_id'].'" required readonly>

                                  <label>Hotel Name</label>
                                  <input type="text" name="hotel_name" value="'.$row['hotel_name'].'" required>

                                  <label>Hotel Type</label>
                                  <input type="text" name="hotel_type" value="'.$row['hotel_type'].'" required>

                                  <label>Price</label>
                                  <input type="number" name="hotel_price" value="'.$row['hotel_price'].'" required>

                                  <label>Address</label>
                                  <input type="text" name="hotel_address" value="'.$row['hotel_address'].'" required>

                                  <label>Class</label>
                                    <select name="hotel_class" required>
                                      <option  if('.$row['hotel_class'].' == "5")  "selected = "selected""  >5</option>
                                      <option  if('.$row['hotel_class'].' == "4")  "selected = "selected""  >4</option>
                                      <option  if('.$row['hotel_class'].' == "3")  "selected = "selected""  >3</option>
                                      <option  if('.$row['hotel_class'].' == "2")  "selected = "selected""  >2</option>
                                      <option  if('.$row['hotel_class'].' == "1")  "selected = "selected""  >1</option>
                                    </select>

                                  <label>Number of Rooms</label>
                                  <input type="number" name="hotel_numrooms" value="'.$row['hotel_numrooms'].'" required>

                                  <label>Amenities</label>
                                  <input type="text" name="amenities" value="'.$row['amenities_name'].'" required>

                                  <label>Hotel Map Link</label>
                                  <input type="text" name="hotel_mapLink" value="'.$row['hotel_mapLink'].'" required>

                                  <label>Hotel Map Frame</label>
                                  <input type="text" name="hotel_mapFrame" value="'.$row['hotel_mapFrame'].'" required>

                                  <label>Hotel Booking</label>
                                  <input type="text" name="hotel_booking" value="'.$row['hotel_booking'].'" required>

                                  <label>Image Name: </label>
                                  <input type="text" name="image1_name" value="'.$row['image1_name'].'" required>
                                  <label>Image 1:</label>
                                  <input type="file" name="image1" value="'.$row['image1'].'" required>

                                  <label>Image Name: </label>
                                  <input type="text" name="image2_name" value="'.$row['image2_name'].'" required>
                                  <label>Image 2:</label>
                                  <input type="file" name="image2" value="'.$row['image2'].'" required>

                                  <label>Image Name: </label>
                                  <input type="text" name="image3_name" value="'.$row['image3_name'].'" required>
                                  <label>Image 3:</label>
                                  <input type="file" name="image3" value="'.$row['image3'].'" required>

                                  <label>Image Name: </label>
                                  <input type="text" name="image4_name" value="'.$row['image4_name'].'" required>
                                  <label>Image 4:</label>
                                  <input type="file" name="image4" value="'. $row['image4'].'" required>

                                 <button type="submit" name="edit_hotel">Submit</button>
                                <button type="submit" class="glyphicon glyphicon-trash" onclick="window.location.href="javascript:history.back()"" id="cancel"> Cancel</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  <a class="btn btn-danger" onclick="javascript:confirmationDelete(this);return false;" href="deletehotels.php?hotel_id='.$hotel_id.'">Delete Record</a>
                </div>


              </div>
              <div class="clearfix visible-lg-block visible-md-block"></div>

            </div> <!-- end of class="row" -->
            <hr class="visible-lg visible-md visible-xs">
          </div> <!-- end of .menu-item-tile -->';
          }

        for ($page=1; $page<=$number_of_pages; $page++){
          echo '<div style="text-align: center; margin-left:500px;"><a id="pagination" class="col-xs-4 col-md-1 text-center" href="sort_hotel_priceasc.php?page='.$page.'"> '. $page.' </a></div>';
        }

?>
          
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

  <script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
  }
  </script>
</body>
</html>

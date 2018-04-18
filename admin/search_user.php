<?php
session_start();
include_once("../connect/connect.php");

	$search = $_GET['search'];

	$search_query = "SELECT * FROM user WHERE (lastname like '%".$search."%') OR (firstname like '%".$search."%') OR (email like '%".$search."%')"	;
	$query = mysqli_query($connect, $search_query) or die ("ERROR: " .mysqli_error($connect));
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
  </head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

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
    padding: 0;
}

/* Modal Content/Box */
.add_modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
    margin-bottom: 20px;
    margin-top: 20px;
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

#add input[type=text], #add select, #add input[type=email], #add input[type=password] {
    float: right;
    width: 75%;
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
 #admin-cancel{
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
    margin: 7px 60px 8px 0;
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



/*modal for edit record. */
input[type=text], select,  input[type="email"], input[type="password"]{
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type="file"]{
    width:  75%;
    float: right;
    height: 45px;
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
  margin-top: 30px;
}
</style>

</head>

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
            <li class="active"> <!-- Removed Active class-->
              <a href="admin_user.php">
                <span class=""></span><br class="hidden-xs"> Users</a>
            </li>
            <li>
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

  <!-- <header>
    <nav id="header-nav" class="navbar navbar-default">
      <div class="container">
          <div class="navbar-brand">
            <a href="index.html"><h1>Hotelpedia</h1></a>
            <p>
              <span>Legazpi, Philippines</span>
            </p>
          </div>
          <span><h3 style="text-align: right; color: yellow;">Welcome Administrator!</h3></span>
      </div> <!-- .container
    </nav><!-- #header-nav
  </header> -->
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
              <option value="sort_user">---Select---</option>
              <option value="firstname_asc">Firstname: a-z</option>
              <option value="firstname_desc">Firstname: z-a</option>
              <option value="lastname_asc">Lastname: a-z</option>
              <option value="lastname_desc">Lastname: z-a</option>
              <option value="user_type">User Type</option>
            </select>

          </div>
        </form>
      </div>

      <div class="col-md-6 col-sm-12 col-xs-12 ">
        <form role="form" action="search_user.php" method="GET">
          <div class="input-group">
            <input class="form-control search" type="text" name="search" placeholder = "&nbsp;Search..." maxlength="356" size="52" style=""/>
            <span class="input-group-btn">
              <input class="btn btn-default btn-sm searchBtn" type="submit" name="searchbtn" value="SEARCH"  />
            </span>
          </div>
        </form>
      </div>
    </div>

    <!-- Add User Here -->
    <div estyle=" text-align: right;">
        <div class="addBtn">
          <button class=" col-md-2 col-xs-12 btn btn-default glyphicon glyphicon-plus" type="button" name="add_hotel "onclick="document.getElementById('add').style.display='block'">
          Add&nbsp;User
          </button>
        </div>
      </div>

      <div id="add" class="add_modal text-center">
        <span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">×</span>
        <div class=" add_container">
          <form class="add_modal-content animate" action="add_user.php" method="POST">

            <div class="text-center">
              <img id="output" src="../images/profile.jpg" class="avatar img-circle" alt="avatar" height="100" width="100">
              <h6>Upload a different photo...</h6>
              <label>Display Picture</label><br>
              <input class="form-control" type="file" name="profile_pic" onchange="loadFile(event)&validateFileType()">
            </div> <br>

            <label>Last Name</label><br>
            <input type="text" name="lastname" placeholder="Lastname" required><br>

            <label>First Name</label><br>
            <input type="text" name="firstname" placeholder="Firstname" required><br>

            <label style="margin-top: 75px; margin-left: -80px;">Email</label><br>
            <input type="email" name="email" placeholder="Email" required><br>

            <label style="margin-top: 75px; margin-left: -42px;">Passwword</label><br>
            <input type="password" name="password" placeholder="Password" required><br>

            <label>User Type</label><br>
            <select name="user_type" required><br>
              <option value="">-Select-</option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
            </select>

            <button class="glyphicon glyphicon-ok" type="submit" name="add_user"> Add </button>
             <button id="admin-cancel" class="glyphicon glyphicon-remove" type="button" onclick="document.getElementById('add').style.display='none'" class="glyphicon glyphicon-trash"> Cancel</button>
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
        <!-- End of Add User Here -->
<?php
  if (mysqli_num_rows($query) > 0){
  echo'
  <div class="" method = "GET" >
  <table class="responsive-table col-md-12 col-sm-12 col-xs-12">
    <caption>Users Information Dashboard</caption>
    <thead>
      <tr>
        <th scope="col">User I.D.</th>
        <th scope="col">Display Picture</th>
        <th scope="col">Last Name</th>
        <th scope="col">First Name</th>
        <th scope="col">Email Address</th>
        <th scope="col">Password</th>
        <th scope="col">User Type</th>
        <th scope="col">Edit Record</th>
        <th scope="col">Delete Record</th>
      </tr>
    </thead>
    <tbody>';


      while($row = mysqli_fetch_array($query)){
        $user_id = $row['user_id'];
        echo'<tr>
        <td>'.$row['user_id'].'</td>
        <td><img class="" width="55" height="55" src="data:image/jpeg;base64, '.base64_encode($row['image']).'" alt="Item"></td>
        <td>'.$row['lastname'].'</td>
        <td>'.$row['firstname'].'</td>
        <td>'.$row['email'].'</td>
        <td>•••••••••••</td>
        <td>'.$row['user_type'].'</td>
                <td> <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  href="edituser.php?user_id='.$user_id.'">Edit Record</a>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->

            <div class="modal-content">
              <div class="modal-body">
                <form action="update_user.php" method="POST">
        <div class="text-center">
          <img id="output" src="../images/'.$row["profile_pic"].'" class="avatar img-circle" alt="avatar" height="100" width="100">
          <h6>Upload a different photo...</h6>
          <label>Display Picture</label>
          <input class="form-control" type="file" name="profile_pic" onchange="loadFile(event)">
        </div><br><br>
            <label>User ID</label>
            <input type="text" name="user_id" value="'.$row["user_id"].'" required readonly><br>

            <label>Email</label>
            <input type="email" name="email" value="'.$row["email"].'" required><br>

            <label>Last Name</label>
            <input type="text" name="lastname" value="'.$row["lastname"].'" required>

            <label>First Name</label>
            <input type="text" name="firstname" value="'.$row["firstname"].'" required>

            <label>Passwword</label>
            <input type="password" name="password" value="'.$row["password"].'" required>

            <label>User Type</label>
            <select name="user_type" required>
                <option   if('.$row["user_type"].' == "admin" )  selected=selected  >admin</option>
                <option  if('.$row["user_type"].' == "user" )  selected=selected >user</option>
            </select>
           <button class="glyphicon glyphicon-ok" type="submit" name="edit_user"> Submit</button>
           <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href="javascript:history.back()""   id="cancel"> Cancel</button>
                </form>
              </div>
            </div>

          </div>
        </div></td>
        <td><a class="btn btn-danger" name="delete" onclick="javascript:confirmationDelete(this);return false;" href="deleteuser.php?user_id='.$user_id.'""> Delete Record</a></td>
        </tr>';
     }
  }
      else
      echo '<div style="opacity: 0.5; font-family: sanserif;">
            <br><br><h2>No Result Found...</h1>
            <h3 style="text-indent: 300px;">Suggestions: </h3>
            <h4 style="margin-left: 305px; line-height: 23px;"> • Make sure that all words are spelled correctly.<br>
                 • Try different keywords.<br>
                 • Try more general keywords.<br>
                 • Try fewer keywords.</h4>
            </div><br>';
?>
    </tbody>
  </table>
</div>
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

  <script type="text/javascript">
  function confirmationDelete(anchor){
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
  }
  </script>


</body>
</html>

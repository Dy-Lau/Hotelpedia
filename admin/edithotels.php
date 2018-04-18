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
  $hotel_id = $_GET['hotel_id'];
  $fetch_hotels = mysqli_query($connect, "SELECT * FROM hotels, amenities WHERE hotels.hotel_id = '".$hotel_id."' AND amenities.hotel_id = '".$hotel_id."'")
                  or die ("ERROR: " .mysqli_error($connect));

    $row = mysqli_fetch_array($fetch_hotels);

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
<style>

input[type=text], select, input[type="number"]{
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

#edit input[type=submit]:hover {
    background-color: #45a049;
}

form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

label{
    margin-top: 15px;
    float: left;
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
  margin-left: 14px;
  margin-top: -65px;
}
@media (max-width: 767px){
  .avatar2{
  position: absolute;
  margin-left: -37px;
  margin-top: -65px;
  }
}
</style>
  </head>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>

  <div class="">

    <div class="" >


      <form action="update_hotels.php" method="POST" enctype="multipart/form-data">
            <img id="output" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($row['image1']).'' ?>" class="" accept="image/*" alt="avatar" height="100" width="100">
            <input type="text" class="set1" name="image1_name" value="<?php echo $row['image1_name'] ; ?>">
            <input type="text" id="set2" name="image2_name" value="<?php echo $row['image2_name'] ;?>"><br><br><br>
            <input class="form-control" id="set2" type="file" name="image2" onchange="loadFile2(event)&validateFileType()">
            <input class="form-control" type="file" name="image1" onchange="loadFile(event)&validateFileType()">
            <img id="output2" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($row['image2']).'' ?>" class="avatar2" accept="image/*" alt="avatar" height="100" width="100"><br><br><br>

            <img id="output3" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($row['image3']).'' ?>" class="" accept="image/*" alt="avatar" height="100" width="100">
            <input type="text" class="set1" name="image3_name" value="<?php echo $row['image3_name'] ;?>">
            <input type="text" id="set2" name="image4_name" value="<?php echo $row['image4_name'] ;?>"><br><br><br>

            <input class="form-control" id="set2" type="file" name="image4" onchange="loadFile4(event)&validateFileType()">
            <input class="form-control" type="file" name="image3" onchange="loadFile3(event)&validateFileType()">
            <img id="output4" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($row['image4']).'' ?>" class="avatar2" accept="image/*" alt="avatar" height="100" width="100"><br>

            <br><label>Hotel ID</label>
            <input type="text" name="hotel_id" value="<?php echo $row['hotel_id'] ;?>" required readonly>

            <label>Hotel Name</label>
            <input type="text" name="hotel_name" value="<?php echo $row['hotel_name'] ;?>" required>

            <label>Hotel Type</label>
            <input type="text" name="hotel_type" value="<?php echo $row['hotel_type'] ;?>" required>

            <label>Price</label>
            <input type="number" name="hotel_price" value="<?php echo $row['hotel_price'] ;?>" required>

            <label>Address</label>
            <input type="text" name="hotel_address" value="<?php echo $row['hotel_address'] ;?>" required>

            <label>Class</label>
              <select name="hotel_class" required>
                <option <?php if($row['hotel_class'] == '5') echo "selected = 'selected'"; ?> >5-★★★★★</option>
                <option <?php if($row['hotel_class'] == '4') echo "selected = 'selected'"; ?> >4-★★★★</option>
                <option <?php if($row['hotel_class'] == '3') echo "selected = 'selected'"; ?> >3-★★★</option>
                <option <?php if($row['hotel_class'] == '2') echo "selected = 'selected'"; ?> >2-★★</option>
                <option <?php if($row['hotel_class'] == '1') echo "selected = 'selected'"; ?> >1=★</option>
              </select>

            <label>Number of Rooms</label>
            <input type="number" name="hotel_numrooms" value="<?php echo $row['hotel_numrooms'] ;?>" required>

            <label>Amenities</label>
            <input type="text" name="amenities" value="<?php echo $row['amenities_name'] ;?>" required>

            <label>Hotel Map Link</label>
            <input type="text" name="hotel_mapLink" value="<?php echo $row['hotel_mapLink'] ;?>" required>

            <label>Hotel Map Frame</label>
            <input type="text" name="hotel_mapFrame" value="<?php echo $row['hotel_mapFrame'] ;?>" required>

            <label>Hotel Booking</label>
            <input type="text" name="hotel_booking" value="<?php echo $row['hotel_booking'] ;?>" required>

           <button type="submit" class="glyphicon glyphicon-ok" name="edit_hotel"> Submit</button>
          <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href='admin_hotels.php'" id="cancel"> Cancel</button>
      </form>
    </div>
  </div>


  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript"> //uploading images
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile2 = function(event) {
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile3 = function(event) {
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
      var loadFile4 = function(event) {
    var output = document.getElementById('output4');
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

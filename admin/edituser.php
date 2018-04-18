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
  $user_id = $_GET['user_id'];

    $fetch_user = mysqli_query($connect, "SELECT * FROM user WHERE user_id = $user_id")
              or die("ERROR: " .mysqli_error($connect));
    $row = mysqli_fetch_array($fetch_user);

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
  <script src="https://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="../images/hotelpedia_logo_4_sm.png" />
<style>

input[type=text], select, input[type="email"], input[type="password"]{
    width: 75%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type="file"]{
    width: 75%;
    float: right;
    height: 45px;
}

#edit button[type=submit]{
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

#edit button[id= "cancel"]{
  width: 100%;
    background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
 }

.edit input[type=submit]:hover {
    background-color: #45a049;
}

form {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

label{
  float: left;
  margin-top: 15px;
}
</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>


  <div class="">
    <div class="" style="text-align: right;">

      <form action="update_user.php" method="POST" enctype="multipart/form-data">
        <div class="text-center">
          <img id="output2" src="<?php echo 'data:image/jpeg;base64, '.base64_encode($row["image"]).'';?>" class="avatar img-circle" accept="image/*" alt="avatar" height="100" width="100">
          <h6>Upload a different photo...</h6>
          <label class="edit">Display Picture</label>
          <input class="form-control" type="file" name="profile_pic" onchange="loadFile2(event)&validateFileType()">
        </div><br><br>
            <label class="edit">User ID</label>
            <input type="text" name="user_id" value="<?php echo $row['user_id'] ;?>" required readonly><br>

            <label class="edit">Email</label>
            <input type="email" name="email" value="<?php echo $row['email'] ;?>" required><br>

            <label class="edit">Last Name</label>
            <input type="text" name="lastname" value="<?php echo $row['lastname'] ;?>" required>

            <label class="edit">First Name</label>
            <input type="text" name="firstname" value="<?php echo $row['firstname'] ;?>" required>

            <label class="edit">Password</label>
            <input type="password" name="password" value="<?php echo $row['password'] ;?>" required>

            <label class="edit">User Type</label>
            <select name="user_type" required>
                <option  <?php if($row['user_type'] == 'admin' )  echo "selected='selected'"; ?>  >admin</option>
                <option <?php if($row['user_type'] == 'user' )  echo "selected='selected'"; ?> >user</option>
            </select>
           <button id="edit" class="glyphicon glyphicon-ok" type="submit" name="edit_user"> Submit</button>
           <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href='javascript:history.back()'" id="cancel"> Cancel</button>
      </form>

    </div>
  </div>


  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script type="text/javascript"> //uploading images 
    var loadFile2 = function(event) {
    var output = document.getElementById('output2');
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

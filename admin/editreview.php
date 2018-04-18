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
	$review_id = $_GET['review_id'];

    $fetch_review = mysqli_query($connect,  "SELECT * FROM reviews, user, hotels WHERE review_id = '$review_id' AND reviews.user_id = user.user_id AND
    					reviews.hotel_id = hotels.hotel_id ")
    					or die("ERROR: " .mysqli_error($connect));
    $row = mysqli_fetch_array($fetch_review);
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

input[type=text], select, input[type="email"], input[type="date"], textarea{
    float: right;
    width: 75%;
    
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
#textarea {
    width: 75%;
    height: 100px;
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

  <div class="">

		<form action="update_review.php" method="POST">
				<label>Review ID</label>
			    <input type="text" name="review_id" value="<?php echo $row['review_id'] ;?>" required readonly><br><br><br>

		   		<label>Email</label>
			    <input type="email" name="email" value="<?php echo $row['email'] ;?>" required readonly><br><br><br>

			    <label>Hotel Name</label>
			    <input type="text" name="hotel_name" value="<?php echo $row['hotel_name'] ;?>" required readonly><br><br><br>

			   	<label>Review Title</label>
			    <input type="text" name="review_title" value="<?php echo $row['review_title'] ;?>" required><br><br><br>

          <label>Review Content</label>
          <textarea id="textarea" class="form-control input-group-lg third" name="review_content"><?php echo $row['review_content'] ;?></textarea><br><br><br><br><br><br>

			    <label>Review Date</label>
			    <input type="date" name="review_date" value="<?php echo $row['review_date'] ;?>" required><br><br><br>

			    <label>Rating Value</label>
              <select name="rating" required ><br><br><br>
                <option  <?php if($row['rating'] == '5' ) { echo "selected='selected'"; }?>  >5-★★★★★</option>
                <option <?php if($row['rating'] == '4' ) { echo "selected='selected'"; }?> >4-★★★★</option>
                <option  <?php if($row['rating'] == '3' ) { echo "selected='selected'"; }?>  >3-★★★</option>
                <option <?php if($row['rating'] == '2' ) { echo "selected='selected'"; }?> >2-★★</option>
                <option <?php if($row['rating'] == '1' ) { echo "selected='selected'"; }?> >1-★</option>
              </select><br><br>

		     <button id="edit" type="submit" class="glyphicon glyphicon-ok" name="edit_review"> Submit</button>
		     <button type="submit" class="glyphicon glyphicon-remove" onclick="window.location.href='javascript:history.back()'" id="cancel"> Cancel</button>
		</form>
    </div>
  </div>



  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


</body>
</html>

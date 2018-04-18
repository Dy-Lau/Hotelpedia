<?php
session_start();
include_once('../connect/connect.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php

		if(isset($_FILES['image1']) && isset($_FILES['image2']) && isset($_FILES['image3']) && isset($_FILES['image4'])){
		$image1				= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
		$image2				= addslashes(file_get_contents($_FILES['image2']['tmp_name']));
		$image3				= addslashes(file_get_contents($_FILES['image3']['tmp_name']));
		$image4				= addslashes(file_get_contents($_FILES['image4']['tmp_name']));
	}
	else{
  		echo'<script>
  			 swal({
			  title: "Oh Sorry!",
			  text: "Only jpg, gif, and png files are allowed!",
			  icon: "info"
			})
			.then((value) => {
			   window.location.href="javascript:history.back()";
			});
  	   	     </script>';
 	exit(); }

	if (isset($_POST['add_hotel'])){
		$hotel_name			= $_POST['hotel_name'];
		$hotel_type			= $_POST['hotel_type'];
		$hotel_price		= $_POST['hotel_price'];
		$hotel_address		= $_POST['hotel_address'];
		$hotel_class		= $_POST['hotel_class'];
		$hotel_numrooms		= $_POST['hotel_numrooms'];
		$amenities			= $_POST['amenities'];
		$hotel_mapLink		= $_POST['hotel_mapLink'];
		$hotel_mapFrame		= $_POST['hotel_mapFrame'];
		$hotel_booking		= $_POST['hotel_booking'];
		$image1_name		= $_POST['image1_name'];
		$image2_name		= $_POST['image2_name'];
		$image3_name		= $_POST['image3_name'];
		$image4_name		= $_POST['image4_name'];
	}

	$check = mysqli_query($connect, "SELECT * FROM hotels WHERE hotel_name = '".$hotel_name."' AND hotel_address = '".$hotel_address."' ")
			or die ("ERROR: " .mysqli_error());

	if(mysqli_num_rows($check) > 0){
		echo'<script>
		swal({
			  title: "Oh No!",
			  text: "Hotel Already Exist. You May Edit the Existing One!",
			  icon: "warning"
			})
			.then((value) => {
			    window.location.href="javascript:history.back()";
			});
		</script>';
	}

	else{
		$insert_hotel = "INSERT INTO hotels
						(hotel_name, hotel_type, hotel_price, hotel_address, hotel_class, hotel_numrooms, hotel_mapLink, hotel_mapFrame, hotel_booking, image1, image2, image3, image4, image1_name, image2_name, image3_name, image4_name)
						VALUES ('$hotel_name', '$hotel_type', '$hotel_price', '$hotel_address', '$hotel_class', '$hotel_numrooms', '$hotel_mapLink', '$hotel_mapFrame', '$hotel_booking', '$image1', '$image2', '$image3', '$image4', '$image1_name', '$image2_name', '$image3_name', '$image4_name')";
		$query = mysqli_query($connect, $insert_hotel);

		$check = mysqli_query($connect, "SELECT * FROM hotels ORDER BY hotel_id DESC")
					or die ("ERROR: " .mysqli_error());
		$row = mysqli_fetch_array($check);

		$insert_amenities = "INSERT INTO amenities (hotel_id, amenities_name)
							VALUES ('".$row['hotel_id']."', '$amenities')";

		if ($query && mysqli_query($connect, $insert_amenities)){
			echo'<script>
			swal({
			  title: "Congratulations!",
			  text: "The hotel has been added in the list",
			  icon: "success"
			})
			.then((value) => {
			    window.location.href="admin_hotels.php";
			});
			</script>';
		}

		else{
			echo'<script>
			swal({
			  title: "Ooops!",
			  text: "The hotel failed to be added inn the list",
			  icon: "error"
			})
			.then((value) => {
			    window.location.href="admin_hotels.php";
			});
			</script>';
		}

		mysqli_close($connect);
	}

	 ?>
</body>
</html>
<?php
session_start();
include_once('../connect/connect.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		if (isset($_FILES['profile_pic'])) {
		$profile_pic 		= addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
		$image 				= addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
		$image_name 		= $_FILES['profile_pic']['name'];
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

	if (isset($_POST['add_user'])){
		$lastname = $_POST['lastname'];
		$firstname = $_POST['firstname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];
	}

	$check_email = "SELECT * FROM user WHERE email = '".$email."'";
	$result = mysqli_query($connect, $check_email) or die ("ERROR: " .mysqli_error($connect));

	if(mysqli_num_rows($result) > 0 ){
		echo '<script>
			  	alert("Email Already Exist!");
			  	window.location.href="javascript:history.back()";
			  </script>';
		exit(0);
	}

	if ($profile_pic == ''){
		$insert_user = "INSERT INTO user (lastname, firstname, email, password, user_type, profile_pic, image)
						VALUES ('$lastname', '$firstname', '$email', '$password', '$user_type', 'profile.jpg', '$image')";
		$query = mysqli_query($connect, $insert_user);

		if ($query) {
    		echo '<script>
				swal({
					  title: "Congratulations!",
					  text: "The user has been added in the list",
					  icon: "success"
				})
					.then((value) => {
					    window.location.href="admin_user.php";
					});
				  </script>';
		}
		else {
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
	}

	if ($profile_pic != ''){
		$insert_user = "INSERT INTO user (lastname, firstname, email, password, user_type, profile_pic, image)
						VALUES ('$lastname', '$firstname', '$email', '$password', '$user_type', '$image_name', '$image')";
		$query = mysqli_query($connect, $insert_user);

		if ($query){
			echo'<script>
		swal({
					  title: "Congratulations!",
					  text: "The user has been added in the list",
					  icon: "success"
				})
					.then((value) => {
					    window.location.href="admin_user.php";
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
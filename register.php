<?php
session_start();
include_once("connect/connect.php");

	if (isset($_POST["register"])){
		$lastname = $_POST['lastname'];
		$firstname = $_POST["firstname"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$c_password = $_POST["c_password"];
	}

	$check_email = "SELECT * FROM user WHERE email = '".$email."'";
	$result = mysqli_query($connect, $check_email) or die ("ERROR: " .mysqli_error($connect));


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>
	<?php

	if(mysqli_num_rows($result) > 0 ){
		echo '<script>
			  	alert("Email Already Exist!");
			  	window.location.href="javascript:history.back()";
			  </script>';
	}

     else if ($password == $c_password){
		$insert_user = "INSERT INTO user (lastname, firstname, email, password, user_type, profile_pic) VALUES ('$lastname', '$firstname', '$email', '$password', 'user', 'profile.jpg')";

		if (mysqli_query($connect, $insert_user)) {
			$result = mysqli_query($connect, "SELECT * FROM user ORDER BY user_id DESC");
			$row = mysqli_fetch_array($result);
			$_SESSION['type'] = 'user';
			$_SESSION['email'] = $email;
			$_SESSION['user_id'] = $row['user_id'];
    		echo '<script>
					swal({
					  title: "GOOD DAY!",
					  text: "Welcome To Hotelpedia!",
					  icon: "success"
					})
					.then((value) => {
					    window.location.href = "home.php";
					});
				  </script>';
		} else {
    		echo'<script>
					swal({
					  title: "GOOD DAY!",
					  text: "Sorry! Please register again",
					  icon: "error"
					})
					.then((value) => {
					    window.location.href = "home.php";
					});
				</script>';
		}
		mysqli_close($connect);
	}

	else{
		echo'<script>
				swal({
					  title: "Ooops!",
					  text: "Password do not match.",
					  icon: "error"
					})
					.then((value) => {
					    window.location.href = "home.php";
					});
			</script>';

	}

?>
</body>
</html>